<?php
require_once __DIR__ . '/../connection.php';

$query_members = "SELECT * FROM members";
$query = mysqli_query($connect, $query_members);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        thead,
        th{
            padding: 10px;
        }
        tbody,
        tr,td{
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php $base_path = '../' ?>
    <?php include '../layouts/navbar.php' ?>
    <h1>Selamat Datang di Halaman Anggota</h1>
    <button><a href="create_members.php">Tambah Anggota</a></button>
    <br><br>

    <table border="2px">
        <thead>
            <th>No</th>
            <th>ID Anggota</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>No. Telp</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
            $no = 1;

            while ($data = mysqli_fetch_assoc($query)) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['id_anggota'] ?></td>
                    <td><?= $data['full_name'] ?></td>
                    <td><?= $data['gender'] ?></td>
                    <td><?= $data['phone'] ?></td>
                    <td><?= $data['address'] ?></td>
                    <td>
                        <a href="edit_members.php?id_anggota=<?= $data['id_anggota'] ?>">Edit</a>
                        <a href="delete_members.php?id_anggota=<?= $data['id_anggota'] ?>" onclick="return confirm('Yakin ingin menghapus')">Delete</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</body>

</html>