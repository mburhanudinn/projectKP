<?php
	include_once('../koneksi.php');
	$id = $_POST['tanggal1'];
	$query = mysql_query("SELECT * from tagihan where id_tagihan LIKE 'TG_$id'");
	$data = mysql_fetch_array($query);
	$id_desa = $data['id_desa'];
	$query3 = mysql_query("SELECT des from desa where ID_DESA IN ('$id_desa')");
	$data3 = mysql_fetch_array($query3);
	$namadesa = $data3['des'];
	$query = mysql_query("Select * from surat");
	$tambah = mysql_num_rows($query);
	$nomorsurat = $jumlah + 1;
	//end query ambil data
	$input = mysql_query("insert into surat values ('$nomorsurat', 'Surat $namadesa')") or die(mysql_error());

	if($input){
		header('location:print_tgh_desa.php?id='.$id);
	}

?>