<?php

require_once("../Clases/Proveedor.php");

$rutproveedor = base64_decode(filter_input(INPUT_GET, 'rutproveedor'));
$objProv = new Proveedor();
$objProv->Proveedor($rutproveedor);
$resul = $objProv->eliminarProveedor($rutproveedor);
if ($resul != "") {
    echo "<script language='javascript'>alert('Datos eliminados correctamente');window.location='../Vista/listarproveedor.php'</script>";
} else {
    echo "<script language='javascript'>alert('Error al eliminar datos');window.location='../Vista/listarproveedor.php'</script>";
}
