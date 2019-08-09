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
    <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <title>Home</title>
        <link rel="stylesheet" href="../materialize/css/materialize.css" type="text/css" />
        <link href="../materialicon/icon.css" rel="stylesheet">
        <link rel="stylesheet" href="../fontawesome/font-awesome.min.css">
        <link rel="stylesheet" href="../datatables/jquery.dataTables.min.css" type="text/css" />
        <script src="../jquery/jquery-1.12.2.js"></script>
        <script src="../datatables/jquery.dataTables.min.js"></script>
		<script src="../materialize/js/materialize.js"></script
        <script type="text/javascript">
       
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
                <a href="#!" class="brand-logo">Sistem Informasi Pajak Bumi dan Bangunan</a>
                <ul class="right hide-on-med-and-down">
                  <li class="active"><a href="laporanbulanan.php">Laporan Bulanan</a></li>
                  <li><a href="../admin.php">Kembali</a></li>
                </ul>
              </div>
            </nav>
          </div>
          <br>
         
	 <div class="section no-pad-bot">
       <div class="container" style="width: 85% !important">
          <div class="row">
              <div class="col 6 s12">
                 <div class="card-panel indigo darken-4 darken-2 center-align">
                      <i class="fa fa-list-alt  fa-5x white-text"></i><br>
                        <span class="white-text"><b>Home</b></span><hr><br>
						<!-- <button class="btn waves-effect waves-light indigo darken-3" type="button" Onclick="window.location.href='pages/home.php'">Kecamatan</button> -->
						<!-- Dropdown Trigger -->
						
						  <a class='dropdown-button btn' href='#' data-activates='dropdown1'>------------ Pilih Daerah ------------</a>
						 
						  <!-- Dropdown Structure -->
						  <ul id='dropdown1' class='dropdown-content'>
							<li><a href="#!">Desa Klasen</a></li>
								<ul>
									<li><a href="#">Sub Sub-Menu 1</a>
									<li><a href="#">Sub Sub-Menu 2</a>
									<li><a href="#">Sub Sub-Menu 3</a>
									<li><a href="#">Sub Sub-Menu 4</a>
									<li><a href="#">Sub Sub-Menu 5</a></li> 
									</ul>

							<li><a href="#!">Desa Bodas</a></li>
							<li><a href="#!">Desa Gembong</a></li>
							<li><a href="#!">Desa Sukoharjo</a></li>
							<li><a href="#!">Desa Garung Wiroyo</a></li>
							<li><a href="#!">Desa Bubak</a></li>
							<li><a href="#!">Desa Bojong Koneng</a></li>
							<li><a href="#!">Desa Luragung</a></li>
							<li><a href="#!">Desa Kandangserang</a></li>
							<li><a href="#!">Desa Wangkelang</a></li>
							<li><a href="#!">Desa Kalijoyo</a></li>
							<li><a href="#!">Desa Wonorejo</a></li>	
							<li><a href="#!">Desa Pekiringan Alit</a></li>
							<li><a href="#!">Desa Kutorojo</a></li>
							<li><a href="#!">Desa Kajen</a></li>
							<li><a href="#!">Desa Nyamok</a></li>
							<li><a href="#!">Desa Tanjung Kulon</a></li>
							<li><a href="#!">Desa Tanjung Sari</a></li>
							<li><a href="#!">Desa Gejik</a></li>
							<li><a href="#!">Desa Kebon Agung</a></li>
							<li><a href="#!">Desa Lambur</a></li>
							<li><a href="#!">Desa Sangkanjoyo</a></li>
							<li><a href="#!">Desa Salit</a></li>
							<li><a href="#!">Desa Sambirioto</a></li>
							<li><a href="#!">Desa Rowolaku</a></li>
						  </ul>
						
						  
						  <br><br>
						
						 
						
                  </div>
             	<center></center><br><br>
				<center></center><br><br>
				<center></center><br><br>
				<center></center><br><br>
      </div>
      <center><span>Copyright 2017 Sistem Informasi Pajak Bumi dan Bangunan Kabupaten Pekalongan</span></center>
  </body>
</html>
