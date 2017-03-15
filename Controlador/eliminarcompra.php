<?php

require_once("../Clases/Compra.php");

$idproducto = base64_decode(filter_input(INPUT_GET,'idproducto'));
$objPro = new Compra();
$objPro->Compra($idproducto);
$resul = $objPro->eliminarProducto($idproducto);
if ($resul != "") {
    echo "<script language='javascript'>alert('Datos eliminados correctamente');window.location='../Vista/listarproductos.php'</script>";
} else {
    echo "<script language='javascript'>alert('Este usuario no puede ser eliminado');window.location='../Vista/listarproductos.php'</script>";
}