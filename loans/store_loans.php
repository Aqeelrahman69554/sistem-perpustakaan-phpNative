<?php

require_once __DIR__ . '/../connection.php';


$member_input = $_POST['member_id'];
$book_input   = $_POST['book_code'];
$loan_date    = $_POST['loan_date'];
$return_date  = $_POST['return_date'];
$status       = 'dipinjam';


$query_member = "SELECT id FROM members WHERE id_anggota = '$member_input'";
$result_member = mysqli_query($connect, $query_member);
$member = mysqli_fetch_assoc($result_member);

if (!$member) {
    echo "<script>
            alert('Anggota dengan ID tersebut tidak ditemukan!');
            window.history.back();
        </script>";
    exit;
}


$query_book = "SELECT id, stock FROM books WHERE book_code = '$book_input'";
$result_book = mysqli_query($connect, $query_book);
$book = mysqli_fetch_assoc($result_book);

if (!$book) {
    echo "<script>
            alert('Buku dengan kode tersebut tidak terdaftar!');
            window.history.back();
        </script>";
    exit;
}


if ($book['stock'] <= 0) {
    echo "<script>
            alert('Gagal Pinjam! Stok buku ini sedang habis.');
            window.history.back();
        </script>";
    exit;
}


$member_id_asli = $member['id'];
$book_id_asli   = $book['id'];


$query_insert = "INSERT INTO loans (member_id, books_id, loan_date, return_date, status) VALUES ('$member_id_asli', '$book_id_asli', '$loan_date', '$return_date', '$status')";

$execute_loan = mysqli_query($connect, $query_insert);

if ($execute_loan) {

    $update_stock = "UPDATE books SET stock = stock - 1 WHERE id = '$book_id_asli'";
    mysqli_query($connect, $update_stock);

    echo "<script>
            alert('Buku berhasil dipinjam');
            window.location.href = 'index_loans.php';
        </script>";
    exit;
} else {
    echo "Data gagal ditambahkan ke sistem: " . mysqli_error($connect);
}
