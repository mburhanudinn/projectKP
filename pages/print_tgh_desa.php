<?php
include_once('../koneksi.php');
require('../pdf/fpdf.php');

	//query ambil data
	$id = $_GET['id'];
	$query = mysql_query("SELECT * from tagihan where id_tagihan LIKE 'TG_$id'");
	$data = mysql_fetch_array($query);
	$id_desa = $data['id_desa'];
	//echo $id_desa;
	$query2 = mysql_query("SELECT op_jumlah from laporan where ID_DESA IN ('$id_desa')");
	$data2 = mysql_fetch_array($query2);
	$op_jumlah = $data2['op_jumlah'];
	$query3 = mysql_query("SELECT des from desa where ID_DESA IN ('$id_desa')");
	$data3 = mysql_fetch_array($query3);
	$namadesa = $data3['des'];
	$query4 = mysql_query("Select * from surat");
	$nomorsurat = mysql_num_rows($query4);
	//end query ambil data
	
	
$pdf = new FPDF("P","cm","A4");

$pdf->SetMargins(1.5,1,1);
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
$pdf->SetFont('Arial','B',10);
$pdf->Cell(29,0.1,"Pekalongan : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(0.7);
$pdf->SetFont('Arial','',10);
$pdf->Cell(4,0,"Nomor       : 2017/X/PKL/DPPKD/00".$nomorsurat,0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(10,0,"Kepada : ",0,0,'R');
$pdf->ln(0.7);
$pdf->SetFont('Arial','',10);
$pdf->Cell(4,0,"Lampiran  : -",0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(11.3,0,"Yth. Ka. Kel./Desa ".$namadesa,0,0,'R');
$pdf->ln(0.7);
$pdf->SetFont('Arial','',10);
$pdf->Cell(4,0,"Perihal      : Tagihan Pembayaran PPB",0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(11,0,"Di Pekalongan ",0,0,'R');
$pdf->ln(0.7);
$pdf->SetFont('Arial','',10);
$pdf->Cell(5.9,0,"Tahun 2017",0,0,'C');
$pdf->ln(1.7);
$pdf->SetFont('Arial','',10);
$pdf->Cell(20,0,"  Diberitahukan dengan hormat, bahwa berdasarkan data kami di Kelurahan / Desa ",0,0,'C');
$pdf->ln(0.9);
$pdf->SetFont('Arial','',10);
$pdf->Cell(19,0,"yang Saudara Pimpin sampai saat ini belum lunas membayar PBB Tahun 2015 dengan rincian",0,0,'C');
$pdf->ln(0.9);
$pdf->SetFont('Arial','',10);
$pdf->Cell(6.9,0,"sebagai berikut : ",0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(11.5,0,"Baku PBB                                                    : Rp. ".$op_jumlah,0,0,'R');
$pdf->ln(0.9);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(11.5,0	,"Realiasasi Pembayaran s/d 01 -01-2017  : Rp. ".$data['jml_realisasi'],0,0,'R');
$pdf->ln(1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(19.1,0,"Belum termasuk perhitungan atas denda keterlambatan sesuai dengan Peraturan Daerah yang",0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(12.3,0,"berlaku akan kami bebankan sebesar 2% perbulan.",0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(20.5,0,"Sehubungan hal tersebut diharapkan saudara lebih optimal dalam menarik tunggakan",0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(16.5,0,"Pajak Bumi dan Bangunan Tahun 2015 dan mohon segera disetorkan ke Kas.",0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(19.5,0,"Demikian untuk diperhatikan dan atas partisipasinya disampaikan terima kasih.",0,0,'C');
$pdf->ln(2);
$pdf->SetFont('Arial','',8);
$pdf->Cell(24,0,"A.n. KEPALA DINAS PENDAPATAN DAN PENGELOLAAN",0,0,'C');
$pdf->ln(0.5);
$pdf->SetFont('Arial','',8);
$pdf->Cell(24.3,0,"KEUANGAN DAERAH KABUPATEN PEKALONGAN",0,0,'C');
$pdf->ln(0.5);
$pdf->SetFont('Arial','',8);
$pdf->Cell(24.4,0,"KEPALA BIDANG PELAYANAN DAN PENAGIHAN",0,0,'C');
$pdf->Image('ttd.png',11.2,20.5	,5,2.5);
$pdf->ln(2.5);
$pdf->SetFont('Arial','U','B',8);
$pdf->Cell(24.4,0,"TRISNO SUHARSANTO, SE, M.Si",0,0,'C');
$pdf->ln(0.5);
$pdf->SetFont('Arial','',8);
$pdf->Cell(24.4,0,"Pembina",0,0,'C');
$pdf->ln(0.5);
$pdf->SetFont('Arial','',8);
$pdf->Cell(24.4,0,"NIP. 19730710 199803 1 007",0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','',8);
$pdf->Cell(6,0,"Tembusan   : ",0,0,'C');
$pdf->ln(0.7);
$pdf->SetFont('Arial','',8);
$pdf->Cell(7,0,"1. Bupati Pekalongan",0,0,'C');
$pdf->ln(0.7);
$pdf->SetFont('Arial','',8);
$pdf->Cell(9.9,0,"2. Sekretaris Daerah Kabupaten Pekalongan",0,0,'C');
$pdf->ln(0.7);
$pdf->SetFont('Arial','',8);
$pdf->Cell(8.8,0,"3. Inspektur Kabupaten Pekalongan",0,0,'C');


$pdf->Output("Tagihan Desa.pdf","I");
?>

