<?php

require_once __DIR__ . '/../connection.php';

$book_code = $_POST['book_code'];
$title = $_POST['title'];
$category_id = $_POST['category_id'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$year = $_POST['relase_year'];
$stok = $_POST['stock'];
$description = $_POST['description'];

$cek_query = "SELECT book_code FROM books WHERE book_code = '$book_code'";
$cek_result = mysqli_query($connect,$cek_query);

if(mysqli_num_rows($cek_result) > 0){
    echo "<script>
    alert('gagal menambahkan kode buku!, karena kode buku sudah digunakan oleh buku lain');
    window.history.back();
    </script>";
    exit;
}


$query = "INSERT INTO books(book_code,title, category_id, author, publisher, relase_year, stock, description) VALUES('$book_code','$title', '$category_id', '$author', '$publisher', '$year', '$stok', '$description')";

$result = mysqli_query($connect, $query);

if ($result) {
    header("Location: index_books.php");
} else {
    echo "gagal";
}
