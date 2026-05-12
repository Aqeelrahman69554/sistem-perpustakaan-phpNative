<?php

require_once __DIR__ . '/../connection.php';

$id = $_POST['id'];

$category_name = $_POST['category_name'];

$query = "UPDATE categories
SET category_name = '$category_name'
WHERE id = '$id'";

mysqli_query($connect, $query);

header("Location: index.php");

exit;
