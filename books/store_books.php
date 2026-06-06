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


$query = "INSERT INTO books(book_code,title, category_id, author, publisher, relase_year, stock, description) VALUES('$book_code','$title', '$category_id', '$author', '$publisher', '$year', '$stok', '$description')";

$result = mysqli_query($connect, $query);

if ($result) {
    header("Location: index_books.php");
} else {
    echo "gagal";
}
