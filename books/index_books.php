<?php
require_once __DIR__ . '/../connection.php';

$query_books = "SELECT books.*, categories.category_name
FROM books
INNER JOIN categories ON books.category_id = categories.id";
$query = mysqli_query($connect, $query_books);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        thead,
        th {
            padding: 10px;
        }

        tbody,
        tr,
        td {
            padding: 4px;
        }
    </style>
</head>

<body>

    <?php $base_path = '../' ?>
    <?php include '../layouts/navbar.php'; ?>
    <h1>Halaman Buku</h1>

    <button><a href="create_books.php">Tambah Buku</a></button>
    <br><br>

    <table border="1">
        <thead>
            <th>No</th>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Kategori</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Tebit</th>
            <th>Stok</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
            $no = 1;

            while ($data = mysqli_fetch_assoc($query)):
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['book_code'] ?></td>
                    <td><?= $data['title'] ?></td>
                    <td><?= $data['category_name'] ?></td>
                    <td><?= $data['author']  ?></td>
                    <td><?= $data['publisher'] ?></td>
                    <td><?= $data['relase_year'] ?></td>
                    <td><?= $data['stock'] ?></td>
                    <td style="width: 500px;"><?= $data['description'] ?></td>
                    <td>
                        <a href="edit_books.php?id=<?= $data['id'] ?>">Edit</a>
                        <a href="delete_books.php?id=<?= $data['id'] ?>" onclick="return confirm(' apakah yakin ingin menghapus buku ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <br><br>
    <hr>
    <?php include '../layouts/footer.php' ?>

</body>

</html>