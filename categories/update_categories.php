<?php

require_once __DIR__ . '/../connection.php';

$id = $_POST['id'];

$category_name = $_POST['category_name'];

$cek_query = "SELECT id FROM categories WHERE category_name = '$category_name' AND id != '$id'";
$cek_result = mysqli_query($connect, $cek_query);

if(mysqli_num_rows($cek_result) > 0){
    echo "<script>
    alert('gagal merubah data kategori! karena nama kategori sudah digunakan oleh kategori lain');
    window.history.back();
    </script>";
    exit;
}

$query = "UPDATE categories
SET category_name = '$category_name'
WHERE id = '$id'";

mysqli_query($connect, $query);

header("Location: index_categories.php");

exit;
