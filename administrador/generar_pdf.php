<?php
require_once('tcpdf/tcpdf.php');

// Obtén la información necesaria para el PDF
$idalu = $_POST['idalu']; // Asegúrate de pasarlo desde JavaScript

// Crea una instancia de TCPDF
$pdf = new TCPDF();

// Establece el título y el encabezado del PDF
$pdf->SetTitle('Detalle de Pago');
$pdf->SetHeaderData('', 0, 'Detalle de Pago', '');

// Agrega una página al PDF
$pdf->AddPage();

// Agrega la información al PDF (personaliza esto según tus necesidades)
$pdf->SetFont('helvetica', '', 12);
$pdf->MultiCell(0, 10, "ID del Alumno: $idalu", 0, 'L');

// Genera el PDF y envíalo al navegador
$pdf->Output('detalle_pago.pdf', 'I');
?>
