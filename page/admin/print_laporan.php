<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('L', 'mm', 'Letter');
//$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
$pdf->Image('bopang2.png',43,1,-1000);
$pdf->Image('bopang2.png',205,1,-1000);
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(260,7,'KERIPIK BOPANG MILENIAL',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(260,7,'LAPORAN TRANSAKSI PEMBELIAN KERIPIK BOPANG MILENIAL',0,1,'C');
 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->SetMargins(10,2);
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,6,'NO',1,0);
$pdf->Cell(70,6,'NAMA PEMBELI',1,0);
$pdf->Cell(70,6,'ALAMAT',1,0);
$pdf->Cell(35,6,'NO.TELEPHONE',1,0);
$pdf->Cell(60,6,'TANGGAL PEMBELIAN',1,1);
 
$pdf->SetFont('Arial','',12);
 
include '../../koneksi.php';
$lol = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM chekout");
while ($row = mysqli_fetch_array($lol)){
    $pdf->Cell(20,6,$row['id_chekout'],1,0);
    $pdf->Cell(70,6,$row['nama'],1,0);
    $pdf->Cell(70,6,$row['alamat'],1,0);
    $pdf->Cell(35,6,$row['nomor_tlp'],1,0); 
	$pdf->Cell(60,6,$row['tanggal'],1,1);
}
$pdf->Cell(10,30,'',0,1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(400, 50,date("m/d/Y"), 0,1,'C');
$pdf->Cell(400, 0, "Staff Pemasaran", 0,1,'C');
$pdf->Cell(400, 10, "Niko Prayoga	 Wiratama", 0,1,'C');
$pdf->Output();
?>