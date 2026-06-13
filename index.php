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
                        Yang saya hormati, Ibu Dr. Syifaun Nafisah, S.T., MT. selaku dosen pengampu mata kuliah Manajemen Basis Data.
                        Melalui catatan ini, saya memohon izin untuk mengunggah proyek aplikasi Sistem Informasi Perpustakaan ini secara publik ke repositori <a href="https://github.com/Aqeelrahman69554/sistem-perpustakaan-phpNative" target="_blank">GitHub pribadi saya</a>. Proyek yang merupakan pemenuhan tugas Ujian Akhir Semester (UAS) ini saya publikasikan semata-mata untuk kepentingan portofolio akademis serta dokumentasi rekam jejak digital proses belajar saya, dan tidak ada maksud maupun tujuan lainnya.
                    </p>

                    <p class="text-muted" style="font-size: 0.95rem; line-height: 1.6; text-align: justify; margin-bottom: 15px;">
                        Dalam pengembangan sistem ini, saya telah berupaya mengimplementasikan arsitektur database relasional yang optimal—seperti menjaga data integrity serta menerapkan otomasi manajemen stok—guna menyelaraskan dengan standar industri dan materi yang telah Ibu ajarkan selama perkuliahan.
                    </p>

                    <p class="text-muted" style="font-size: 0.95rem; line-height: 1.6; text-align: justify; margin-bottom: 0;">
                        Oleh karena itu, saya sangat mengharapkan serta terbuka menerima segala bentuk evaluasi, kritik, maupun saran dari Ibu apabila terdapat kesalahan logika atau bagian koding yang masih perlu dioptimasi demi peningkatan kualitas kemampuan saya ke depan. Segala bentuk penilaian akademik sepenuhnya tetap merujuk pada ketentuan yang berlaku. Terima kasih banyak atas bimbingan dan ilmu yang telah Ibu berikan.
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