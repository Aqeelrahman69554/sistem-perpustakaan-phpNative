<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Halaman Tambah Peminjaman</h1>

    <form action="store_loans.php" method="post">
        <p>
            <label for="">ID Member</label>
            <input type="number" name="member_id" required>
            <a href="../members/index_members.php" style="margin-left: 10px;" target="_blank">lihat daftar anggota</a>
        </p>

        <p>
            <label for="">Kode Buku</label>
            <input type="text" name="book_code" required>
            <a href="../books/index_books.php" style="margin-left:10px;" target="_blank">lihat daftar buku</a><br>
        </p>

        <p>
            <label for="">Tanggal Pinjam</label>
            <input type="date" name="loan_date" required><br>
        </p>

        <p>
            <label for="">Tanggal Kembali</label>
            <input type="date" name="return_date" required><br>
        </p>
        <button type="submit">Pinjam</button>
    </form>



</body>

</html>