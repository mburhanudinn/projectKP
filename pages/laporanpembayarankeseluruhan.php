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
    <title>Laporan Pembayaran - Sistem Penerimaan Mahasiswa Baru</title>
    <link rel="stylesheet" href="../materialize/css/materialize.css" type="text/css" />
    <link href="../materialicon/icon.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/font-awesome.min.css">
    <link rel="stylesheet" href="../datatables/jquery.dataTables.min.css" type="text/css" />
    <script src="../jquery/jquery-1.12.2.js"></script>
    <script src="../datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    $('#laporanpembayaran').dataTable({
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
            <a href="#!" class="brand-logo">Sistem PMB</a>
            <ul class="right hide-on-med-and-down">
              <li class="active"><a href="pembayaran.php">Laporan Pembayaran</a></li>
              <li><a href="cetaksemuadatapembayaran.php" class="waves-effect waves-light btn indigo darken-3 lighten-1" target="_blank">Cetak Seluruh Data Pembayaran</a></li>
              <li><a href="../admin.php">Kembali</a></li>
            </ul>
          </div>
        </nav>
      </div>
      <br>
        <div class="container">
          <table  class="striped z-depth-3 display indigo darken-4" id="laporanpembayaran" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th style="text-align:center;">Nomor Pembayaran</th>
                <th style="text-align:center;">Tanggal Pembayaran</th>
                <th style="text-align:center;">Nomor Formulir</th>
                <th>Jumlah Bayar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = mysql_query("select * from bayar");
              while ($data = mysql_fetch_array($query)) {
              ?>
              <tr>
                <td style="text-align:center;"><?php echo $data['no_bayar'];?></td>
                <td style="text-align:center;"><?php echo $data['tgl_bayar']; ?></td>
                <td style="text-align:center;"><?php echo $data['no_form']; ?></td>
                <td>Rp <?php echo $data['jml_bayar']; ?></td>
                <td><a href="cetakpembayaran.php?no_bayar=<?php echo $data['no_bayar'];?>&tgl_bayar=<?php echo $data['tgl_bayar'];?>" target="_blank">Cetak Pembayaran</a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <br><br>
        </div>
        <div class="row center foot"> Copyright 2016 - Sistem Penerimaan Mahasiswa Baru STMIK DHARMA PUTRA</div>
        <script src="../materialize/js/materialize.js"></script>
    </body>
</html>
