<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('L', 'mm', 'Letter');
//$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
$pdf->Image('bopang2.png',45,1,-1000);
$pdf->Image('bopang2.png',205,1,-1000);
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(260,7,'KERIPIK BOPANG MILENIAL',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(260,7,'LAPORAN DAFTAR KATEGORI PRODUK BOPANG MILENIAL',0,1,'C');
 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->SetMargins(60,2);
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',12);
$pdf->Cell(70,6,'ID KATEGORI',1,0);
$pdf->Cell(70,6,'KATEGORI',1,1);
 
$pdf->SetFont('Arial','',12);
 
include '../../koneksi.php';
$lol = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from kategori");
while ($row = mysqli_fetch_array($lol)){
    $pdf->Cell(70,6,$row['id_ketegori'],1,0);
    $pdf->Cell(70,6,$row['kategori'],1,1);
}
$pdf->Cell(10,30,'',0,1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(300, 50,date("m/d/Y"), 0,1,'C');
$pdf->Cell(300, 0, "Staff Pemasaran", 0,1,'C');
$pdf->Cell(300, 10, "Niko Prayoga	 Wiratama", 0,1,'C');
$pdf->Output();
?>