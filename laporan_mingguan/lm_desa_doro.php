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
                  <li class="active"><a href="#!">Laporan Mingguan Doro</a></li>
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
				$query = mysql_query("SELECT des,op_baku,op_jumlah, op_minggu1, jumlah_m1, op_mingu2, jumlah_m2, op_minguu3, jumlah_m3, denda_m1, denda_m2, denda_m3, jml_denda_m1, jml_denda_m2, jml_denda_m3 FROM laporan
										INNER JOIN desa ON laporan.id_desa=desa.id_desa WHERE laporan.id_desa='DS68';");
					// echo ($query) ? "yes" : mysql_error();
					$no = 1;
          			while ($data = mysql_fetch_array($query)) {
          			?>
				
					<tr>
						<td style="text-align:center;">Baku</td>
						<td style="text-align:center;"><?php echo number_format(($data['op_baku']), 0, ',', '.') ; ?></td>
					</tr>
					<tr>
						<td style="text-align:center;">Total</td>
						<td style="text-align:center;"><?php echo number_format(($data['op_jumlah']), 0, ',', '.') ; ?></td>
					</tr>
					<tr>
						<td style="text-align:center;">Baku Minggu 1</td>
						<td style="text-align:center;"><?php echo number_format(($data['op_minggu1']), 0, ',', '.') ; ?></td>
					</tr>
					<tr>
						<td style="text-align:center;">Jumlah Minggu 1</td>
						<td style="text-align:center;"><?php echo number_format(($data['jumlah_m1']), 0, ',', '.') ; ?></td>
					</tr>
					<tr>
						<td style="text-align:center;">Baku Minggu 2</td>
						<td style="text-align:center;"><?php echo number_format(($data['op_mingu2']), 0, ',', '.') ; ?></td>
					</tr>
					<tr>
						<td style="text-align:center;">Jumlah Minggu 2</td>
						<td style="text-align:center;"><?php echo number_format(($data['jumlah_m2']), 0, ',', '.') ; ?></td>
					</tr>
					<tr>
						<td style="text-align:center;">Baku Minggu 3</td>
						<td style="text-align:center;"><?php echo number_format(($data['op_minguu3']), 0, ',', '.') ; ?></td>
					</tr>
					<tr>
						<td style="text-align:center;">Jumlah Minggu 3</td>
						<td style="text-align:center;"><?php echo number_format(($data['jumlah_m3']), 0, ',', '.') ; ?></td>
					</tr>
					<tr>
						<td style="text-align:center;">Denda Minggu 1</td>
						<td style="text-align:center;"><?php echo number_format(($data['denda_m1']), 0, ',', '.') ; ?></td>
					</tr>
					<tr>
						<td style="text-align:center;">Jumlah Denda Minggu 1</td>
						<td style="text-align:center;"><?php echo number_format(($data['jml_denda_m1']), 0, ',', '.') ; ?></td>
					</tr>
					<tr>
						<td style="text-align:center;">Denda Minggu 2</td>
						<td style="text-align:center;"><?php echo number_format(($data['denda_m2']), 0, ',', '.') ; ?></td>
					</tr>
					<tr>
						<td style="text-align:center;">Jumlah Denda Minggu 2</td>
						<td style="text-align:center;"><?php echo number_format(($data['jml_denda_m2']), 0, ',', '.') ; ?></td>
					</tr>
					<tr>
						<td style="text-align:center;">Denda Minggu 3</td>
						<td style="text-align:center;"><?php echo number_format(($data['denda_m3']), 0, ',', '.') ; ?></td>
					</tr>
					<tr>
						<td style="text-align:center;">Jumlah Denda Minggu 3</td>
						<td style="text-align:center;"><?php echo number_format(($data['jml_denda_m3']), 0, ',', '.') ; ?></td>
					</tr>
          			<?php }
							
					?>
				
          		</tbody>
				
				  	</table>
            
          </div>
		   <center></center><br><br>
          <center><span>Copyright 2017 Sistem Informasi Pajak Bumi dan Bangunan Kabupaten Pekalongan</span></center>
      <script src="../materialize/js/materialize.js"></script>
  </body>
</html>

