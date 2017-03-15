<?php

require_once("../Clases/planCalidad.php");

$idplancalidad = base64_decode(filter_input(INPUT_GET,'idplancalidad'));
$objCalidad = new planCalidad();
$objCalidad->planCalidad($idplancalidad);
$resul = $objCalidad->eliminarPlanCalidad($idplancalidad);
if ($resul != "") {
    echo "<script language='javascript'>alert('Datos eliminados correctamente');window.location='../Vista/listarplancalidad.php'</script>";
} else {
    echo "<script language='javascript'>alert('Error al eliminar datos');window.location='../Vista/listarplancalidad.php'</script>";
}
