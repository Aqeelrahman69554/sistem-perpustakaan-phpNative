<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php $base_path = ''; ?>

    <?php include 'layouts/navbar.php'; ?>

    <div class="container mt-4">
        <h1>Selamat Datang di Sistem Perpustakaan</h1>
        <hr>
        <p class="text-muted">Gunakan menu di atas untuk mengelola data perpustakaan.</p>
    </div>

    <button type="button" id="btnPemicuModal" class="d-none" data-bs-toggle="modal" data-bs-target="#modalIzin"></button>



    <hr>
    <?php include 'layouts/footer.php'; ?>


</body>

</html>