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
            <li><a href="tambahtagihankecamatan.php">Form Tambah Data Kecamatan</a></li>
            <li><a href="tagihankecamatan.php">Kembali</a></li>
          </ul>
        </div>
      </nav>
    </div>

    <div class="row">
      <div class="section" id="index-banner">
        <div class="container col s6 offset-s3 card-panel z-depth-3">
          <h5><center>Tambah Tagihan Kecamatan</center></h5>
          <form method="GET" action="">
            <div class="input-field s12">
              <select name="kecamatan">
                <option value="" disabled selected>Kecamatan</option>
                <?php
                $query = "SELECT * FROM kecamatan";
                $result = mysql_query($query);

                while ($row = mysql_fetch_assoc($result)) { ?>
                <option
                <?php if (isset($_GET['kecamatan'])) {
                          // ($row['ID_KECAMATAN'] == $_GET['kecamatan'] ? 'selected' : '');
                }
                ?>
                value="<?= $row['ID_KECAMATAN']; ?>"
                ><?= $row['KECAMATAN']; ?></option>
                <?php }
                ?>
              </select>
              <button class="btn" type="submit" id="button-pilih">Pilih</button>
            </div>
          </form>
          <br>
          <script type="text/javascript">
            var kecamatan = "";
            <?php
            if (isset($_GET['kecamatan'])) { ?>
              kecamatan = <?= json_encode($_GET['kecamatan']); ?>;
              <?php }
              ?>
              $(document).ready(function() {
                if (kecamatan !== "") {
                  console.log(kecamatan);
                  $("#form-lanjutan").css("display", "block");
                }
              });
            </script>
            <form style="display: none;" action="inserttagihankecamatan.php" method="post" style="margin-top:5%;" id="form-lanjutan">
              <input type="hidden" name="id_kec" value="<?= isset($_GET['kecamatan']) ? $_GET['kecamatan'] : '' ?>">

              <div class="input-field col s12">
                <i class="material-icons prefix">credit_card</i>
                <?php
                $query = "SELECT id_tagihan FROM tagihan ORDER BY id_tghan DESC LIMIT 1";
                $result = mysql_query($query);
                $id_tagihan = mysql_fetch_assoc($result)['id_tagihan'];
                $id_tagihan = substr($id_tagihan, 3);
                $id_tagihan = "TGH" . ($id_tagihan + 1);
            //echo $id_tagihan;
                ?>
                <input id="icon_prefix" type="text" class="validate" name="id_tagihan" id="id_tagihan" value="<?= $id_tagihan;?>" readonly>
                <label for="icon_prefix">ID Tagihan</label>
              </div>

              <div class="input-field col s1">
               <i class="material-icons prefix">dns</i>
             </div>
             <div class="input-field col s11">
               <label></label>
               <select name="des">
                 <option value="" disabled selected>Desa</option>
                 <?php 
                 $query = "SELECT * FROM desa";
                 if (isset($_GET['kecamatan'])) {
                  $id_kec = $_GET['kecamatan'];
                  $query .= " WHERE ID_KECAMATAN='$id_kec'";
                }
                $query .= " ORDER BY ID_DESA";
                $des = mysql_query($query);
                while ($data_column=mysql_fetch_row($des)){?>
                <option value="<?php echo $data_column[1]; ?>"><?php echo $data_column[2];?></option>
                <?php  }
                ?>
              </select>

              <script>
                $(document).ready(function() {
                 $('select').material_select();
               });

                $('select').material_select('destroy');
              </script>
            </div>

            <div class="input-field col s12">
            <i class="material-icons prefix">shop</i>
              <input id="icon_prefix" type="text" class="validate" name="op_baku" required length="50">
              <label for="icon_prefix">Baku</label>
            </div>
            <div class="input-field col s12">
              <i class="material-icons prefix">shop_two</i>
              <input id="icon_prefix" type="text" class="validate" name="op_jumlah" required length="50">
              <label for="icon_prefix">Jumlah</label>
            </div>
            <div class="input-field col s12">
              <i class="material-icons prefix">mode_edit</i>
              <input id="icon_prefix" type="text" class="validate" name="op_realisasi" id="op_realisasi" required length="50">
              <label for="icon_prefix">Realisasi</label>
            </div>
            <div class="input-field col s12">
              <i class="material-icons prefix">input</i>
              <input id="icon_prefix" type="text" class="validate" name="jml_realisasi" id="jml_realisasi" required length="50">
              <label for="icon_prefix">Jumlah Realisasi</label>
            </div>
            <div class="input-field col s12">
              <i class="material-icons prefix">receipt</i>
              <input id="icon_prefix" type="text" class="validate" name="op_selisih" id="op_selisih" required length="50">
              <label for="icon_prefix">Selisih</label>
            </div>
            <div class="input-field col s12">
              <i class="material-icons prefix">reorder</i>
              <input id="icon_prefix" type="text" class="validate" name="jml_selisih" id="jml_selisih" required length="50">
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

    <center><span>Copyright 2017 Sistem Informasi Pajak Bumi dan Bangunan Kabupaten Pekalongan</span></center>
  </body>
  </html>
