<?php

session_start();

$idusuario = $_SESSION["id"];
$tipousuario = $_SESSION["TipUsuario"];

require_once("../Clases/Trabajador.php");

if (isset($_POST["btningresartrabajador"]) && $_POST["btningresartrabajador"] == "Ingresar") {
    if (empty($_POST["txtruttrabajador"]) || $_POST["txtruttrabajador"] == "" || $_POST["txtruttrabajador"] == null || preg_match("/^\s+$/", $_POST["txtruttrabajador"])) {
        echo "Debes escribir un dni ";
    }

    $letra = substr($_POST["txtruttrabajador"], -1);
    $numeros = substr($_POST["txtruttrabajador"], 0, -1);

    if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra && strlen($letra) == 1 && strlen($numeros) == 8) {
        
    } else {
        echo "El dni no es válido ";
    }

    if (empty($_POST["txtnombretrabajador"]) || $_POST["txtnombretrabajador"] == "" || $_POST["txtnombretrabajador"] == null || preg_match("/^\s+$/", $_POST["txtnombretrabajador"])) {
        echo "Debes escribir un nombre";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/", $_POST["txtnombretrabajador"])) {
        echo "El nombre debe ser solo letras";
    } else if (strlen($_POST["txtnombretrabajador"]) > 50) {
        echo "El nombre no debe superar los 50 caracteres";
    } else if (empty($_POST["txtapellidotrabajador"]) || $_POST["txtapellidotrabajador"] == "" && $_POST["txtapellidotrabajador"] == null || preg_match("/^\s+$/", $_POST["txtapellidotrabajador"])) {
        echo "Debes escribir un apellido";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/", $_POST["txtapellidotrabajador"])) {
        echo "El apellido debe ser solo letras";
    } else if (strlen($_POST["txtapellidotrabajador"]) > 50) {
        echo "El apellido no debe superar los 50 caracteres";
    } else if (empty($_POST["txttelefonotrabajador"]) || $_POST["txttelefonotrabajador"] == "" || $_POST["txttelefonotrabajador"] == null || preg_match("/^\s+$/", $_POST["txttelefonotrabajador"])) {
        echo "Debes escribir un teléfono";
    } else if (!preg_match("/^([0-9]+){9}$/", $_POST["txttelefonotrabajador"])) {
        echo "El teléfono no es un número válido";
    } else if (strlen($_POST["txttelefonotrabajador"]) > 9) {
        echo "El teléfono no debe superar los 9 caracteres";
    } else if (!preg_match("/(^$|\S+@\S+\.\S+)/", $_POST["txtcorreotrabajador"])) {
        echo "El correo no es válido";
    } else if (preg_match("/^\s+$/", $_POST["txtcorreotrabajador"])) {
        echo "El correo no es válido";
    } else if (strlen($_POST["txtcorreotrabajador"]) > 50) {
        echo "El correo no debe superar los 50 caracteres";
    } else if (empty($_POST["txtdirecciontrabajador"]) || $_POST["txtdirecciontrabajador"] == "" || $_POST["txtdirecciontrabajador"] == null || preg_match("/^\s+$/", $_POST["txtdirecciontrabajador"])) {
        echo "Debes escribir una dirección";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ]|[0-9])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s]|[0-9]|[\,])*$/", $_POST["txtdirecciontrabajador"])) {
        echo "La dirección puede contener letras o números separados por coma o espacio";
    } else if (strlen($_POST["txtdirecciontrabajador"]) > 100) {
        echo "La dirección no debe superar los 100 caracteres";
    } else if (empty($_POST["selectpuestotrabajo"]) || $_POST["selectpuestotrabajo"] == "" || $_POST["selectpuestotrabajo"] == null) {
        echo "Debes seleccionar un puesto de trabajo";
    } else {

        $ruttrabajador = $_POST["txtruttrabajador"];
        $nombretrabajador = $_POST["txtnombretrabajador"];
        $apellidotrabajador = $_POST["txtapellidotrabajador"];
        $telefonotrabajador = $_POST["txttelefonotrabajador"];
        $correotrabajador = $_POST["txtcorreotrabajador"];
        $direcciontrabajador = $_POST["txtdirecciontrabajador"];
        $puestotrabajo = $_POST["selectpuestotrabajo"];


        $objTrabajador = new Trabajador();
        $objTrabajador->Trabajador($ruttrabajador);
        $resul = $objTrabajador->existeRut($ruttrabajador);
        $num = mysqli_num_rows($resul);
        if ($num > 0) {
            echo "El rut del trabajador ya existe, debes ingresar otro";
        } else if (isset($_POST["btningresartrabajador"]) && $_POST["btningresartrabajador"] == "Ingresar") {
            $objTrabajador = new Trabajador();
            $objTrabajador->Trabajador($ruttrabajador, $nombretrabajador, $apellidotrabajador, $telefonotrabajador, $correotrabajador, $direcciontrabajador, $idusuario, $puestotrabajo, $tipousuario);
            $resul = $objTrabajador->insertarTrabajador();
            if ($resul != "") {
                echo "<script language='javascript'>alert('Datos ingresados correctamente');window.location='../Vista/ingresartrabajador.php'</script>";
            } else {
                echo "<script language='javascript'>alert('Error al ingresar datos');window.location='../Vista/ingresartrabajador.php'</script>";
            }
        }
    }
}
?>


