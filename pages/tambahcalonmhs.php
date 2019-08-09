<?php
session_start();
include_once('../koneksi.php');
if(empty($_SESSION['username'])){
header("location: ../login.php");
}

function autoNumber($id, $table){
  $query = 'SELECT MAX(RIGHT('.$id.', 4)) as max_id FROM '.$table.' ORDER BY '.$id;
  $result = mysql_query($query);
  $data = mysql_fetch_array($result);
  $id_max = $data['max_id'];
  $sort_num = (int) substr($id_max, 1, 4);
  $sort_num++;
  $new_code = sprintf("%04s", $sort_num);
  return $new_code;
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
        <title>Tambah Calon Mahasiwa - Master Data</title>
        <link rel="stylesheet" href="../materialize/css/materialize.css">
        <link rel="stylesheet" href="../materialize/css/custom.css">
        <link href="../materialicon/icon.css" rel="stylesheet">
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
                  <li><a href="tagihandesa.php">Form Tambah Data Desa</a></li>
                  <li><a href="../tagihandesa.php">Kembali</a></li>
                </ul>
              </div>
            </nav>
          </div>
          <div class="row">
          <div class="section" id="index-banner">
          <div class="container col s6 offset-s3 card-panel z-depth-3">
                <form action="insertcalonmhs.php" method="post" style="margin-top:5%;">
                <h5><center>Tambah Data Desa</center></h5>
                <div class="input-field col s12">
                    <i class="material-icons prefix"></i>
                    <input id="icon_prefix" type="text" class="validate" name="id_tagihan" value="<?php echo autoNumber('id_tagihan','tagihan');?>" readonly>
                    <label for="icon_prefix">ID Tagihan</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix"></i>
                    <input id="icon_prefix" type="text" class="validate" name="des" required length="50">
                    <label for="icon_prefix">Nama Desa</label>
                </div>
				<div class="input-field col s12">
                    <i class="material-icons prefix"></i>
                    <input id="icon_prefix" type="text" class="validate" name="op_realisasi" required length="50">
                    <label for="icon_prefix">Realisasi</label>
                </div>
				<div class="input-field col s12">
                    <i class="material-icons prefix"></i>
                    <input id="icon_prefix" type="text" class="validate" name="jml_realisasi" required length="50">
                    <label for="icon_prefix">Jumlah Realisasi</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix"></i>
                    <input id="icon_prefix" type="text" class="validate" name="op_selisih" required length="50">
                    <label for="icon_prefix">Selisih</label>
                </div>
				<div class="input-field col s12">
                    <i class="material-icons prefix"></i>
                    <input id="icon_prefix" type="text" class="validate" name="jml_selisih" required length="50">
                    <label for="icon_prefix">Jumlah Selisih</label>
                </div>
                  <div class="center col s6"><br>
                  <button class="btn waves-effect waves-light indigo darken-4" type="submit" name="Tambah">Tambah Data<i class="material-icons right"></i></button>
				  <br><br>
				  <br><br>
                </div>
            </form>
          </div>
        </div>
        </div>
        <center><span>Copyright 2016 Sistem Penerimaan Mahasiswa Baru</span></center>
  </body>
</html>
