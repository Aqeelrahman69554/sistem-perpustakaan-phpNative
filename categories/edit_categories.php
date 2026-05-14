<?php 
require_once __DIR__ . '/../connection.php';

$id = $_GET['id'];

$query_category ="SELECT * FROM categories WHERE id= '$id'";
$query = mysqli_query($connect,$query_category);

$data = mysqli_fetch_assoc($query);


?>

<h1>Halaman Edit Kategori</h1>


<form action="update_categories.php" method="POST">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <label for="">Nama Kategori</label> :
    <input type="text" name="category_name" value="<?= $data['category_name'] ?>">

    <button type="submit">Update</button>
</form>