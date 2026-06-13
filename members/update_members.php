<?php

require_once __DIR__ . '/../connection.php';

$id = $_POST['id'];
$id_anggota = $_POST['id_anggota'];

$name = $_POST['nama'];
$gender = $_POST['jk'];
$phone = $_POST['telp'];
$address = $_POST['alamat'];

$cek_query = "SELECT id_anggota FROM members WHERE id_anggota = '$id_anggota' AND id != '$id' ";
$cek_result = mysqli_query($connect, $cek_query);

if(mysqli_num_rows($cek_result) > 0){
    echo "<script>
    alert('gagal menambahkan! karena ID Anggota sudah digunakan oleh anggota lain');
    window.history.back();
    </script>";
    exit;
}

$query_update_members = "UPDATE members SET
id_anggota = '$id',
full_name = '$name',
gender = '$gender',
phone = '$phone',
address = '$address'

WHERE id_anggota = '$id'";

$result = mysqli_query($connect, $query_update_members);

if ($result) {
    echo "
    <script>

    alert('data berhasil diupdate');
    window.location.href='index_members.php';
    </script>
    ";
}else{
    echo "data gagal diupdate";
}
