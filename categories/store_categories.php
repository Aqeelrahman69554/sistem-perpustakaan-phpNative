<?php
require_once __DIR__ . '/../connection.php';

$category_name = $_POST['category_name'];

$query = "INSERT INTO categories (category_name) VALUES('$category_name')";

$result = mysqli_query($connect, $query);

if ($result) {
    
    header("location: index_categories.php");
} else {
    echo "penyimpanan gagal";
}
