<?php
require_once __DIR__ .'/../connection.php';

$id = $_GET['id'];

$query_delete_category = "DELETE FROM categories WHERE id = '$id'";

$query = mysqli_query($connect, $query_delete_category);

header("location: index.php");

?>