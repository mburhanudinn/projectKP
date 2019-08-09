<?php
session_start();
include_once('../koneksi.php');
if(empty($_SESSION['username'])){
header("location: ../login.php");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
     <title>PPKD Pekalongan</title>
    <link rel="stylesheet" href="../materialize/css/materialize.css" type="text/css" />
    <link rel="stylesheet" href="../materialize/css/custom.css" type="text/css" />
    <link href="../materialicon/icon.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/font-awesome.min.css">
    <script src="../jquery/jquery-1.12.2.js"></script>
  </head>
  <body>
    <div class="navbar-fixed">
        <nav class="indigo darken-4">
          <div class="nav-wrapper container">
            <a href="../admin.php" class="brand-logo">Sistem Informasi Pajak Bumi dan Bangunan</a>
            <ul class="right hide-on-med-and-down">
              <li class="active"><a href="#!">Cetak Tagihan Kabupaten</a></li>
              <li><a href="../admin.php">Kembali</a></li>
            </ul>
          </div>
        </nav>
      </div>
      <br>
      <div class="row">
      <div class="container col s6 offset-s3 card-panel z-depth-3">
              <form action="cetaktagihandesafilter.php" method="post" style="margin-top:5%;">
              <div class="input-field col s9 m12">
                <center><span>Masukan ID Tagihan</span><br></center>
                <i class="material-icons prefix"></i>
                  <input type="text" class="validate" name="tanggal1" required>
              </div>
              
                <div class="center col s12"><br>
                
                <button class="btn waves-effect red darken-2" type="button" Value="Kembali" Onclick="window.location.href='print_tgh_kabupaten.php'">Cetak Tagihan Berdasarkan ID</button>
                <br><br>
              </div>
              </form>
        </div>
        <br><br>
        </div>
      </div>
        <center><span>Copyright 2017 Sistem Informasi Pajak Bumi dan Bangunan Kabupaten Pekalongan</span></center>
        <script src="../materialize/js/materialize.js"></script>
    </body>
</html>
