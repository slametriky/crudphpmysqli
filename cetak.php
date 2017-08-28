<?php  
	include "config.php";
	$sql = $mysqli->query("SELECT * FROM personal order by name");
	$data = array();
	$no = 1;

	while($row = $sql->fetch_assoc()){
		array_push($data, $row);
		$no++;
	}

	$judul = "BIODATA KELAS 3CA";
	$header = array(
			array("label"=>"ID", "length"=>10, "align"=>"L"),
			array("label"=>"Nama", "length"=>50, "align"=>"L"),
			array("label"=>"Jenis Kelamin", "length"=>30, "align"=>"L"),
			array("label"=>"No HP", "length"=>30, "align"=>"L"),
			array("label"=>"Alamat", "length"=>75, "align"=>"L"),
			);
	require_once ("fpdf/fpdf.php");
	$pdf = new FPDF();
	$pdf->AddPage();

	//tampilan Judul Laporan
	$pdf->SetFont('Arial','B','16'); //Font Arial, Tebal/Bold, ukuran font 16
	$pdf->Cell(0,20, $judul, '0', 1, 'C');
	 
	//Header Table
	$pdf->SetFont('Arial','','10');
	$pdf->SetFillColor(139, 69, 19); //warna dalam kolom header
	$pdf->SetTextColor(255); //warna tulisan putih
	$pdf->SetDrawColor(222, 184, 135); //warna border
	foreach ($header as $kolom) {
	    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
	}
	$pdf->Ln();
	 
	//menampilkan data table
	$pdf->SetFillColor(245, 222, 179); //warna dalam kolom data
	$pdf->SetTextColor(0); //warna tulisan hitam
	$pdf->SetFont('');
	$fill=false;
	foreach ($data as $baris) {
	$i = 0;
	foreach ($baris as $cell) {
	$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
	$i++;
	}
	$fill = !$fill;
	
	$pdf->Ln();
	}
	 
	//output file pdf
	$pdf->Output();
?>