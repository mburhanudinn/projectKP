<?php
session_start();
include_once('../koneksi.php');
if(empty($_SESSION['username'])){
header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <title>PPKD Pekalongan</title>
        <link rel="stylesheet" href="../materialize/css/materialize.css" type="text/css" />
        <link href="../materialicon/icon.css" rel="stylesheet">
        <link rel="stylesheet" href="../fontawesome/font-awesome.min.css">
        <link rel="stylesheet" href="../datatables/jquery.dataTables.min.css" type="text/css" />
        <script src="../jquery/jquery-1.12.2.js"></script>
        <script src="../datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
        $('#calonmhs').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": true,
            "bAutoWidth": true });
        });
        </script>
        <style>
        th {
          text-align: center;
        }
        .foot {
          position:fixed;
          left:0px;
          bottom:0px;
          height:5px;
          width:100%;
        }
      </style>
      </head>
      <body>
        <div class="navbar-fixed">
            <nav class="indigo darken-4">
              <div class="nav-wrapper container">
                <a href="../admin.php" class="brand-logo">Sistem Informasi Pajak Bumi dan Bangunan</a>
                <ul class="right hide-on-med-and-down">
                  <li class="active"><a href="#!">Selayang Pandang</a></li>
                  <li><a href="../admin.php">Kembali</a></li>
                </ul>
              </div>
            </nav>
          </div>
          <br>
         <div class="container" style="width: 45% !important">

          <center> <p style="font-size:20pt">SAMBUTAN BUPATI KAB. PEKALONGAN</p></center>
          <center><span>Kategori: Selayang Pandang  Diterbitkan pada 27 Juni 2016 Dilihat: 25051</span></center>
            <br>  <br>
          <center><span>Selamat datang di website Resmi </span></center>
          <center> <p style="font-size:16pt">PEMERINTAH KABUPATEN PEKALONGAN</p></center>
         <center><img src="http://www.pekalongankab.go.id/images/FotoWeb2016/sambutan_Bupati.jpg" title="Sistem Informasi Pajak Bumi dan Bangunan"/></center>
        
      <script src="../materialize/js/materialize.js"></script>
  </body>
</html>
