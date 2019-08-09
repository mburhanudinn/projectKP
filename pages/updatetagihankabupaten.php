<?php
//session_start();
include_once('../koneksi.php');
if(empty($_SESSION['username'])){
//header("location: ../login.php");
}

//tangkap data dari form ubahcalonmhs.php
$id_tagihan   = mysql_real_escape_string($_POST['id_tagihan']);
$kecamatan   = mysql_real_escape_string($_POST['kecamatan']);
$op_baku    = mysql_real_escape_string($_POST['op_baku']);
$op_jumlah    = mysql_real_escape_string($_POST['op_jumlah']);
$op_realisasi    = mysql_real_escape_string($_POST['op_realisasi']);
$jml_realisasi = mysql_real_escape_string($_POST['jml_realisasi']);
$op_selisih = mysql_real_escape_string($_POST['op_selisih']);
$jml_selisih  = mysql_real_escape_string($_POST['jml_selisih']);

//update data di database sesuai id_cln
$query = mysql_query("update tagihan set op_realisasi='$op_realisasi', jml_realisasi='$jml_realisasi', op_selisih='$op_selisih', jml_selisih='$jml_selisih' where id_tagihan='$id_tagihan'") or die(mysql_error());
$query = "SELECT id_desa FROM tagihan WHERE id_tagihan='$id_tagihan'";
$result = mysql_query($query);
$id_desa = mysql_fetch_assoc($result)['id_desa'];
$query = "UPDATE desa SET des='$des' WHERE id_desa='$id_desa'";
$query = mysql_query($query);

if ($query) {
	header('location:tagihankabupaten.php?msg=success');
} else {
	header('location:tagihankabupaten.php?msg=failed');
}
?>
