<?php
session_start();
include('koneksi.php');
include_once('cek-akses.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $_SESSION['username']; ?></title>
	<link rel="stylesheet" href="materialize/css/materialize.css" media="screen" title="materializecss" charset="utf-8">
	<link href="materialicon/icon.css" rel="stylesheet">
	<link rel="stylesheet" href="fontawesome/font-awesome.min.css">
	<script src="jquery/jquery-1.12.2.js" charset="utf-8"></script>
	<script src="materialize/js/materialize.js" charset="utf-8"></script>
</head>
<body>
	<div class="navbar-fixed">
		<!-- Dropdown Structure -->
		<ul id="dropdown99" class="dropdown-content">
			<li><a href="../PMB/pages/selayangpandang.php">Selayang Pandang</a></li>
			<li><a href="../PMB/pages/kontak.php">Kontak Kami</a></li>
		</ul>
		<nav class="indigo darken-4">
			<div class="nav-wrapper container">
				<a href="#!" class="brand-logo">Sistem Informasi Pajak Bumi dan Bangunan</a>
				<ul class="right hide-on-med-and-down">
					<!-- Dropdown Trigger -->
					<li><a class="dropdown-button btn" href="#!" data-activates="dropdown99">Tentang Kami</a>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="section no-pad-bot">
			<div class="container" style="width: 85% !important">
				<div class="row">
					<div class="col 3 s3">
						<div class="card-panel indigo darken-4 darken-2 center-align">
							<i class="fa fa-list-alt  fa-5x white-text"></i><br>
							<span class="white-text"><b>Home</b></span><hr><br>
							<button class="dropdown-button btn" type="button" Onclick="window.location.href='pages/home.php'">Home</button>
							
						</div>
					</div>
					<div class="col 3 s3">
						<div class="card-panel indigo darken-4 darken-2 center-align">
							<i class="fa fa-file fa-5x white-text"></i><br>
							<span class="white-text"><b>Daftar Tagihan</b></span><hr><br>
							<a class='dropdown-button btn' href='#' data-activates='dropdown1'> Pilih Daftar Tagihan </a>
							
							<!-- Dropdown Structure -->
							<ul id='dropdown1' class='dropdown-content'>
								<li><a href="pages/tagihandesa.php">Tagihan Desa</a></li>
								<li><a href="pages/tagihankecamatan.php">Tagihan Kecamatan</a></li>
								<li><a href="pages/tagihankabupaten.php">Tagihan Kabupaten</a></li>
							</ul>
						</div>
					</div>
					<div class="col 3 s3">
						<div class="card-panel indigo darken-4 darken-2 center-align">
							<i class="fa fa-list-alt  fa-5x white-text"></i><br>
							<span class="white-text"><b>Laporan</b></span><hr><br>
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
						<a class='dropdown-button btn' href='#' data-activates='dropdown2'> Laporan Mingguan </a>
						
						<!-- Dropdown Structure -->
						<ul id='dropdown2' class='dropdown-content'>
							<li><a href="pages/laporanmingguandesa.php">Laporan Desa</a></li>
							<li><a href="pages/laporanmingguankecamatan.php">Laporan Kecamatan</a></li>
						</ul>
						
						<br><br>
						<a class='dropdown-button btn' href='#' data-activates='dropdown3'> Laporan Bulanan </a>
						
						<!-- Dropdown Structure -->
						<ul id='dropdown3' class='dropdown-content'>
							<li><a href="pages/laporanbulanandesa.php">Laporan Desa</a></li>
							<li><a href="pages/laporanbulanankecamatan.php">Laporan Kecamatan</a></li>
						</ul>
						
						
					</div>
				</div>
				<div class="col 3 s3">
					<div class="card-panel indigo darken-4 darken-2 center-align">
						<i class="fa fa-files-o fa-5x white-text"></i><br>
						<span class="white-text"><b>Cetak Tagihan</b></span><hr><br>
						<a class='dropdown-button btn' href='#' data-activates='dropdown6'> Cetak Daftar Tagihan </a>
						
						<!-- Dropdown Structure -->
						<ul id='dropdown6' class='dropdown-content'>
							<li><a href="pages/cetak_tagihan_desa.php">Tagihan Desa</a></li>
							<li><a href="pages/cetak_tagihan_kecamatan.php">Tagihan Kecamatan</a></li>
							<li><a href="pages/cetak_tagihan_kabupaten.php">Tagihan Kabupaten</a></li>
						</ul>
						<br><br>
						
						<a class='dropdown-button btn' href='#' data-activates='dropdown90'> Cetak Surat Tagihan </a>
						
						<!-- Dropdown Structure -->
						<ul id='dropdown90' class='dropdown-content'>
							<li><a href="pages/cetak_desa.php">Tagihan Desa</a></li>
							<li><a href="pages/cetak_kecamatan.php">Tagihan Kecamatan</a></li>
							
						</ul>					 
						
					</div>
				</div>
			</div>
		</div>
		
		<center></center><br><br>
		<center></center><br><br>
		<center></center><br><br>
		<center></center><br><br>
		<center><span>Copyright 2017 Sistem Informasi Pajak Bumi dan Bangunan Kabupaten Pekalongan</span></center>
	</body>
	</html>
