<?php

require("../conexion.php");
require('../librerias/fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->Image('http://127.0.0.1/yovani/insumos_V2/estilos/MercadoLibre_logo1.png',5,3,30);
    // Arial bold 15
    $this->SetFont('Arial','B',30);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(100,10,utf8_decode('GESTIÓN DE INSUMOS MLM'),0,0,'C');
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
    //titulo
    $this->Cell(50);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
} 
$consulta = "SELECT * FROM `planing` WHERE status <> 'Recibido'";
$resultado = $enlace->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);
$pdf->Cell(200,10,"Horarios de carga",0,1,'C',0);
$pdf->Cell(5,10, "ID",1,0,'C',0);
    $pdf->Cell(25,10,"Fecha Agendada" ,1,0,'C',0);
    $pdf->Cell(10,10,"SKU",1,0,'C',0);
    $pdf->Cell(27,10,"Descripcion",1,0,'C',0);
    $pdf->Cell(12,10,"Piezas",1,0,'C',0);
    $pdf->Cell(14,10,"Unidades",1,0,'C',0);
    $pdf->Cell(30,10,"Datos de la unidad",1,0,'C',0);
    $pdf->Cell(30,10,"Operador",1,0,'C',0);
    $pdf->Cell(20,10,"Origen",1,0,'C',0);
    $pdf->Cell(20,10,"Destino",1,1,'C',0);

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(5,10, $row['id_planing'],1,0,'C',0);
    $pdf->Cell(25,10, $row['Fecha_agendada'],1,0,'C',0);
    $pdf->Cell(10,10, $row['codigo_sku'],1,0,'C',0);
    $pdf->Cell(27,10, utf8_decode($row['descripción']),1,0,'C',0);
    $pdf->Cell(12,10, $row['piezas_p'],1,0,'C',0);
    $pdf->Cell(14,10, $row['unidades'],1,0,'C',0);
    $pdf->Cell(30,10, $row['datos_de_la_unidad'],1,0,'C',0);
    $pdf->Cell(30,10, utf8_decode($row['operador']),1,0,'C',0);
    $pdf->Cell(20,10, utf8_decode($row['origen']),1,0,'C',0);
    $pdf->Cell(20,10, utf8_decode($row['destino']),1,1,'C',0);
    # code...
}


$pdf->Output();
?>