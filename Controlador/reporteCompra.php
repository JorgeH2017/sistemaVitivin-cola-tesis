<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location:../Vista/index.html");
}

require_once("../tcpdf/tcpdf.php");
require_once("../Clases/Compra.php");

class mipdfCompra extends TCPDF {

    //Header personalizado
    public function Header() {
        //imagen en header
        $logo = '../Imagen/Reportes_2014.jpg';
        $this->Image($logo, 25, 10, 25, '', 'JPG', '', '', false, 300, '', false, false, 0, false, false, false);

        $this->SetFont('helvetica', 'B', 20);
        $this->Cell(0, 0, 'Reporte de Datos', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

    //footer personalizado
    public function Footer() {
        // posicion
        $this->SetY(-15);
        // fuente
        $this->SetFont('helvetica', '', 8);
        // numero de pagina
        $this->Cell(0, 10, 'Página ' . $this->getAliasNumPage() . ' de ' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

}

//iniciando un nuevo pdf
$pdf = new mipdfCompra('L', 'mm', 'Letter', true, 'UTF-8', false);

//establecer margenes
$pdf->SetMargins(25, 35, 25);
$pdf->SetHeaderMargin(20);

//informacion del pdf
$pdf->SetTitle('Reporte');
$pdf->SetAutoPageBreak(TRUE, 10);

// set font
//$pdf->SetFont('times', '', 10);
// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(0, 0, 0, 0);

// set color for background
$pdf->SetFillColor(200, 200, 200);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
// Multicell test
$pdf->SetFont('times', 'B', 12);
$pdf->MultiCell(40, 6, 'Compras', 1, 'C', 0, 1, '', '', true);

$pdf->SetFont('times', 'B', 12);
$pdf->MultiCell(30, 6, 'id Producto', 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(40, 6, 'Nombre Producto', 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(50, 6, 'Descripción Producto', 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(40, 6, 'Cantidad Producto', 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(40, 6, 'Tipo de Producto', 1, 'C', 0, 1, '', '', true);

$objCompra = new Compra();
$resul = $objCompra->seleccionarCompra();
while ($row = mysqli_fetch_assoc($resul)) {

    $pdf->SetFont('times', '', 10);
    $pdf->MultiCell(30, 20, $row["id_producto"], 1, 'C', 0, 0);
    $pdf->MultiCell(40, 20, $row["nombre_producto"], 1, 'C', 0, 0);
    $pdf->MultiCell(50, 20, $row["descr_producto"], 1, 'C', 0, 0);
    $pdf->MultiCell(40, 20, $row["cantidad"], 1, 'C', 0, 0);
    $pdf->MultiCell(40, 20, $row["nombre_tipoProducto"], 1, 'C', 0, 1);
    
}

ob_clean();
$pdf->Output('reporte_compra.pdf', 'I');
