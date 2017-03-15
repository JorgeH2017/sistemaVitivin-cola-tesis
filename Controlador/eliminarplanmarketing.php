<?php

require_once("../Clases/planMarketing.php");

$idplanmarketing = base64_decode(filter_input(INPUT_GET, 'idplanmarketing'));
$objMarketing = new planMarketing();
$objMarketing->planMarketing($idplanmarketing);
$resul = $objMarketing->eliminarPlanMarketing($idplanmarketing);
if ($resul != "") {
    echo "<script language='javascript'>alert('Datos eliminados correctamente');window.location='../Vista/listarplanmarketing.php'</script>";
} else {
    echo "<script language='javascript'>alert('Error al eliminar datos');window.location='../Vista/listarplanmarketing.php'</script>";
}
