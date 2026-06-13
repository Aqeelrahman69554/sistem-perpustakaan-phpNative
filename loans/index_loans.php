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
    <title>Halaman Peminjaman Buku</title>
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
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($data = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($data['book_code']) ?></td>
                    <td><?= htmlspecialchars($data['id_anggota']) ?></td>
                    <td><?= htmlspecialchars($data['full_name']) ?></td>
                    <td><?= htmlspecialchars($data['title']) ?></td>
                    <td><?= $data['loan_date'] ?></td>
                    <td><?= $data['return_date'] ?></td>
                    <td>
                        <strong><?= ucfirst($data['status']) ?></strong>
                    </td>
                    <td>
                        <?php if ($data['status'] === 'dipinjam'): ?>
                            <a href="return_loans.php?id=<?= $data['id'] ?>" onclick="return confirm('Kembalikan buku ini?')">Kembalikan</a>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</body>

</html>