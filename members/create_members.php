<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perpustakaan</title>
</head>

<body>
    <h1>Halaman Tambah Anggota</h1>

    <form action="store_members.php" method="post">
        <label for="">Nama Lengkap : </label>
        <input type="text" name="nama" placeholder="masukan nama anda disini" required>
        <br><br>

        <label for="">Jenis Kelamin</label><br>
        <input type="radio" name="jk" value="laki-laki">Laki-Laki
        <input type="radio" name="jk" value="perempuan">Perempuan
        <br><br>

        <label for="">Phone : </label>
        <input type="number" name="telp" placeholder="masukan dengan format +62" style="width: 190px;">
        <br><br>

        <label for="">Alamat</label><br>
        <textarea name="alamat" id=""></textarea>
        <br><br>
        <button type="submit">Tambah</button>
    </form>
</body>

</html>