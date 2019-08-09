<?php
include_once('../koneksi.php');
if(empty($_SESSION['username'])){
header("location: ../login.php");
}

// terima data dari halaman tambahcalonmhs.php
$id_tagihan   = mysql_real_escape_string($_POST['id_tagihan']);
$id_kec   = mysql_real_escape_string($_POST['id_kec']);
$kecamatan   = mysql_real_escape_string($_POST['kecamatan']);
$op_baku    = mysql_real_escape_string($_POST['op_baku']);
$op_jumlah = mysql_real_escape_string($_POST['op_jumlah_']);
$op_realisasi    = mysql_real_escape_string($_POST['op_realisasi']);
$jml_realisasi = mysql_real_escape_string($_POST['jml_realisasi']);
$op_selisih = mysql_real_escape_string($_POST['op_selisih']);
$jml_selisih  = mysql_real_escape_string($_POST['jml_selisih']);

// simpan data ke database
$query = "
	INSERT INTO tagihan (id_kecamatan, id_desa, id_tagihan, op_realisasi, jml_realisasi, op_selisih, jml_selisih) VALUES ('$id_kec', '$kecamatan', '$id_tagihan', '$op_realisasi', '$jml_realisasi', '$op_selisih', '$jml_selisih')
";
$query2 = "
	INSERT INTO laporan (op_baku, op_jumlah) VALUES ('$op_baku', '$op_jumlah')
";


$query = mysql_query($query);
//$result = mysql_query($query);
//$query = "SELECT id_desa FROM tagihan WHERE id_tagihan='$id_tagihan'";
//$result = mysql_query($query);
//$id_desa = mysql_fetch_assoc($result)['id_desa'];
//$query =  mysql_query("INSERT INTO desa VALUES ('$des')");
//$query = mysql_query($query);

//echo mysql_error();



if ($query) {
  // jika berhasil menyimpan
	//echo 'berhasil';
 header('location: tagihankabupaten.php?message=berhasil');
} else {
  // jika gagal menyimpan 
  //echo 'gagal';
  //echo mysql_error();
  header('location: tagihankabupaten.php?message=gagal');
}
?>
