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
		<script src="../materialize/js/materialize.js"></script>
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
		
		.dropdown-content{
			overflow: visible !important;
		}
      </style>
      </head>
      <body>
        <div class="navbar-fixed">
            <nav class="indigo darken-4">
              <div class="nav-wrapper container">
                <a href="../admin.php" class="brand-logo">Sistem Informasi Pajak Bumi dan Bangunan</a>
                <ul class="right hide-on-med-and-down">
                  <li class="active"><a href="laporanbulanandesa.php">Laporan Bulanan Desa</a></li>
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
                        <span class="white-text"><b>Rekapitulasi Laporan Per Desa</b></span><hr><br>
						<!-- <button class="btn waves-effect waves-light indigo darken-3" type="button" Onclick="window.location.href='pages/home.php'">Kecamatan</button> -->
						<!-- Dropdown Trigger -->
						
						<script type="text/javascript">
						$('.dropdown-button2').dropdown({
							  inDuration: 300,
							  outDuration: 225,
							  constrain_width: false, // Does not change width of dropdown to that of the activator
							  hover: true, // Activate on hover
							  gutter: ($('.dropdown-content').width()*3)/2.5 + 5, // Spacing from edge
							  belowOrigin: false, // Displays dropdown below the button
							  alignment: 'left' // Displays dropdown with edge aligned to the left of button
							}
						  );
						</script>
						
						  <a class='dropdown-button btn' href='#' data-activates='dropdown5'>------------ Pilih Desa ------------</a>
						 
						  <!-- Dropdown Structure -->
						  <ul id='dropdown5' class='dropdown-content'>
							<li><a href="../laporan_bulanan/lb_desa_klesen.php">Desa Werdi</a></li>
							<li><a href="../laporan_bulanan/lb_desa_bodas.php">Desa Winduaji</a></li>
							<li><a href="../laporan_bulanan/lb_desa_gembong.php">Desa Krandegan</a></li>
							<li><a href="../laporan_bulanan/lb_desa_sukoharjo.php">Desa Lumeneng</a></li>
							<li><a href="../laporan_bulanan/lb_desa_garung_wiyoro.php">Desa Tangeran</a></li>
							<li><a href="../laporan_bulanan/lb_desa_bubak.php">Desa Kaliboja</a></li>
							<li><a href="../laporan_bulanan/lb_desa_bojong_koneng.php">Desa Kaliombo</a></li>
							<li><a href="../laporan_bulanan/lb_desa_luragunga.php">Desa Botosari</a></li>
							<li><a href="../laporan_bulanan/lb_desa_kandangserang.php">Desa Sawangan</a></li>
							<li><a href="../laporan_bulanan/lb_desa_wangkelang.php">Desa Paninggaran</a></li>
							<li><a href="../laporan_bulanan/lb_desa_luragunga.php">Desa Domiyang</a></li>
							<li><a href="../laporan_bulanan/lb_desa_kandangserang.php">Desa Notogiwang</a></li>
							<li><a href="../laporan_bulanan/lb_desa_wangkelang.php">Desa Lambanggelun</a></li>
							<li><a href="../laporan_bulanan/lb_desa_kandangserang.php">Desa Tenogo</a></li>
							<li><a href="../laporan_bulanan/lb_desa_wangkelang.php">Desa Pedagung</a></li>
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
