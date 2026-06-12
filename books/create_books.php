<?php
require_once __DIR__ . '/../connection.php';


$query = "SELECT * FROM categories";

$query_categories = mysqli_query($connect, $query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* --- Reset & Base Style --- */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            /* Warna abu-abu sangat muda */
            color: #333333;
            margin: 0;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #1e3a8a;
            /* Warna biru tua */
            margin-bottom: 25px;
            font-weight: 600;
        }

        /* --- Form Container --- */
        form {
            background-color: #ffffff;
            /* Warna putih bersih */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05), 0 1px 3px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
        }

        /* --- Labels & Inputs --- */
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #4b5563;
            /* Warna abu-abu gelap untuk teks label */
            font-size: 14px;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1px solid #cbd5e1;
            /* Bingkai abu-abu muda */
            border-radius: 5px;
            background-color: #ffffff;
            color: #333333;
            font-size: 14px;
            box-sizing: border-box;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        /* Efek fokus saat input diklik */
        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #3b82f6;
            /* Warna biru cerah saat fokus */
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        /* --- Button --- */
        button[type="submit"] {
            width: 100%;
            background-color: #2563eb;
            /* Warna biru utama */
            color: #ffffff;
            border: none;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: #1d4ed8;
            /* Warna biru lebih gelap saat kursor di atasnya */
        }

        /* Menghilangkan efek <br> bawaan agar jarak diatur penuh oleh CSS */
        br {
            display: none;
        }
    </style>
</head>

<body>
    <h1>Halaman Tambah Buku</h1>

    <form action="store_books.php" method="post">
        
        <label for="">Kode Buku :</label>
        <input type="text" name="book_code">

        <label for="tambah">Judul Buku : </label>
        <input type="text" placeholder="masukan judul buku disni...." name="title" required>
        <br>

        <label for="category">Kategori : </label>
        <select name="category_id" id="">
            <option value="" desabled selected>Silahkan Pilih Kategori</option>
            <?php while ($category = mysqli_fetch_assoc($query_categories)) : ?>
                <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
            <?php endwhile; ?>
        </select>
        <br>

        <label for="author">Penulis : </label>
        <input type="text" placeholder="masukan nama penulis disini...." name="author">
        <br>

        <label for="publisher">Penerbit : </label>
        <input type="text" placeholder="masukan nama penerbit " name="publisher">
        <br>

        <label for="year">Tahun Terbit : </label>
        <input type="number" placeholder="masukan tahun terbit" name="relase_year">
        <br>

        <label for="stock">Jumlah Stok : </label>
        <input type="number" placeholder="masukan jumlah stok" name="stock">
        <br>

        <label for="description">Deskripsi Buku :</label>
        <br>
        <textarea name="description" id=""></textarea>

        <br><br>

        <button type="submit">Tambah</button>
    </form>

</html>