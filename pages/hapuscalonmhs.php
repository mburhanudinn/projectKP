<?php
include('../koneksi.php');

if(empty($_SESSION['username'])){
header("location: ../login.php");
}

//$id_desa = $_GET['Id_desa'];
$id_tagihan = $_GET['id_tagihan'];

//$query = mysql_query("DELETE FROM tagihan WHERE Id_desa='$id_desa'") or die(mysql_error());
$query = mysql_query("DELETE FROM tagihan WHERE id_tagihan='$id_tagihan'") or die(mysql_error());

if ($query) {
	header('location:tagihandesa.php');
} else {
	header('location:tagihandesa.php');
}
?>
