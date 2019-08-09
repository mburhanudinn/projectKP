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
                  <li class="active"><a href="home.php">Home</a></li>
                  <li><a href="../admin.php">Kembali</a></li>
                </ul>
              </div>
            </nav>
          </div>
          <br>
         <div class="container" style="width: 45% !important">
            <table  class="striped z-depth-3 display indigo darken-4" id="calonmhs" cellspacing="0" width="100%">
          		<thead>
          			<tr>
						<th>DATA POKOK</th>
          				<th>JUMLAH TOTAL</th>
          			</tr>
          		</thead>
          		<tbody>
                <?php
				$query = mysql_query("SELECT SUM(OP_JUMLAH) AS 'jumlah_baku', SUM(jml_realisasi) AS 'jumlah_realisasi', SUM(jml_selisih) AS 'jumlah_selisih' FROM laporan
										INNER JOIN tagihan ON laporan.id_desa=tagihan.id_desa;");
					// echo ($query) ? "yes" : mysql_error();
					$no = 1;
          			while ($data = mysql_fetch_array($query)) {
          			?>
					<tr>
						<!-- jumlah total OP -->
						<td style="text-align:center;">Baku</td>
						<!-- jumlah total Minggu -->
						<td style="text-align:center;"><?php echo "Rp " .number_format(($data['jumlah_baku']), 0, ',', '.') ; ?></td>
					</tr>
					
					<tr>
						<!-- jumlah total OP -->
						<td style="text-align:center;">Realisasi</td>
						<!-- jumlah total Minggu -->
						<td style="text-align:center;"><?php echo  "Rp " .number_format(($data['jumlah_realisasi']), 0, ',', '.') ; ?></td>				
          			</tr>
					
					<tr>
						<!-- jumlah total OP -->
						<td style="text-align:center;">Kurang</td>
						<!-- jumlah total Minggu -->
						<td style="text-align:center;"><?php echo  "Rp " .number_format(($data['jumlah_selisih']), 0, ',', '.') ; ?></td>				
          			</tr>
          			<?php }
							
					?>
          		</tbody>

				  	</table>
					<br><br>
          </div>	
                <br><br>
                      <br><br>
                            <br><br>
          <center><span>Copyright 2017 Sistem Informasi Pajak Bumi dan Bangunan Kabupaten Pekalongan</span></center>
      <script src="../materialize/js/materialize.js"></script>
  </body>
</html>
