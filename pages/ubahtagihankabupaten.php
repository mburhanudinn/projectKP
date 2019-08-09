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
        <link rel="stylesheet" href="../materialize/css/materialize.css">
        <link rel="stylesheet" href="../materialize/css/custom.css">
        <link href="../materialicon/icon.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../fontawesome/font-awesome.min.css">
        <script src="../jquery/jquery-1.12.2.js" charset="utf-8"></script>
        <script src="../materialize/js/materialize.js" charset="utf-8"></script>
      </head>
      <body>
        <div class="navbar-fixed">
            <nav class="indigo darken-4">
              <div class="nav-wrapper container">
                <a href="#!" class="brand-logo">Sistem Informasi Pajak Bumi dan Bangunan</a>
                <ul class="right hide-on-med-and-down">
                  <li><a href="#!">Ubah Tagihan Kabupaten</a></li>
                  <li><a href="tagihankabupaten.php">Kembali</a></li>
                </ul>
              </div>
            </nav>
          </div>
          <div class="row">
          <div class="section" id="index-banner">
          <div class="container col s6 offset-s3 card-panel z-depth-3">
                <form action="updatetagihankabupaten.php" method="post" style="margin-top:5%;">
                <h5><center>Ubah Data Tagihan Kecamatan</center></h5>
               <?php
                  // terima id_tagihan dari halaman calonmahasiswa.php
                  $id_tagihan = $_GET['id_cln'];
                 $query = mysql_query("SELECT  id_tagihan, des, op_baku, op_jumlah, op_realisasi, jml_realisasi, op_selisih, jml_selisih FROM tagihan 
					INNER JOIN desa USING (id_desa)
					INNER JOIN laporan USING (id_desa);");
				 $data = mysql_fetch_array($query);
                  ?>
                <div class="input-field col s12">
                    <i class="material-icons prefix">credit_card</i>
                    <input id="icon_prefix" type="text" class="validate" name="id_tagihan" value="<?php echo $id_tagihan; ?>" disabled>
                    <label for="icon_prefix">ID Tagihan</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">credit_card</i>
                    <input id="icon_prefix" type="text" class="validate" name="des" required length="50" value="<?php echo $data['des']; ?>">
                    <label for="icon_prefix">Nama Kecamatan</label>
                </div>
				 <div class="input-field col s12">
                    <i class="material-icons prefix">shop</i>
                    <input id="icon_prefix" type="text" class="validate" name="op_baku" required length="100" value="<?php echo $data['op_baku']; ?>">
                    <label for="icon_prefix">Realisasi</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">shop_two</i>
                    <input id="icon_prefix" type="text" class="validate" name="op_jumlah" required length="12" value="<?php echo $data['op_jumlah']; ?>">
                    <label for="icon_prefix">Jumlah Realisasi</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">mode_edit</i>
                    <input id="icon_prefix" type="text" class="validate" name="op_realisasi" required length="100" value="<?php echo $data['op_realisasi']; ?>">
                    <label for="icon_prefix">Realisasi</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">input</i>
                    <input id="icon_prefix" type="text" class="validate" name="jml_realisasi" required length="12" value="<?php echo $data['jml_realisasi']; ?>">
                    <label for="icon_prefix">Jumlah Realisasi</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">receipt</i>
                    <input id="icon_prefix" type="text" class="validate" name="op_selisih" required length="16" value="<?php echo $data['op_selisih']; ?>">
                    <label for="icon_prefix">Selisih</label>
                </div>
				<div class="input-field col s12">
                    <i class="material-icons prefix">reorder</i>
                    <input id="icon_prefix" type="text" class="validate" name="jml_selisih" required length="16" value="<?php echo $data['jml_selisih']; ?>">
                    <label for="icon_prefix">Jumlah Selisih</label>
                </div>
             
                  <div class="center col s6"><br>
                  <button class="btn waves-effect waves-light indigo darken-4" type="submit" name="ubahData">Ubah Data<i class="material-icons right"></i></button>
				   <br><br>
				  <br><br>
                </div>
                <input type="hidden" name="id_tagihan" value="<?php echo $data['id_tagihan']; ?>" />
				<center></center><br><br>
            </form>
          </div>
        </div>
        </div>
       <center><span>Copyright 2017 Sistem Informasi Pajak Bumi dan Bangunan Kabupaten Pekalongan</span></center>
  </body>
</html>
