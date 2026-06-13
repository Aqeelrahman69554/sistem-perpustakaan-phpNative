# Sistem Perpustakaan

Sistem Perpustakaan adalah aplikasi web sederhana berbasis **PHP Native** dan **MySQL** untuk mengelola data buku, kategori buku, anggota perpustakaan, serta transaksi peminjaman buku.

Project ini dibuat dengan struktur CRUD sederhana agar mudah dipahami, dikembangkan, dan diuji. Setiap modul dipisahkan ke dalam folder masing-masing supaya alur program lebih rapi.

## Fitur Utama

### 1. Manajemen Buku

Fitur pada modul buku:

- Menampilkan daftar buku.
- Menambahkan data buku baru.
- Mengubah data buku.
- Menghapus data buku.
- Menampilkan kategori buku melalui relasi dengan tabel kategori.
- Menyimpan informasi buku seperti:
  - kode buku,
  - judul,
  - kategori,
  - penulis,
  - penerbit,
  - tahun terbit,
  - stok,
  - deskripsi.

Fitur pengecekan pada modul buku:

- Sistem mengecek apakah `book_code` sudah digunakan.
- Jika kode buku sudah ada, data buku tidak akan disimpan.
- Saat mengubah data buku, sistem juga mengecek agar kode buku tidak sama dengan buku lain.

### 2. Manajemen Kategori

Fitur pada modul kategori:

- Menampilkan daftar kategori buku.
- Menambahkan kategori baru.
- Mengubah nama kategori.
- Menghapus kategori.

Fitur pengecekan pada modul kategori:

- Sistem mengecek apakah nama kategori sudah digunakan.
- Jika nama kategori sudah ada, sistem akan menampilkan peringatan dan membatalkan proses penyimpanan.
- Saat mengubah kategori, sistem memastikan nama kategori tidak sama dengan kategori lain.

### 3. Manajemen Anggota

Fitur pada modul anggota:

- Menampilkan daftar anggota perpustakaan.
- Menambahkan anggota baru.
- Mengubah data anggota.
- Menghapus data anggota.
- Menyimpan informasi anggota seperti:
  - ID anggota,
  - nama lengkap,
  - jenis kelamin,
  - nomor telepon,
  - alamat.

Fitur pengecekan pada modul anggota:

- Sistem mengecek apakah `id_anggota` sudah terdaftar.
- Jika ID anggota sudah digunakan, data anggota baru tidak akan disimpan.
- Saat mengubah data anggota, sistem mengecek agar ID anggota tidak bentrok dengan anggota lain.

### 4. Manajemen Peminjaman Buku

Fitur pada modul peminjaman:

- Menampilkan daftar peminjaman buku.
- Menambahkan transaksi peminjaman.
- Menampilkan data peminjaman yang terhubung dengan data anggota dan data buku.
- Menyimpan informasi peminjaman seperti:
  - kode buku,
  - ID anggota,
  - nama anggota,
  - judul buku,
  - tanggal pinjam,
  - tanggal kembali,
  - status peminjaman.

Fitur pengecekan pada modul peminjaman:

- Sistem mengecek apakah ID anggota yang dimasukkan terdaftar di tabel `members`.
- Sistem mengecek apakah kode buku yang dimasukkan terdaftar di tabel `books`.
- Sistem mengecek stok buku sebelum proses peminjaman.
- Jika stok buku habis, peminjaman dibatalkan.
- Jika peminjaman berhasil, stok buku otomatis berkurang satu.
- Status awal peminjaman otomatis diisi dengan nilai `dipinjam`.

## Teknologi yang Digunakan

- PHP Native
- MySQL / MariaDB
- HTML
- CSS sederhana
- Laragon atau XAMPP sebagai local server

## Struktur Folder

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

Sebelum menjalankan project, pastikan sudah tersedia:

- PHP 7.4 atau versi yang lebih baru.
- MySQL atau MariaDB.
- Laragon, XAMPP, atau local server lain.
- Browser seperti Chrome, Edge, atau Firefox.

## Konfigurasi Database

Koneksi database berada pada file:

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

Pastikan database dengan nama `sistem-perpustakaan` sudah dibuat di MySQL.

## Rancangan Tabel Database

Berikut rancangan tabel yang digunakan oleh aplikasi.

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

Catatan: nama field `relase_year` mengikuti nama field yang digunakan di dalam kode program.

## Cara Menjalankan Project

