<?php
require_once __DIR__ . '/../connection.php';

$id = $_GET['id'];

$query_delete_book = "DELETE FROM books WHERE id = '$id'";


$query = mysqli_query($connect,$query_delete_book);

header("Location: index_books.php"); 


?>