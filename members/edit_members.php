<?php
require_once __DIR__ . '/../connection.php';

$id = $_GET['id_anggota'];

$query_members = "SELECT * FROM members WHERE  id_anggota = '$id'";

$query = mysqli_query($connect, $query_members);
$data = mysqli_fetch_assoc($query);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Halaman Edit</h1>
    <form action="update_members.php" method="post">
        <label for="">ID Anggota</label>
        <input type="number" name="id_anggota" value="<?= $data['id_anggota'] ?>"><br><br>

        <label for="">Nama Lengkap : </label>
        <input type="text" name="nama" value="<?= $data['full_name'] ?>"><br><br>

        <label for="">Jenis Kelamin : </label><br>
        <input type="radio" name="jk" value="laki-laki" <?= $data['gender'] == 'laki-laki' ? 'checked' : '' ?>>Laki-laki
        <input type="radio" name="jk" value="perempuan" <?= $data['gender'] == 'perempuan' ? 'checked' : '' ?>>Perempuan

        <br><br>
        <label for="">No Telp : </label>
        <input type="number" name="telp" value="<?= $data['phone'] ?>"><br><br>


        <label for="">Alamat : </label><br><br>
        <textarea name="alamat" id=""><?= $data['address'] ?></textarea><br><br>

        <button type="submit">Update</button>

    </form>
</body>

</html>