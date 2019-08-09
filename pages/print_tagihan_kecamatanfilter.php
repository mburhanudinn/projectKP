<?php
include_once('../koneksi.php');
require('../pdf/fpdf.php');
$id = $_GET['id'];
$id2 = $_GET['id2'];
$pdf = new FPDF("P","cm","A4");

$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('http://1.bp.blogspot.com/-dqPre_Vf7ug/TcUOavqrKqI/AAAAAAAAAUU/u1dxL9a_EUk/s1600/logo-kab-pekalongan.png',1,0.5,2.5,2.5);
$pdf->SetFont('Arial','B',12);
$pdf->SetX(7.5);            
$pdf->MultiCell(19.5,0.5,'PEMERINTAH KABUPATEN PEKALONGAN',0,'L');
$pdf->SetFont('Arial','B',12);
$pdf->SetX(5);
$pdf->MultiCell(19.5,0.5,'DINAS PENDAPATAN DAN PENGELOLAAN KEUANGAN DAERAH	',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(7);
$pdf->MultiCell(19.5,0.5,'Jl. Sindoro No.7 Kajen Telp. (0285) 381564 Fax (0285) 381775',0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetX(5.5);
$pdf->MultiCell(19.5,0.5,'website : www.pekalongankab.go.id email : admin.pekalongankab@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);  
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(18.5,0.7,"Laporan Tagihan Per Kecamatan Pajak Bumi dan Bangunan",0,10,'C');
$pdf->Cell(19.5,0.7,"Kabupaten Pekalongan",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'ID Tagihan', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Nama Desa', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Baku', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Jumlah', 1, 0, 'C');
$pdf->Cell(2.2, 0.8, 'Realisasi', 1, 0, 'C');
$pdf->Cell(2.8, 0.8, 'Jumlah Realisasi', 1, 0, 'C');
$pdf->Cell(1.7, 0.8, 'Selisih', 1, 0, 'C');
$pdf->Cell(2.4, 0.8, 'Jumlah Selisih', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
for($i=$id;$i<=$id2;$i++){
			$query = mysql_query("SELECT  id_tagihan, des, op_baku, op_jumlah, op_realisasi, jml_realisasi, op_selisih, jml_selisih FROM tagihan 
					INNER JOIN desa USING (id_desa)
					INNER JOIN laporan USING (id_desa)  WHERE id_tagihan LIKE 'TG_$i';");
					while($lihat=mysql_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['id_tagihan'],1, 0, 'C');
	$pdf->Cell(2.5, 0.8, $lihat['des'], 1, 0,'C');
	$pdf->Cell(2, 0.8, $lihat['op_baku'], 1, 0,'C');
	$pdf->Cell(2.5, 0.8, $lihat['op_jumlah'], 1, 0,'C');
	$pdf->Cell(2.2, 0.8, $lihat['op_realisasi'],1, 0, 'C');
	$pdf->Cell(2.8, 0.8, $lihat['jml_realisasi'], 1, 0,'C');
	$pdf->Cell(1.7, 0.8, $lihat['op_selisih'],1, 0, 'C');
	$pdf->Cell(2.4, 0.8, $lihat['jml_selisih'], 1, 1,'C');

	$no++;
}
}

$pdf->Output("Tagihan Kecamatan Filter.pdf","I");

?>

