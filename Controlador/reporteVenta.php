<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("location:../Vista/index.html");
}

require_once("../tcpdf/tcpdf.php");
require_once("../Clases/Venta.php");

class mipdfVenta extends TCPDF {

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
$pdf = new mipdfVenta('L', 'mm', 'Letter', true, 'UTF-8', false);

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
$pdf->MultiCell(40, 6, 'Ventas', 1, 'C', 0, 1, '', '', true);

$pdf->SetFont('times', 'B', 12);
$pdf->MultiCell(40, 6, 'Id Documento Venta', 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(40, 6, 'Fecha Venta', 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(40, 6, 'Cantidad Venta', 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(45, 6, 'Tipo Documento Venta', 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(40, 6, 'Monto Total Venta', 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(40, 6, 'Vino Venta', 1, 'C', 0, 1, '', '', true);

$objVenta = new Venta();
$resul = $objVenta->listarVentas();
while ($row = mysqli_fetch_assoc($resul)) {

    $pdf->SetFont('times', '', 10);
    $pdf->MultiCell(40, 15, $row["id_documentoVenta"], 1, 'C', 0, 0);
    $pdf->MultiCell(40, 15, $row["fecha_documentoVenta"], 1, 'C', 0, 0);
    $pdf->MultiCell(40, 15, $row["cantidad_vinoVenta"], 1, 'C', 0, 0);
    $pdf->MultiCell(45, 15, $row["tipo_documentoVenta"], 1, 'C', 0, 0);
    $pdf->MultiCell(40, 15, $row["monto_totalVenta"], 1, 'C', 0, 0);
    $pdf->MultiCell(40, 15, $row["nombre_vino"], 1, 'C', 0, 1);
}

ob_clean();
$pdf->Output('reporte_ventas.pdf', 'I');

