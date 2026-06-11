<?php

require_once __DIR__ . '/../connection.php';

$member_id = $_POST['member_id'];

$book_code = $_POST['book_code'];

$loan_date = $_POST['loan_date'];

$return_date = $_POST['return_date'];

$status = 'dipinjam';

$query_member = "SELECT * FROM members WHERE id_anggota = '$member_id'";

$result_member = mysqli_query($connect, $query_member);

$member = mysqli_fetch_assoc($result_member);

if (!$member) {
    echo "<script>
    alert('anggota dengan ID tersebut tidak ditemukan!');
    window.history.back();
    </script>";
    exit;
}

$query_loan = "SELECT * FROM books WHERE book_code = '$book_code'";

$result_loan = mysqli_query($connect, $query_loan);

$book = mysqli_fetch_assoc($result_loan);

if($book){

    $book_id = $book['book_code'];

    $query_insert = "INSERT INTO loans(member_id,books_id,loan_date,return_date,status) VALUES('$member_id','$book_code','$loan_date','$return_date','$status')";

    $query = mysqli_query($connect, $query_insert);

    if($query){
            echo "
    <script>
    alert('buku berhasil dipinjam');
    window.location.href = 'index_loans.php';
    </script>
    ";
    }else{
        echo "data gagal ditambahkan: " . mysqli_error($connect);
    }
}else{
    echo "<script>
    alert('buku dengan kode tersebut tidak terdaftar!');
    window.history.back();
    </script>";
}
