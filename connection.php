<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "sistem-perpustakaan";

$connect = mysqli_connect($host, $username, $password, $database);

if (!$connect) {
    die("gagal");
}
