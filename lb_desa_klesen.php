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
                <a href="#!" class="brand-logo">Sistem Informasi Pajak Bumi dan Bangunan</a>
                <ul class="right hide-on-med-and-down">
                  <li class="active"><a href="lb_des_klesen.php">Laporan Bulanan Desa Klesen</a></li>
                  <li><a href="tambahcalonmhs.php" class="waves-effect waves-light btn indigo darken-3 lighten-1" >Tambah Data</a></li>
                  <li><a href="../admin.php">Kembali</a></li>
                </ul>
              </div>
            </nav>
          </div>
          <br>
         <div class="container" style="width: 100% !important">
            <table  class="striped z-depth-3 display indigo darken-4" id="calonmhs" cellspacing="0" width="100%">
          		<thead>
          			<tr>
          				<th style="text-align:center;">NO</th>
						<th>Desa</th>
          				<th style="text-align:center;">Baku</th>
          				<th>Jumlah</th>
						<th>OP Minggu1</th>
						<th>Jml Minggu1</th>
						<th>OP Minggu2</th>
						<th>Jml Minggu2</th>
						<th>OP Minggu3</th>
						<th>Jml Minggu3</th>
						<th>Tgl Setor</th>
						<th>Denda m1</th>
						<th>jml Denda m1</th>
						<th>Denda m2</th>
						<th>jml Denda m2</th>
						<th>Denda m3</th>
						<th>jml Denda m3</th>
						<th>Aksi</th>
          			</tr>
          		</thead>
          		<tbody>
                <?php
				$query = mysql_query("SELECT des,op_baku,op_jumlah, op_minggu1, jumlah_m1, op_minggu2, jumlah_m2, op_minggu3, jumlah_m3, tanggal_setor FROM laporan
										INNER JOIN desa ON laporan.id_desa=desa.id_desa;");
					$no = 1;
          			while ($data = mysql_fetch_array($query)) {
          			?>
					<tr>
						<td style="text-align:center;"><?php echo $no++; ?></td>
						<td style="text-align:center;"><?php echo $data['des'];?></td>
          				<td style="text-align:center;"><?php echo $data['op_baku'];?></td>
          				<td style="text-align:center;"><?php echo $data['op_jumlah']; ?></td>
          				<td style="text-align:center;"><?php echo $data['op_minggu1']; ?></td>
						<td style="text-align:center;"><?php echo $data['jumlah_m1']; ?></td>
						<td style="text-align:center;"><?php echo $data['op_minggu2']; ?></td>
						<td style="text-align:center;"><?php echo $data['jumlah_m2']; ?></td>
						<td style="text-align:center;"><?php echo $data['op_minggu3']; ?></td>
						<td style="text-align:center;"><?php echo $data['jumlah_m3']; ?></td>
						<td style="text-align:center;"><?php echo $data['tanggal_setor']; ?></td>
						<td style="text-align:center;"><a href="ubahcalonmhs.php?id_cln=<?php echo $data['id_cln'];?>">Ubah</a>
							<a href="hapuscalonmhs.php?id_cln=<?php echo $data['id_cln'];?>" class="red-text" onclick="javascript: return confirm('Anda yakin hapus ?')">Hapus</a></td>
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
