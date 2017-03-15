<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("location:../Vista/index.html");
}

require_once("../tcpdf/tcpdf.php");
require_once("../Clases/planMarketing.php");

class mipdfMarketing extends TCPDF {

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
$pdf = new mipdfMarketing('L', 'mm', 'Letter', true, 'UTF-8', false);

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
$pdf->MultiCell(40, 6, 'Planes de Marketing', 1, 'C', 0, 1, '', '', true);

$pdf->SetFont('times', 'B', 12);
$pdf->MultiCell(40, 6, 'Id Plan de Marketing', 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(40, 6, 'Nombre Plan de Marketing', 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(40, 6, 'Fecha Plan de Marketing', 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(40, 6, 'Nombre Propiedad de Marketing', 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(50, 6, 'Descripción Propiedad de Marketing', 1, 'C', 0, 1, '', '', true);


$objMarketing = new planMarketing();
$resul = $objMarketing->listarPlanMarketing2();
while ($row = mysqli_fetch_assoc($resul)) {

    $pdf->SetFont('times', '', 10);
    $pdf->MultiCell(40, 23, $row["id_planMarketing"], 1, 'C', 0, 0);
    $pdf->MultiCell(40, 23, $row["nombre_planMarketing"], 1, 'C', 0, 0);
    $pdf->MultiCell(40, 23, $row["fecha_planMarketing"], 1, 'C', 0, 0);
    $pdf->MultiCell(40, 23, $row["nombre_propiedadMarketing"], 1, 'C', 0, 0);
    $pdf->MultiCell(50, 23, $row["descr_propiedadMarketing"], 1, 'C', 0, 1);
}

ob_clean();
$pdf->Output('reporte_marketing.pdf', 'I');


