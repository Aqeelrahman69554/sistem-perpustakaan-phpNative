<?php

require_once __DIR__ . '/../connection.php';

$id = $_POST['id'];

$book_code = $_POST['book_code'];
$title = $_POST['title'];
$category_id = $_POST['category_id'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$relase_year = $_POST['relase_year'];
$stock = $_POST['stock'];
$description = $_POST['description'];

$cek_query = "SELECT id FROM books WHERE book_code = '$book_code' AND id != '$id'";
$cek_result = mysqli_query($connect, $cek_query);

if (mysqli_num_rows($cek_result) > 0) {
    echo "<script>
alert('Gagal mengubah! Karena Kode buku sudah digunakan oleh buku lain');
window.history.back();
    </script>";
    exit;
}

$query = "UPDATE books SET
book_code = '$book_code',
title ='$title',
category_id ='$category_id',
author = '$author',
publisher = '$publisher',
relase_year = '$relase_year',
stock = '$stock',
description = '$description'
WHERE id = '$id'";

mysqli_query($connect, $query);

header("Location: index_books.php");

exit;
