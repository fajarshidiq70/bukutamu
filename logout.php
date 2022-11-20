<?php

// session start
session_start();

// hilangkan session yang sudah diset
unset($_SESSION['id_user']);
unset($_SESSION['password']);
unset($_SESSION['nama_pengguna']);
unset($_SESSION['username']);

session_destroy();
echo "<script>
alert('Anda telah keluar dari halaman Administrator');
document.location='index.php';
</script>";
