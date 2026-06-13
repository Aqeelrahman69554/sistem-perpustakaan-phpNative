<?php
require_once __DIR__ . '/../connection.php';

$query_loans = "SELECT loans.*, members.id_anggota, members.full_name, books.book_code, books.title FROM loans INNER JOIN members ON loans.member_id = members.id INNER JOIN books ON loans.books_id = books.id";

$result = mysqli_query($connect, $query_loans);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php $base_path = '../' ?>
    <?php include '../layouts/navbar.php' ?>

    <h1>Halaman Data Peminjaman Buku</h1>

    <button><a href="create_loans.php">Tambah Peminjaman</a></button>
    <br><br>
    <table border="2">
        <thead>
            <th>No</th>
            <th>Kode Buku</th>
            <th>ID Anggota</th>
            <th>Nama</th>
            <th>Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($data = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['book_code'] ?></td>
                    <td><?= $data['id_anggota'] ?></td>
                    <td><?= $data['full_name'] ?></td>
                    <td><?= $data['title'] ?></td>
                    <td><?= $data['loan_date'] ?></td>
                    <td><?= $data['return_date'] ?></td>
                    <td><?= $data['status'] ?></td>

                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</body>

</html>