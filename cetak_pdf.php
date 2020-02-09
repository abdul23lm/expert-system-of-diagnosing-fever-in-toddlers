<?php
error_reporting(0);
extract($_REQUEST);
require('plugins/fpdf17/fpdf.php');
require('config.php');
session_start();
$sql = mysql_num_rows(mysql_query("SELECT COUNT(*) FROM tbl_temp"));
if($sql > 0){

class PDF extends FPDF
{
}
$pdf = new PDF();

# Start : Identifikasi
$ctk_identifikasi = '';
$n_identifikasi = 1;
$sql = mysql_query("SELECT tbl_temp.id_identifikasi as id, tbl_identifikasi.pertanyaan as pertanyaan FROM tbl_identifikasi, tbl_temp WHERE tbl_temp.id_identifikasi=tbl_identifikasi.id_identifikasi ORDER BY id ASC");
while ($identifikasi = mysql_fetch_object($sql)) {
	$ctk_identifikasi .= $n_identifikasi.'. '.$identifikasi->pertanyaan.'
';
	$n_identifikasi++;
}
# End : Identifikasi

$pdf->FPDF('P','mm','A4');
$pdf->SetMargins(18,15,30);
$pdf->open();
$pdf->AddPage();
$pdf->Ln(20);
$pdf->SetFont('Times','BU',18);
$pdf->Cell(180,5,'SISTEM PAKAR', 0,0,'C');
$pdf->Ln(8);
$pdf->SetFont('Times','',12);
$pdf->Cell(180,5,'Untuk Mendiagnosa Demam pada Balita', 0,0,'C');
$pdf->Ln(8);
$pdf->SetLineWidth(1);
$pdf->Line(20,50,190,50);
$pdf->SetLineWidth(0);
$pdf->Line(19.5,51,190.5,51);
$pdf->Ln(8);
$pdf->Cell(180,5,'Setelah anda melakukan beberapa tahap konsultasi maka dihasilkan laporan sebagai berikut : ', 0,0,'J');
$pdf->Ln(8);
$pdf->Cell(40,5,'          Identifikasi       : ', 0,0,'J');
$pdf->MultiCell(100,5,$ctk_identifikasi,'J');
$pdf->Ln(4);

# Start : Kesimpulan & Solusi
$sql = mysql_query("SELECT tbl_temp.id_identifikasi as id, tbl_kesimpulan.kesimpulan as kesimpulan, tbl_kesimpulan.solusi as solusi FROM tbl_kesimpulan, tbl_temp, tbl_arahan WHERE tbl_temp.id_identifikasi=tbl_arahan.id_identifikasi AND tbl_arahan.id_kesimpulan=tbl_kesimpulan.id_kesimpulan AND tbl_temp.id_identifikasi=(SELECT tbl_temp.id_identifikasi FROM tbl_temp ORDER BY tbl_temp.id_identifikasi DESC LIMIT 0,1) ORDER BY id ASC");
while ($ks = mysql_fetch_object($sql)) {
$pdf->Cell(40,5,'          Kesimpulan      : ', 0,0,'J');
$pdf->MultiCell(100,5,$ks->kesimpulan,'J');
$pdf->Ln(4);
$pdf->Cell(40,5,'          Solusi               : ', 0,0,'J');
$pdf->MultiCell(100,5,$ks->solusi,'J');
$pdf->Ln(8);
}
# End : Kesimpulan & Solusi
$pdf->MultiCell(180,5,'Laporan ini dibuat berdasarkan hasil dari konsultasi anda. Adapun laporan ini dibuat berdasarkan hipotesis ahli pakar.','J');
$pdf->Output("Hasil Konsultasi Diagnosis Demam pada Balita","I");
}else{
	header("location:index.php");
}
?>