<?php
require_once __DIR__ . '/../connection.php';

// Ambil data dan bersihkan spasi ekstra
$member_input = trim($_POST['member_id']);
$book_input   = trim($_POST['book_code']);
$loan_date    = $_POST['loan_date'];
$return_date  = $_POST['return_date'];
$status       = 'dipinjam';

// Validasi 1: Pastikan tanggal kembali tidak mendahului tanggal pinjam
if (strtotime($return_date) < strtotime($loan_date)) {
    echo "<script>alert('Gagal! Tanggal kembali tidak boleh sebelum tanggal pinjam.'); window.history.back();</script>";
    exit;
}

// Validasi 2: Cek Anggota (Menggunakan Prepared Statement)
$stmt_member = mysqli_prepare($connect, "SELECT id FROM members WHERE id_anggota = ?");
mysqli_stmt_bind_param($stmt_member, "s", $member_input);
mysqli_stmt_execute($stmt_member);
$result_member = mysqli_stmt_get_result($stmt_member);
$member = mysqli_fetch_assoc($result_member);

if (!$member) {
    echo "<script>alert('Anggota dengan ID tersebut tidak ditemukan!'); window.history.back();</script>";
    exit;
}

// Validasi 3: Cek Buku (Menggunakan Prepared Statement)
$stmt_book = mysqli_prepare($connect, "SELECT id, stock FROM books WHERE book_code = ?");
mysqli_stmt_bind_param($stmt_book, "s", $book_input);
mysqli_stmt_execute($stmt_book);
$result_book = mysqli_stmt_get_result($stmt_book);
$book = mysqli_fetch_assoc($result_book);

if (!$book) {
    echo "<script>alert('Buku dengan kode tersebut tidak terdaftar!'); window.history.back();</script>";
    exit;
}

// Validasi 4: Cek Stok Buku
if ($book['stock'] <= 0) {
    echo "<script>alert('Gagal Pinjam! Stok buku ini sedang habis.'); window.history.back();</script>";
    exit;
}

$member_id_asli = $member['id'];
$book_id_asli   = $book['id'];

// Eksekusi Transaksi: Input Data Pinjam
$query_insert = "INSERT INTO loans (member_id, books_id, loan_date, return_date, status) VALUES (?, ?, ?, ?, ?)";
$stmt_insert = mysqli_prepare($connect, $query_insert);
mysqli_stmt_bind_param($stmt_insert, "iisss", $member_id_asli, $book_id_asli, $loan_date, $return_date, $status);
$execute_loan = mysqli_stmt_execute($stmt_insert);

if ($execute_loan) {
    // Update stok buku berkurang 1
    $update_stock = "UPDATE books SET stock = stock - 1 WHERE id = ?";
    $stmt_stock = mysqli_prepare($connect, $update_stock);
    mysqli_stmt_bind_param($stmt_stock, "i", $book_id_asli);
    mysqli_stmt_execute($stmt_stock);

    echo "<script>alert('Buku berhasil dipinjam'); window.location.href = 'index_loans.php';</script>";
    exit;
} else {
    echo "Data gagal ditambahkan ke sistem: " . mysqli_error($connect);
}
