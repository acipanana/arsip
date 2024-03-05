<?php
session_start();
if (empty($_SESSION['id_user']) or empty($_SESSION['username'])) {
  echo "<script>
    alert('Login Dulu Tsayyyyy');
    document.location='index.php';
    </script>";

}

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="Tooplate">

        <title>Arsip Surat</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/magnific-popup.css" rel="stylesheet">

        <link href="css/tooplate-waso-strategy.css" rel="stylesheet">
        

    </head>
    
    <body>

<nav class="navbar navbar-expand-lg navbar-dark bg-black">
          <div class="container">
      <a class="navbar-brand text-warning" href="#">Aplikasi Arsip</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link text-warning" href="?">Beranda</a>
          </li>
           <li class="nav-item">
            <a class="nav-link text-warning text-warning" href="?halaman=departemen">Data Departemen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-warning" href="?halaman=pengirim_surat">Data Pengirim Surat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-warning" href="?halaman=arsip_surat">Data Arsip Surat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-warning" href="?halaman=rekap">Rekap Surat</a>
          </li>
        </ul>
        
       
      </div>
      </div>
    </nav>
        <main>

            <section class="hero">