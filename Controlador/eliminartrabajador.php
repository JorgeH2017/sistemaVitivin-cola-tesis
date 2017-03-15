<?php

require_once("../Clases/Trabajador.php");

$ruttrabajador = base64_decode(filter_input(INPUT_GET, 'ruttrabajador'));
$objTrabajador = new Trabajador();
$objTrabajador->Trabajador($ruttrabajador);
$resul = $objTrabajador->eliminarTrabajador($ruttrabajador);
if ($resul != "") {
    echo "<script language='javascript'>alert('Datos eliminados correctamente');window.location='../Vista/listartrabajador.php'</script>";
} else {
    echo "<script language='javascript'>alert('Error al eliminar datos');window.location='../Vista/listartrabajador.php'</script>";
}