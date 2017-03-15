<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location:../Vista/index.html");
}

require_once("../tcpdf/tcpdf.php");
require_once("../Clases/Socio.php");

class mipdfSocio extends TCPDF {

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
$pdf = new mipdfSocio('L', 'mm', 'Letter', true, 'UTF-8', false);

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
$pdf->MultiCell(40, 6, 'Socios', 1, 'C', 0, 1, '', '', true);

$pdf->SetFont('times', 'B', 12);
$pdf->MultiCell(20, 6, 'Dni', 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(40, 6, 'Nombre', 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(40, 6, 'Apellido', 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(30, 6, 'Teléfono', 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(40, 6, 'Correo', 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(40, 6, 'Dirección', 1, 'C', 0, 1, '', '', true);

$objSocio = new Socio();
$resul = $objSocio->listarSocio();
while ($row = mysqli_fetch_assoc($resul)) {

    $pdf->SetFont('times', '', 10);
    $pdf->MultiCell(20, 20, $row["rut_socio"], 1, 'C', 0, 0);
    $pdf->MultiCell(40, 20, $row["nombre_socio"], 1, 'C', 0, 0);
    $pdf->MultiCell(40, 20, $row["apellidos_socio"], 1, 'C', 0, 0);
    $pdf->MultiCell(30, 20, $row["telefono_socio"], 1, 'C', 0, 0);
    $pdf->MultiCell(40, 20, $row["correo_socio"], 1, 'C', 0, 0);
    $pdf->MultiCell(40, 20, $row["direccion_socio"], 1, 'C', 0, 1);
}

ob_clean();
$pdf->Output('reporte_socios.pdf', 'I');

