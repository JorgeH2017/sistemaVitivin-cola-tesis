<?php

session_start();

$idusuario = $_SESSION["id"];
$tipousuario = $_SESSION["TipUsuario"];

require_once("../Clases/Socio.php");

if (isset($_POST["btnmodificarsocio"]) && $_POST["btnmodificarsocio"] == "Modificar") {
    if (empty($_POST["txtrutsocio"]) || $_POST["txtrutsocio"] == "" || $_POST["txtrutsocio"] == null || preg_match("/^\s+$/", $_POST["txtrutsocio"])) {
        echo "Debes escribir un dni";
    }

    $letra = substr($_POST["txtrutsocio"], -1);
    $numeros = substr($_POST["txtrutsocio"], 0, -1);
    if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra && strlen($letra) == 1 && strlen($numeros) == 8) {
        
    } else {
        echo "El dni no es válido";
    }

    if (empty($_POST["txtnombresocio"]) || $_POST["txtnombresocio"] == "" || $_POST["txtnombresocio"] == null || preg_match("/^\s+$/", $_POST["txtnombresocio"])) {
        echo "Debes escribir un nombre";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/", $_POST["txtnombresocio"])) {
        echo "El nombre debe ser solo letras";
    } else if (strlen($_POST["txtnombresocio"]) > 50) {
        echo "El nombre no debe superar los 50 caracteres";
    } else if (empty($_POST["txtapellidossocio"]) || $_POST["txtapellidossocio"] == "" || $_POST["txtapellidossocio"] == null || preg_match("/^\s+$/", $_POST["txtapellidossocio"])) {
        echo "Debes escribir un apellido";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/", $_POST["txtapellidossocio"])) {
        echo "El apellido debe ser solo letras";
    } else if (strlen($_POST["txtapellidossocio"]) > 50) {
        echo "El apellido no debe superar los 50 caracteres";
    } else if (empty($_POST["txttelefonosocio"]) || $_POST["txttelefonosocio"] == "" || $_POST["txttelefonosocio"] == null || preg_match("/^\s+$/", $_POST["txttelefonosocio"])) {
        echo "Debes escribir un teléfono";
    } else if (!preg_match("/^([0-9]+){9}$/", $_POST["txttelefonosocio"])) {
        echo "El teléfono no es un número válido";
    } else if (strlen($_POST["txttelefonosocio"]) > 9) {
        echo "El teléfono no debe superar los 9 caracteres";
    } else if (!preg_match("/(^$|\S+@\S+\.\S+)/", $_POST["txtcorreosocio"])) {
        echo "El correo no es válido";
    } else if (strlen($_POST["txtcorreosocio"]) > 50) {
        echo "El correo no debe superar los 50 caracteres";
    } else if (empty($_POST["txtdireccionsocio"]) || $_POST["txtdireccionsocio"] == "" && $_POST["txtdireccionsocio"] == null || preg_match("/^\s+$/", $_POST["txtdireccionsocio"])) {
        echo "Debes escribir una dirección";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ]|[0-9])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s]|[0-9]|[\,])*$/", $_POST["txtdireccionsocio"])) {
        echo "La dirección puede contener letras o números separados por coma o espacio";
    } else if (strlen($_POST["txtdireccionsocio"]) > 100) {
        echo "La dirección no debe superar los 100 caracteres";
    } else {

        $rutsocio = $_POST["txtrutsocio"];
        $nombresocio = $_POST["txtnombresocio"];
        $apellidosocio = $_POST["txtapellidossocio"];
        $telefonosocio = $_POST["txttelefonosocio"];
        $correosocio = $_POST["txtcorreosocio"];
        $direccionsocio = $_POST["txtdireccionsocio"];

        $objSocio = new Socio();
        $objSocio->Socio($rutsocio, $nombresocio, $apellidosocio, $telefonosocio, $correosocio, $direccionsocio, $idusuario, $tipousuario);
        $resul = $objSocio->modificarSocio();
        if ($resul != "") {
            echo "<script language='javascript'>alert('Datos modificados correctamente');window.location='../Vista/listarsocio.php'</script>";
        } else {
            echo "<script language='javascript'>alert('Error al modificar datos');window.location='../Vista/listarsocio.php'</script>";
        }
    }
}


