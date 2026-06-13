<?php
require_once __DIR__ . '/../connection.php';

$category_name = $_POST['category_name'];

$cek_query = "SELECT id FROM categories WHERE category_name = '$category_name'";
$cek_result = mysqli_query($connect, $cek_query);

if(mysqli_num_rows($cek_result) > 0){
    echo "<script>
    alert('gagal menambahkan! karena nama kategori sudah digunakan oleh kategori lain');
    window.history.back();
    </script>";
    exit;
}

$query = "INSERT INTO categories (category_name) VALUES('$category_name')";

$result = mysqli_query($connect, $query);

if ($result) {

    header("location: index_categories.php");
} else {
    echo "penyimpanan gagal";
}
