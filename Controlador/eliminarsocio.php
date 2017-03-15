<?php

require_once("../Clases/Socio.php");

$rutsocio = base64_decode(filter_input(INPUT_GET, 'rutsocio'));
$objSocio = new Socio();
$objSocio->Socio($rutsocio);
$resul = $objSocio->eliminarSocio($rutsocio);
if ($resul != "") {
    echo "<script language='javascript'>alert('Datos eliminados correctamente');window.location='../Vista/listarsocio.php'</script>";
} else {
    echo "<script language='javascript'>alert('Error al eliminar datos');window.location='../Vista/listarsocio.php'</script>";
}