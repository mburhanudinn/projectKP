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
                  <li class="active"><a href="cetaksemuatagihankabupaten.php">Tagihan Kabupaten</a></li>
                  <li><a href="print_tagihan_kabupaten.php" class="waves-effect waves-light btn indigo darken-3 lighten-1" >Cetak Tagihan</a></li>
                  <li><a href="../admin.php">Kembali</a></li>
                </ul>
              </div>
            </nav>
          </div>
          <br>
           <div class="container" style="width: 80% !important">
            <table  class="striped z-depth-3 display indigo darken-4" id="calonmhs" cellspacing="0" width="100%">
          		<thead>
          			<tr>
          				<th style="text-align:center;">NO</th>
						<th style="text-align:center;">ID Tag</th>
          				<th style="text-align:center;">Kecamatan</th>
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
          		$query = mysql_query("SELECT  id_tagihan, kecamatan, op_baku, op_jumlah, op_realisasi, jml_realisasi, op_selisih, jml_selisih FROM tagihan 
					INNER JOIN kecamatan USING (id_kecamatan)
					INNER JOIN laporan USING (id_desa);");
					$no = 1;
          			while ($data = mysql_fetch_array($query)) {
          			?>
					<tr>
						<td style="text-align:center;"><?php echo $no++; ?></td>
						<td style="text-align:center;"><?php echo $data['id_tagihan'];?></td>
          				<td style="text-align:center;"><?php echo $data['kecamatan'];?></td>
          				<td style="text-align:center;"><?php echo number_format(($data['op_baku']), 0, ',', '.') ; ?></td>
          				<td style="text-align:center;"><?php echo number_format(($data['op_jumlah']), 0, ',', '.') ; ?></td>
          				<td style="text-align:center;"><?php echo number_format(($data['op_realisasi']), 0, ',', '.') ; ?></td>
          				<td style="text-align:center;"><?php echo number_format(($data['jml_realisasi']), 0, ',', '.') ; ?></td>
						<td style="text-align:center;"><?php echo number_format(($data['op_selisih']), 0, ',', '.') ; ?></td>
						<td style="text-align:center;"><?php echo number_format(($data['jml_selisih']), 0, ',', '.') ; ?></td>
						
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
