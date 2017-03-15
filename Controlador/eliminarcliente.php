<?php 
require_once("../Clases/Cliente.php");

$rutcliente = base64_decode($_GET["rutcliente"]);
$objClie = new Cliente();
$objClie->Cliente($rutcliente);
$resul = $objClie->eliminarCliente($rutcliente);
if ($resul != "") {
    echo "<script language='javascript'>alert('Datos eliminados correctamente');window.location='../Vista/listarcliente.php'</script>";
} else {
    echo "<script language='javascript'>alert('Error al eliminar datos');window.location='../Vista/listarcliente.php'</script>";
}
