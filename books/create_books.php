<?php
require_once __DIR__ . '/../connection.php';


$query = "SELECT * FROM categories";

$query_categories = mysqli_query($connect, $query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Halaman Tambah Buku</h1>

    <form action="store_books.php" method="post">
        <!-- ini untuk kode buku -->
        <label for="">Kode Buku :</label>
        <input type="text" name="book_code">

        <!-- ini untuk judul buku -->
        <label for="tambah">Judul Buku : </label>
        <input type="text" placeholder="masukan judul buku disni...." name="title" required>
        <br>

        <!-- ini untuk kategori buku -->
        <label for="category">Kategori : </label>
        <select name="category_id" id="">
            <option value="" desabled selected>Silahkan Pilih Kategori</option>
            <?php while ($category = mysqli_fetch_assoc($query_categories)) : ?>
                <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
            <?php endwhile; ?>
        </select>
        <br>

        <!-- ini untuk nama penulis -->
        <label for="author">Penulis : </label>
        <input type="text" placeholder="masukan nama penulis disini...." name="author">
        <br>

        <!-- ini untuk penerbit  -->
        <label for="publisher">Penerbit : </label>
        <input type="text" placeholder="masukan nama penerbit " name="publisher">
        <br>

        <!-- ini untuk tahun terbit -->
        <label for="year">Tahun Terbit : </label>
        <input type="number" placeholder="masukan tahun terbit" name="relase_year">
        <br>

        <!-- kode ini untuk jumbah stok buku -->
        <label for="stock">Jumlah Stok : </label>
        <input type="number" placeholder="masukan jumlah stok" name="stock">
        <br>

        <!-- kode ini untuk deskripsi buku -->
        <label for="description">Deskripsi Buku :</label>
        <br>
        <textarea name="description" id=""></textarea>

        <br><br>

        <button type="submit">Tambah</button>
    </form>

</html>