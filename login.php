<?php
session_start();
include "config/koneksi.php";

// Pastikan data 'username' dan 'password' tersedia sebelum mengaksesnya
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Membuat variabel $username dan $password dari data yang dikirimkan melalui form
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = md5($_POST['password']);

    // Mencocokkan username dan password di database
    $query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        // Jika username dan password cocok, set session dan arahkan ke halaman admin
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['username'] = $row['username'];
        header('location: admin.php');
        exit;
    } else {
        // Jika username dan password tidak cocok, tampilkan pesan kesalahan
        echo "<script>alert('Username atau password salah. Silakan coba lagi.');window.location='index.php';</script>";
    }
} else {
    // Jika data 'username' dan 'password' tidak tersedia, tampilkan pesan kesalahan
    echo "<script>alert('Username dan password harus diisi.');window.location='index.php';</script>";
}
?>
