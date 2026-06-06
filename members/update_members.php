<?php

require_once __DIR__ . '/../connection.php';

$id = $_POST['id_anggota'];

$name = $_POST['nama'];
$gender = $_POST['jk'];
$phone = $_POST['telp'];
$address = $_POST['alamat'];

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
