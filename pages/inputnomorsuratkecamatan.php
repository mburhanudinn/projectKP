<?php
	include_once('../koneksi.php');
	$id = $_POST['tanggal1'];
	// $query = mysql_query("SELECT * from tagihan where id_tagihan LIKE 'TG_$id'");
	// $data = mysql_fetch_array($query);
	// $id_kecamatan = $data['id_kecamatan'];
	// $query3 = mysql_query("SELECT kecamatan from kecamatan where id_kecamatan IN ('$id_kecamatan')");
	// $data3 = mysql_fetch_array($query3);
	// $namakecamatan = $data3['kecamatan'];
	$query = mysql_query("Select * from surat");
	$jumlah = mysql_num_rows($query);
	$nomorsurat = $jumlah + 1;
	//end query ambil data
	$input = mysql_query("insert into surat values ('$nomorsurat', 'Surat $namadesa')") or die(mysql_error());

	if($input){
		header('location:print_tgh_kecamatan.php?id='.$id);
	}

?>