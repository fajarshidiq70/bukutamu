<?php

// aktifkan session
session_start();

// panggil koneksi database
include "koneksi.php";

@$pass = md5($_POST['password']);
@$username = mysqli_escape_string($koneksi, $_POST['username']);
@$password = mysqli_escape_string($koneksi, $pass);


$login = mysqli_query($koneksi, "SELECT * FROM tuser where username='$username' and password='$password' and status='Aktif'");

$data = mysqli_fetch_array($login);

// Uji jika username dan password ditemukan
if ($data) {
    $SESSION['id_user'] = $data['id_user'];
    $SESSION['username'] = $data['username'];
    $SESSION['password'] = $data['password'];
    $SESSION['nama_pengguna'] = $data['nama_pengguna'];
    //$SESSION['status'] = $data['status'];

    // arahkan ke halaman admin
    header('location:admin.php');
} else {
    echo "<script>
        alert('Maaf, Login Gagal, Pastikan Username dan Password Anda Benar.');
        document.location='index.php'
    </script>";
}
