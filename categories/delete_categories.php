<?php
require_once __DIR__ . '/../connection.php';

$id = $_GET['id'];

$query_category = mysqli_query($connect, "SELECT * FROM categories WHERE id = '$id'");

$category = mysqli_fetch_assoc($query_category);

$category_name = $category['category_name'];



try {
    $query_delete_category = "DELETE FROM categories WHERE id = '$id'";

    $query = mysqli_query($connect, $query_delete_category);

    header("Location: index_categories.php");

    exit;
} catch (mysqli_sql_exception $e) {
    echo " 
    <script>

    alert('kategori $category_name tidak bisa dihapus karena terdapat buku yang masih menggunakan kategori tersegbut');
    window.location.href='index_categories.php';
    
    </script>
    ";
}
