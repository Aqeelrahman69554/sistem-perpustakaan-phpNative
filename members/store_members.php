<?php
require_once __DIR__ . '/../connection.php';

$id_anggota = $_POST['id_anggota'];
$fullname = $_POST['nama'];
$gender = $_POST['jk'];
$phone = $_POST['telp'];
$address = $_POST['alamat'];

$cek_query = "SELECT id_anggota FROM members WHERE id_anggota = '$id_anggota'";
$cek_result = mysqli_query($connect,$cek_query);

if(mysqli_num_rows($cek_result) > 0){
    echo "<script>
    alert('Gagal menambahkan, karena nomor anggota sudah terdaftar');
    window.history.back();
    </script>";
    exit;
}

$query_members = "INSERT INTO members(id_anggota,full_name, gender, phone, address) VALUES('$id_anggota','$fullname', '$gender', '$phone', '$address')";

$result = mysqli_query($connect, $query_members);

if ($result) {
    header("Location: index_members.php");
} else {
    echo "data gagal ditambahkan";
}
