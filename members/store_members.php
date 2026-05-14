<?php
require_once __DIR__ . '/../connection.php';

$fullname = $_POST['nama'];
$gender = $_POST['jk'];
$phone = $_POST['telp'];
$address = $_POST['alamat'];

$query_members = "INSERT INTO members(full_name, gender, phone, address) VALUES('$fullname', '$gender', '$phone', '$address')";

$result = mysqli_query($connect, $query_members);

if($result){
    header("Location: index_members.php");
}else{
    echo "data gagal ditambahkan";
}