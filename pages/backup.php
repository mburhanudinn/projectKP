<?php
session_start();
include_once('../koneksi.php');
if(empty($_SESSION['username'])){
header("location: ../login.php");
} 
$tanggal3 = $_POST['tanggal3'];
$tanggal4 = $_POST['tanggal4'];
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
                  <li class="active"><a href="tagihankecamatan.php">Tagihan Kecamatan</a></li>
                  <li><a href="print_tagihan_kecamatanfilter.php" class="waves-effect waves-light btn indigo darken-3 lighten-1" >Cetak Tagihan Filter</a></li>
                  <li><a href="../admin.php">Kembali</a></li>
                </ul>
              </div>
            </nav>
          </div>
          <br>
         <div class="container">
            <table  class="striped z-depth-3 display indigo darken-4" id="calonmhs" cellspacing="0" width="100%">
          		<thead>
					<tr>
          				<th style="text-align:center;">NO</th>
						<th style="text-align:center;">ID Tagihan</th>
          				<th style="text-align:center;">Nama Desa</th>
						<th style="text-align:center;">Baku</th>
          				<th style="text-align:center;">Jumlah</th>
          				<th>Realisasi</th>
						<th>Jumlah Realisasi</th>
						<th>Selisih</th>
						<th>Jumlah Selisih</th>
					
          			</tr>
          		</thead>
         
          		<tbody>
                <?php
				
          		$query = mysql_query("SELECT  id_tagihan, des, op_baku, op_jumlah, op_realisasi, jml_realisasi, op_selisih, jml_selisih FROM tagihan 
					INNER JOIN desa USING (id_desa)
					INNER JOIN laporan USING (id_desa);");
					$no = 1;
          			while ($data = mysql_fetch_array($query)) {
          			?>
					<tr>
						<td style="text-align:center;"><?php echo $no++; ?></td>
						<td style="text-align:center;"><?php echo $data['id_tagihan'];?></td>
          				<td style="text-align:center;"><?php echo $data['des'];?></td>
						<td style="text-align:center;"><?php echo $data['op_baku'];?></td>
          				<td style="text-align:center;"><?php echo $data['op_jumlah'];?></td>
          				<td style="text-align:center;"><?php echo $data['op_realisasi']; ?></td>
          				<td style="text-align:center;"><?php echo $data['jml_realisasi']; ?></td>
						<td style="text-align:center;"><?php echo $data['op_selisih']; ?></td>
						<td style="text-align:center;"><?php echo $data['jml_selisih']; ?></td>	
          			</tr>
          			<?php }
							
					?>
					
          		</tbody>
				  	</table>
            <br><br>
          </div>
           
      <center><span>Copyright 2017 Sistem Informasi Pajak Bumi dan Bangunan Kabupaten Pekalongan</span></center>
      <script src="../materialize/js/materialize.js"></script>
  </body>
</html>