1. Letakkan folder project di dalam folder server lokal.

   Contoh Laragon:

   ```text
   C:\laragon\www\sistem-perpustakaan
   ```

   Contoh XAMPP:

   ```text
   C:\xampp\htdocs\sistem-perpustakaan
   ```

2. Jalankan Apache dan MySQL dari Laragon atau XAMPP.

3. Buat database baru dengan nama:

   ```text
   sistem-perpustakaan
   ```

4. Buat tabel sesuai rancangan database pada bagian sebelumnya.

5. Sesuaikan konfigurasi database di file `connection.php` jika username, password, atau nama database berbeda.

6. Buka project melalui browser:

   ```text
   http://localhost/sistem-perpustakaan
   ```

## Alur Penggunaan

1. Tambahkan data kategori terlebih dahulu.
2. Tambahkan data buku dan pilih kategori yang sesuai.
3. Tambahkan data anggota perpustakaan.
4. Masuk ke halaman peminjaman.
5. Isi ID anggota, kode buku, tanggal pinjam, dan tanggal kembali.
6. Jika data valid dan stok tersedia, transaksi peminjaman akan tersimpan.

## Cara Mengecek Fitur

Bagian ini dapat digunakan untuk menguji apakah fitur aplikasi berjalan dengan benar.

### Cek Modul Kategori

1. Buka halaman daftar kategori.
2. Tambahkan kategori baru, misalnya `Novel`.
3. Tambahkan kategori dengan nama yang sama.
4. Sistem seharusnya menolak data duplikat dan menampilkan peringatan.
5. Ubah nama kategori menjadi nama kategori lain yang sudah ada.
6. Sistem seharusnya menolak perubahan tersebut.

### Cek Modul Buku

1. Buka halaman daftar buku.
2. Tambahkan buku baru dengan kode buku unik, misalnya `BK001`.
3. Tambahkan buku lain dengan kode buku yang sama.
4. Sistem seharusnya menolak karena kode buku sudah digunakan.
5. Ubah kode buku menjadi kode yang sudah dipakai buku lain.
6. Sistem seharusnya menolak perubahan tersebut.

### Cek Modul Anggota

1. Buka halaman daftar anggota.
2. Tambahkan anggota baru dengan ID anggota unik, misalnya `1001`.
3. Tambahkan anggota lain dengan ID anggota yang sama.
4. Sistem seharusnya menolak karena ID anggota sudah terdaftar.
5. Ubah ID anggota menjadi ID yang sudah dipakai anggota lain.
6. Sistem seharusnya menolak perubahan tersebut.

### Cek Modul Peminjaman

1. Pastikan sudah ada data anggota.
2. Pastikan sudah ada data buku dengan stok lebih dari 0.
3. Buka halaman tambah peminjaman.
4. Masukkan ID anggota yang benar.
5. Masukkan kode buku yang benar.
6. Isi tanggal pinjam dan tanggal kembali.
7. Klik tombol `Pinjam`.
8. Sistem seharusnya menyimpan data peminjaman dan mengurangi stok buku sebanyak satu.

### Cek Peminjaman dengan ID Anggota Salah

1. Buka halaman tambah peminjaman.
2. Masukkan ID anggota yang tidak ada di database.
3. Isi data peminjaman lainnya.
4. Sistem seharusnya menampilkan peringatan bahwa anggota tidak ditemukan.

### Cek Peminjaman dengan Kode Buku Salah

1. Buka halaman tambah peminjaman.
2. Masukkan kode buku yang tidak ada di database.
3. Isi data peminjaman lainnya.
4. Sistem seharusnya menampilkan peringatan bahwa buku tidak terdaftar.

### Cek Peminjaman Saat Stok Habis

1. Pastikan ada buku dengan stok `0`.
2. Buka halaman tambah peminjaman.
3. Masukkan kode buku tersebut.
4. Isi ID anggota yang valid dan tanggal peminjaman.
5. Sistem seharusnya menolak peminjaman dan menampilkan peringatan bahwa stok buku habis.

## Catatan Pengembangan

- Aplikasi ini masih menggunakan PHP Native dan query MySQLi sederhana.
- Validasi utama sudah dilakukan pada kode buku, nama kategori, ID anggota, dan stok buku.
- Untuk pengembangan berikutnya, project dapat ditambahkan fitur login, pengembalian buku, pencarian data, pagination, dan validasi keamanan menggunakan prepared statement.

## Pembuat

Project ini dibuat sebagai latihan pembuatan sistem perpustakaan berbasis PHP Native dan MySQL.
