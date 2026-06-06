<?php

require_once __DIR__ . '/../connection.php';

$id = $_GET['id_anggota'];

$query_delete_members = "DELETE FROM members WHERE id_anggota = '$id'";

$result = mysqli_query($connect, $query_delete_members);

if ($result) {
    echo "
    <script>
    alert('data berhasil dihapus');
    window.location.href='index_members.php';
    </script>
    ";
} else {
    echo "data anggota gagal ditambahkan";
}
