<?php

require_once __DIR__ . '/../connection.php';

$id = $_GET['id'];
$query_books =  "SELECT books.*, categories.category_name
FROM books
INNER JOIN categories ON books.category_id = categories.id WHERE books.id = '$id'";
$query_categories = mysqli_query($connect, "SELECT * FROM categories");


$query = mysqli_query($connect, $query_books);

$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data buku tidak ditemukan.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            padding: 25px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 12px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 18px;
            background-color: #0d6efd;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Halaman Edit Buku</h1>

        <form action="update_books.php" method="POST">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <label for="">Kode Buku</label>
            <input type="text" name="book_code" value="<?= $data['book_code'] ?>">

            <label>Judul Buku</label>
            <input type="text" name="title" value="<?= $data['title'] ?>">

            <label>Kategori</label>
            <select name="category_id" id="">
                <?php while ($category = mysqli_fetch_assoc($query_categories)) : ?>
                    <option value="<?= $category['id'] ?>" <?= $category['id'] == $data['category_id'] ? 'selected' : '' ?>><?= $category['category_name'] ?></option>
                <?php endwhile; ?>
            </select>


            <label>Penulis</label>
            <input type="text" name="author" value="<?= $data['author'] ?>">

            <label>Penerbit</label>
            <input type="text" name="publisher" value="<?= $data['publisher'] ?>">

            <label>Tahun Terbit</label>
            <input type="text" name="relase_year" value="<?= $data['relase_year'] ?>">

            <label>Stok</label>
            <input type="text" name="stock" value="<?= $data['stock'] ?>">

            <label>Deskripsi</label>
            <input type="text" name="description" value="<?= $data['description'] ?>">

            <button type="submit">Update</button>
        </form>
    </div>
</body>

</html>