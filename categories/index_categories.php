<?php
require_once __DIR__ . '/../connection.php';
$query_category = "SELECT * FROM categories";
$query = mysqli_query($connect, $query_category);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Categories</title>
</head>

<body>
    <?php $base_path = '../' ?>
    <?php include '../layouts/navbar.php'; ?>
    <hr>

    <h1>Selamat Datang di Halaman Kategori Buku</h1>
    <button><a href="create_categories.php">Tambah Kategori</a></button>
    <br><br>
    <table border="1">
        <thead>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
            $no = 1;

            while ($data = mysqli_fetch_assoc($query)) :
            ?>

                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['category_name'] ?></td>
                    <td>
                        <a href="edit_categories.php?id=<?= $data['id'] ?>">Edit</a>
                        <a href="delete_categories.php?id=<?= $data['id'] ?>" onclick="return confirm('yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>

            <?php endwhile; ?>
        </tbody>
    </table>

    <hr>
    <?php include '../layouts/footer.php' ?>
</body>

</html>