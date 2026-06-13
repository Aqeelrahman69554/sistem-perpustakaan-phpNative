<?php
require_once __DIR__ . '/../connection.php';


if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>
            alert('ID Peminjaman tidak valid!');
            window.location.href = 'index_loans.php';
          </script>";
    exit;
}

$loan_id = $_GET['id'];
$today = date('Y-m-d');

// 2. Ambil data peminjaman untuk mengecek status, tanggal kembali, dan ID buku
$query_check = "SELECT loan_date, return_date, books_id, status FROM loans WHERE id = ?";
$stmt_check = mysqli_prepare($connect, $query_check);
mysqli_stmt_bind_param($stmt_check, "i", $loan_id);
mysqli_stmt_execute($stmt_check);
$result_check = mysqli_stmt_get_result($stmt_check);
$loan_data = mysqli_fetch_assoc($result_check);

// Validasi jika data peminjaman tidak ditemukan
if (!$loan_data) {
    echo "<script>
            alert('Data peminjaman tidak ditemukan!');
            window.location.href = 'index_loans.php';
        </script>";
    exit;
}

// Validasi jika buku ternyata sudah pernah dikembalikan sebelumnya
if ($loan_data['status'] === 'dikembalikan') {
    echo "<script>
            alert('Buku ini sudah dikembalikan sebelumnya!');
            window.location.href = 'index_loans.php';
        </script>";
    exit;
}

$book_id = $loan_data['books_id'];
$target_return_date = $loan_data['return_date'];


$denda_per_hari = 2000;
$total_denda = 0;

if (strtotime($today) > strtotime($target_return_date)) {
    $selisih_detik = strtotime($today) - strtotime($target_return_date);
    $selisih_hari = floor($selisih_detik / (60 * 60 * 24));
    $total_denda = $selisih_hari * $denda_per_hari;
}


mysqli_begin_transaction($connect);

try {
    $query_update_loan = "UPDATE loans SET status = 'dikembalikan' WHERE id = ?";
    $stmt_update_loan = mysqli_prepare($connect, $query_update_loan);
    mysqli_stmt_bind_param($stmt_update_loan, "i", $loan_id);
    mysqli_stmt_execute($stmt_update_loan);

    $query_update_stock = "UPDATE books SET stock = stock + 1 WHERE id = ?";
    $stmt_update_stock = mysqli_prepare($connect, $query_update_stock);
    mysqli_stmt_bind_param($stmt_update_stock, "i", $book_id);
    mysqli_stmt_execute($stmt_update_stock);


    mysqli_commit($connect);


    if ($total_denda > 0) {
        $pesan = "Buku berhasil dikembalikan! Terlambat " . $selisih_hari . " hari. Total Denda: Rp " . number_format($total_denda, 0, ',', '.');
    } else {
        $pesan = "Buku berhasil dikembalikan tepat waktu.";
    }

    echo "<script>
            alert('$pesan');
            window.location.href = 'index_loans.php';
          </script>";
    exit;
} catch (Exception $e) {
    mysqli_rollback($connect);
    echo "Terjadi kesalahan saat memproses pengembalian: " . $e->getMessage();
}
