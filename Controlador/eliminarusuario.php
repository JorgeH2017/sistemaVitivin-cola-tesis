<?php
require_once("../Clases/Usuario.php");

$idusuario = $_GET["idusuario"];
$objUsuario = new Usuario();
$objUsuario->Usuario($idusuario);
$resul = $objUsuario->listarTipoUsuarioDesdeId($idusuario);
$fila = mysqli_fetch_array($resul);
$row = $fila[0];
if ($row == 1) {
    echo "<script language='javascript'>alert('El usuario administrador no puede ser eliminado');window.location='../Vista/listarusuario.php'</script>";
} else {
    $resul2 = $objUsuario->eliminarUsuario($idusuario);
    if ($resul2 != "") {
        echo "<script language='javascript'>alert('Datos eliminados correctamente');window.location='../Vista/listarusuario.php'</script>";
    } else {
        echo "<script language='javascript'>alert('Error al eliminar datos');window.location='../Vista/listarusuario.php'</script>";
    }
}

