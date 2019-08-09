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
                  <li class="active"><a href="#!">Laporan Bulanan Desa Karyomukti</a></li>
                  <li><a href="../admin.php">Kembali</a></li>
                </ul>
              </div>
            </nav>
          </div>
          <br>
        <div class="container" style="width: 50% !important">
            <table  class="striped z-depth-3 display indigo darken-4" id="calonmhs" cellspacing="0" width="100%">
          		<thead>
          			<tr>
						<th>DATA POKOK</th>
          				<th>JUMLAH TOTAL</th>
          			</tr>
          		</thead>
          		<tbody>
                <?php
				$query = mysql_query("SELECT des,op_baku,op_jumlah, op_minggu1+op_mingu2+op_minguu3 as 'op_total', jumlah_m1+jumlah_m2+jumlah_m3 as 'jumlah_m', denda_m1+denda_m2+denda_m3 as 'denda_m', jml_denda_m1+jml_denda_m2+jml_denda_m3 as 'jml_denda_m' FROM laporan
										INNER JOIN desa ON laporan.id_desa=desa.id_desa WHERE laporan.id_desa='DS123';");
					// echo ($query) ? "yes" : mysql_error();
					$no = 1;
          			while ($data = mysql_fetch_array($query)) {
          			?>
					
					<tr>
						<td style="text-align:center;">Nama Desa</td>
						<td style="text-align:center;"><?php echo $data['des'];?></td>
					</tr>
					<tr>
						<td style="text-align:center;">Baku</td>
						<td style="text-align:center;"><?php echo number_format(($data['op_baku']), 0, ',', '.') ; ?></td>
					</tr>
					<tr>
						<td style="text-align:center;">Total</td>
						<td style="text-align:center;"><?php echo number_format(($data['op_total']), 0, ',', '.') ; ?></td>
					</tr>
					<tr>
						<td style="text-align:center;">Total Jumlah Minggu</td>
						<td style="text-align:center;"><?php echo number_format(($data['jumlah_m']), 0, ',', '.') ; ?></td>
					</tr>
					<tr>
						<td style="text-align:center;">Total Denda Minggu</td>
						<td style="text-align:center;"><?php echo number_format(($data['denda_m']), 0, ',', '.') ; ?></td>
					</tr>
					<tr>
						<td style="text-align:center;">Jumlah Denda Total</td>
						<td style="text-align:center;"><?php echo number_format(($data['jml_denda_m']), 0, ',', '.') ; ?></td>
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
