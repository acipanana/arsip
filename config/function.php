<?php
// File: function.php

// Persiapan function untuk upload file
function upload(){
    // Deklarasi variabel kebutuhan
    $namafile = $_FILES['file']['name'];
    $ukuranfile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpname = $_FILES['file']['tmp_name'];

    // Cek apakah yang diupload adalah file/gambar
    $eksfilevalid = ['jpg','jpeg','png','pdf'];
    $eksfile = explode('.', $namafile);
    $eksfile = strtolower(end($eksfile));

    if (!in_array($eksfile, $eksfilevalid)) {
        echo "<script> alert('Yang anda Upload Bukan Gambar/File PDF...!')</script>";
        return false;
    }

    // Cek jika ukuran file terlau besar
    if ($ukuranfile > 1000000) {
        echo "<script> alert('Ukuran Filenya Terlalu Besar Kakak')</script>";
        return false;
    }

    // Jika lolos pengecekan file, siap diupload
    // Generate nama file baru
    $namafilebaru = uniqid();
    $namafilebaru .= ".";
    $namafilebaru .= $eksfile;

    move_uploaded_file($tmpname, 'file/' .$namafilebaru);
    return $namafilebaru;
}
?>
