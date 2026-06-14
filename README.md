# Sistem Perpustakaan PHP Native

Sistem Perpustakaan adalah aplikasi web sederhana untuk mengelola data perpustakaan. Project ini dibuat menggunakan **PHP Native**, **MySQL/MariaDB**, dan **MySQLi** dengan struktur modul CRUD yang mudah dipahami.

Aplikasi ini cocok digunakan sebagai project latihan manajemen basis data karena sudah mencakup relasi data antar tabel, validasi data duplikat, transaksi peminjaman, pengembalian buku, dan pembaruan stok buku.

## Daftar Isi

- [Fitur](#fitur)
- [Teknologi](#teknologi)
- [Struktur Project](#struktur-project)
- [Kebutuhan Sistem](#kebutuhan-sistem)
- [Konfigurasi Database](#konfigurasi-database)
- [Struktur Tabel Database](#struktur-tabel-database)
- [Cara Menjalankan Project](#cara-menjalankan-project)
- [Alur Penggunaan](#alur-penggunaan)
- [Pengujian Manual](#pengujian-manual)
- [Catatan Pengembangan](#catatan-pengembangan)

## Fitur

### Dashboard

- Halaman utama aplikasi berada di `index.php`.
- Navigasi utama dikelola melalui file `layouts/navbar.php`.
- Footer aplikasi dikelola melalui file `layouts/footer.php`.
- Terdapat modal catatan pengembang pada halaman awal.

### Layout Aplikasi

Project menggunakan folder `layouts/` untuk menyimpan bagian tampilan yang dipakai berulang.

File layout yang tersedia:

- `layouts/navbar.php` untuk menu navigasi utama.
- `layouts/footer.php` untuk footer aplikasi.
- `layouts/header.php` disiapkan untuk pengembangan struktur header.

Footer sudah dipasang pada halaman index utama dan halaman daftar data:

- `index.php`
- `books/index_books.php`
- `members/index_members.php`
- `categories/index_categories.php`
- `loans/index_loans.php`

### Manajemen Kategori

Modul kategori berada di folder `categories/`.

Fitur yang tersedia:

- Menampilkan daftar kategori.
- Menambahkan kategori baru.
- Mengubah data kategori.
- Menghapus data kategori.
- Validasi nama kategori agar tidak duplikat saat tambah dan edit data.

### Manajemen Buku

Modul buku berada di folder `books/`.

Fitur yang tersedia:

- Menampilkan daftar buku.
- Menambahkan buku baru.
- Mengubah data buku.
- Menghapus data buku.
- Menampilkan kategori buku melalui relasi `category_id`.
- Validasi kode buku agar tidak duplikat saat tambah dan edit data.
- Menyimpan data buku seperti kode buku, judul, kategori, penulis, penerbit, tahun terbit, stok, dan deskripsi.

### Manajemen Anggota

Modul anggota berada di folder `members/`.

Fitur yang tersedia:

- Menampilkan daftar anggota perpustakaan.
- Menambahkan anggota baru.
- Mengubah data anggota.
- Menghapus data anggota.
- Validasi ID anggota agar tidak duplikat.
- Menyimpan data anggota seperti ID anggota, nama lengkap, jenis kelamin, nomor telepon, dan alamat.

### Manajemen Peminjaman

Modul peminjaman berada di folder `loans/`.

Fitur yang tersedia:

- Menampilkan daftar peminjaman buku.
- Menambahkan transaksi peminjaman.
- Menampilkan data peminjaman yang terhubung dengan data anggota dan buku.
- Validasi ID anggota berdasarkan tabel `members`.
- Validasi kode buku berdasarkan tabel `books`.
- Validasi tanggal kembali agar tidak lebih awal dari tanggal pinjam.
- Validasi stok buku sebelum peminjaman.
- Mengurangi stok buku otomatis saat peminjaman berhasil.
- Mengatur status awal peminjaman menjadi `dipinjam`.

### Pengembalian Buku

Fitur pengembalian berada di file `loans/return_loans.php`.

Fitur yang tersedia:

- Mengubah status peminjaman dari `dipinjam` menjadi `dikembalikan`.
- Menambah stok buku otomatis saat buku dikembalikan.
- Mencegah buku yang sudah dikembalikan diproses ulang.
- Menghitung denda keterlambatan sebesar Rp2.000 per hari jika tanggal pengembalian melewati `return_date`.

## Teknologi

- PHP Native
- MySQL atau MariaDB
- MySQLi
- HTML
- CSS
- Bootstrap 5 CDN pada halaman utama
- Laragon atau XAMPP sebagai local server

## Struktur Project

```text
sistem-perpustakaan/
|-- books/
|   |-- create_books.php
|   |-- delete_books.php
|   |-- edit_books.php
|   |-- index_books.php
|   |-- store_books.php
|   `-- update_books.php
|-- categories/
|   |-- create_categories.php
|   |-- delete_categories.php
|   |-- edit_categories.php
|   |-- index_categories.php
|   |-- store_categories.php
|   `-- update_categories.php
|-- layouts/
|   |-- footer.php
|   |-- header.php
|   `-- navbar.php
|-- loans/
|   |-- create_loans.php
|   |-- index_loans.php
|   |-- return_loans.php
|   `-- store_loans.php
|-- members/
|   |-- create_members.php
|   |-- delete_members.php
|   |-- edit_members.php
|   |-- index_members.php
|   |-- store_members.php
|   `-- update_members.php
|-- connection.php
|-- index.php
`-- README.md
```

## Kebutuhan Sistem

Pastikan perangkat sudah memiliki:

- PHP 7.4 atau versi yang lebih baru.
- MySQL atau MariaDB.
- Laragon, XAMPP, atau web server lokal lain.
- Browser seperti Chrome, Edge, atau Firefox.

## Konfigurasi Database

File konfigurasi koneksi database berada di:

```text
connection.php
```

Konfigurasi default:

```php
$host = "localhost";
$username = "root";
$password = "";
$database = "sistem-perpustakaan";
```

Jika konfigurasi MySQL di perangkat berbeda, sesuaikan nilai `$host`, `$username`, `$password`, dan `$database`.

Catatan: file `connection.php` hanya menampilkan pesan saat koneksi gagal. Jika koneksi berhasil, aplikasi tidak menampilkan teks tambahan agar tampilan halaman tetap rapi.

## Struktur Tabel Database

Buat database dengan nama:

```sql
CREATE DATABASE `sistem-perpustakaan`;
USE `sistem-perpustakaan`;
```

### Tabel `categories`

```sql
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL
);
```

### Tabel `books`

```sql
CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_code VARCHAR(50) NOT NULL,
    title VARCHAR(150) NOT NULL,
    category_id INT NOT NULL,
    author VARCHAR(100),
    publisher VARCHAR(100),
    relase_year INT,
    stock INT DEFAULT 0,
    description TEXT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
```

Catatan: kolom `relase_year` mengikuti nama field yang digunakan pada kode program.

### Tabel `members`

```sql
CREATE TABLE members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_anggota VARCHAR(50) NOT NULL,
    full_name VARCHAR(150) NOT NULL,
    gender VARCHAR(20),
    phone VARCHAR(20),
    address TEXT
);
```

### Tabel `loans`

```sql
CREATE TABLE loans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_id INT NOT NULL,
    books_id INT NOT NULL,
    loan_date DATE NOT NULL,
    return_date DATE NOT NULL,
    status VARCHAR(50) NOT NULL,
    FOREIGN KEY (member_id) REFERENCES members(id),
    FOREIGN KEY (books_id) REFERENCES books(id)
);
```

## Cara Menjalankan Project

1. Letakkan folder project di direktori web server lokal.

   Contoh Laragon:

   ```text
   C:\laragon\www\sistem-perpustakaan
   ```

   Contoh XAMPP:

   ```text
   C:\xampp\htdocs\sistem-perpustakaan
   ```

2. Jalankan Apache dan MySQL dari Laragon atau XAMPP.

3. Buat database `sistem-perpustakaan`.

4. Buat tabel database sesuai struktur pada bagian [Struktur Tabel Database](#struktur-tabel-database).

5. Sesuaikan konfigurasi koneksi di `connection.php` jika diperlukan.

6. Buka aplikasi melalui browser:

   ```text
   http://localhost/sistem-perpustakaan
   ```

## Alur Penggunaan

1. Tambahkan data kategori buku.
2. Tambahkan data buku dan pilih kategori yang sesuai.
3. Tambahkan data anggota perpustakaan.
4. Buka halaman peminjaman.
5. Isi ID anggota, kode buku, tanggal pinjam, dan tanggal kembali.
6. Jika data valid dan stok tersedia, sistem menyimpan peminjaman dan stok buku berkurang otomatis.
7. Saat buku dikembalikan, klik aksi `Kembalikan` pada halaman data peminjaman.
8. Sistem mengubah status menjadi `dikembalikan`, menambah stok buku, dan menghitung denda jika terlambat.

## Pengujian Manual

### Kategori

- Tambahkan kategori baru, misalnya `Novel`.
- Coba tambahkan kategori dengan nama yang sama.
- Sistem seharusnya menolak data duplikat.
- Coba edit kategori menjadi nama kategori lain yang sudah ada.
- Sistem seharusnya menolak perubahan tersebut.

### Buku

- Tambahkan buku baru dengan kode unik, misalnya `BK001`.
- Coba tambahkan buku lain dengan kode yang sama.
- Sistem seharusnya menolak data duplikat.
- Coba edit kode buku menjadi kode yang sudah digunakan buku lain.
- Sistem seharusnya menolak perubahan tersebut.

### Anggota

- Tambahkan anggota baru dengan ID unik, misalnya `1001`.
- Coba tambahkan anggota lain dengan ID yang sama.
- Sistem seharusnya menolak data duplikat.
- Coba edit ID anggota menjadi ID yang sudah digunakan anggota lain.
- Sistem seharusnya menolak perubahan tersebut.

### Peminjaman

- Pastikan sudah ada data anggota.
- Pastikan sudah ada data buku dengan stok lebih dari 0.
- Tambahkan peminjaman menggunakan ID anggota dan kode buku yang valid.
- Sistem seharusnya menyimpan peminjaman dengan status `dipinjam`.
- Stok buku seharusnya berkurang 1.

### Validasi Peminjaman

- Masukkan ID anggota yang tidak terdaftar.
- Sistem seharusnya menampilkan peringatan bahwa anggota tidak ditemukan.
- Masukkan kode buku yang tidak terdaftar.
- Sistem seharusnya menampilkan peringatan bahwa buku tidak terdaftar.
- Masukkan tanggal kembali sebelum tanggal pinjam.
- Sistem seharusnya menolak transaksi.
- Pinjam buku dengan stok `0`.
- Sistem seharusnya menolak peminjaman karena stok habis.

### Pengembalian

- Buka halaman daftar peminjaman.
- Klik aksi `Kembalikan` pada data dengan status `dipinjam`.
- Sistem seharusnya mengubah status menjadi `dikembalikan`.
- Stok buku seharusnya bertambah 1.
- Jika tanggal pengembalian melewati tanggal kembali, sistem menampilkan total denda.

## Catatan Pengembangan

- Project masih menggunakan PHP Native dan MySQLi.
- Layout berulang seperti navbar dan footer dipisahkan ke folder `layouts/` agar lebih mudah digunakan di banyak halaman.
- Sebagian query sudah menggunakan prepared statement, terutama pada fitur peminjaman dan pengembalian.
- Beberapa modul CRUD masih menggunakan query langsung, sehingga bisa dikembangkan lagi dengan prepared statement agar lebih aman.
- Fitur yang bisa ditambahkan berikutnya:
  - login dan role pengguna,
  - pencarian data,
  - pagination,
  - export laporan,
  - halaman detail buku,
  - riwayat denda,
  - file SQL dump agar instalasi database lebih cepat.

## Pembuat

Project ini dibuat sebagai latihan pembuatan Sistem Perpustakaan berbasis PHP Native dan MySQL.
