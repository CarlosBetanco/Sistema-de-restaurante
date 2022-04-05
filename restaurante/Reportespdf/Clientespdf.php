<?php
include("../Conexion/conectar.php");
require ('./fpdf/fpdf.php')

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(30,10,'Reporte de Clientes',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}
require 'conectar.php';
$consulta = "select * from cliente";
$resultado =$mysqli->query($consulta);

$pdf= new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,uff8_decode('!Hola mundo!'));

while($row = $resultado->fetch_assoc()){
    $pdf->cell(90,10, $row['Codigo'],1,0,'C',0);
    $pdf->cell(90,10, $row['Documento'],1,0,'C',0);
    $pdf->cell(90,10, $row['Nombre'],1,0,'C',0);
    $pdf->cell(90,10, $row['Apellido'],1,0,'C',0);
    $pdf->cell(90,10, $row['Telefono'],1,0,'C',0);
    $pdf->cell(90,10, $row['Correo'],1,0,'C',0);
}

$pdf->Output();
?>
