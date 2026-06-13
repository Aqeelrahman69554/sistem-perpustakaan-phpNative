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


    <div class="modal fade" id="modalIzin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalIzinLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background-color: #f5efe6; border: none; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">

                <div class="modal-header" style="border-bottom: 1px solid #d6cea6; padding: 20px 24px;">
                    <h5 class="modal-title fw-bold" id="modalIzinLabel" style="color: #4e4376;">
                        📌 Catatan Pengembang & Izin Publikasi Portofolio
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" style="padding: 24px; color: #333;">
                    <p class="text-muted" style="font-size: 0.95rem; line-height: 1.6; text-align: justify; margin-bottom: 15px;">
                        <strong>Yth. Bapak/Ibu Dosen Pengampu</strong>, mohon izin. Proyek aplikasi <strong>Sistem Informasi Perpustakaan (SIPUS)</strong>
                        yang merupakan pemenuhan tugas mata kuliah ini, saya unggah secara publik ke repositori <a href="">GitHub pribadi saya</a> sebagai bagian dari
                        portofolio akademis dan rekam jejak digital proses belajar saya di Program Studi Ilmu Perpustakaan, UIN Sunan Kalijaga.
                        Guna menyelaraskan dengan standar industri yang saya pelajari di berbagai platform, saya telah mengoptimasi arsitektur database relasional proyek ini (seperti data integrity
                        dan manajemen otomatisasi stok) serta menyertakan dokumentasi lengkap.
                    </p>

                    <p class="text-muted" style="font-size: 0.95rem; line-height: 1.6; text-align: justify; margin-bottom: 15px;">
                        Aplikasi ini dirancang menggunakan konfigurasi lingkungan lokal standar. Namun, sebagai opsi tambahan untuk mempermudah pengujian,
                        <strong>jika aplikasi ini tidak bisa berjalan langsung di perangkat Bapak/Ibu, saya mohon izin untuk membuatkan file Docker</strong>
                        (`Dockerfile` / `docker-compose.yml`) agar lingkungan sistem dapat terisolasi dan dijalankan secara instan.
                    </p>

                    <p class="text-muted" style="font-size: 0.95rem; line-height: 1.6; text-align: justify; margin-bottom: 0;">
                        Oleh karena itu, jika Bapak/Ibu menemukan adanya kesalahan logika, ketidaksesuaian standar koding, atau bagian yang masih bisa dioptimasi,
                        <strong>segala bentuk evaluasi, kritik, dan saran sangat saya butuhkan</strong> demi peningkatan kualitas koding saya ke depannya.
                        Segala bentuk penilaian akademik sepenuhnya tetap merujuk pada ketentuan perkuliahan. Terima kasih banyak atas bimbingan yang Bapak/Ibu berikan.
                    </p>
                </div>

                <div class="modal-footer" style="border-top: 1px solid #d6cea6; justify-content: space-between; padding: 16px 24px;">
                    <p class="mb-0 small fw-bold text-secondary">Hormat saya, Muhammad Aqeel Rahman</p>
                    <button type="button" class="btn text-white fw-bold px-4" data-bs-dismiss="modal" style="background-color: #7868e6; border-radius: 6px;">
                        Pahami & Buka Aplikasi
                    </button>
                </div>

            </div>
        </div>
    </div>


    <hr>
    <?php include 'layouts/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var pemicu = document.getElementById('btnPemicuModal');
            if (pemicu) {
                // Memanggil trigger modal bawaan bootstrap
                var myModal = new bootstrap.Modal(document.getElementById('modalIzin'));
                myModal.show();
            }
        });
    </script>
</body>

</html>