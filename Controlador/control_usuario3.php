<?php

session_start();

require_once("../Clases/Usuario.php");

if (isset($_POST["btnmodificarusuario"]) && $_POST["btnmodificarusuario"] == "Modificar") {
    $idusuario = $_SESSION["idusuario"];
    if (empty($_POST["txtusuario"]) || $_POST["txtusuario"] == "" || $_POST["txtusuario"] == null || preg_match("/^\s+$/", $_POST["txtusuario"])) {
        echo "Debes escribir un nombre de usuario";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ]|[0-9]|[\_\-])+$/", $_POST["txtusuario"])) {
        echo "El nombre de usuario no es válido. Es válido si contiene letras (con y sin tilde), números enteros o guiones";
    } else if (strlen($_POST["txtusuario"]) > 30) {
        echo "El nombre de usuario no debe superar los 30 caracteres";
    } else if (empty($_POST["txtnombres"]) || $_POST["txtnombres"] == "" || $_POST["txtnombres"] == null || preg_match("/^\s+$/", $_POST["txtnombres"])) {
        echo "Debes escribir un nombre";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/", $_POST["txtnombres"])) {
        echo "El nombre debe ser solo letras";
    } else if (strlen($_POST["txtnombres"]) > 50) {
        echo "El nombre no debe superar los 50 caracteres";
    } else if (empty($_POST["txtapellidos"]) || $_POST["txtapellidos"] == "" || $_POST["txtapellidos"] == null || preg_match("/^\s+$/", $_POST["txtapellidos"])) {
        echo "Debes escribir un apellido";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/", $_POST["txtapellidos"])) {
        echo "El apellido debe ser solo letras";
    } else if (strlen($_POST["txtapellidos"]) > 50) {
        echo "El apellido no debe superar los 50 caracteres";
    } else if (empty($_POST["txttelefono"]) || $_POST["txttelefono"] == "" || $_POST["txttelefono"] == null || preg_match("/^\s+$/", $_POST["txttelefono"])) {
        echo "Debes escribir un teléfono";
    } else if (!preg_match("/^([0-9]+){9}$/", $_POST["txttelefono"])) {
        echo "El teléfono no es un número válido";
    } else if (strlen($_POST["txttelefono"]) > 9) {
        echo "El teléfono no debe superar los 9 caracteres";
    } else if (empty($_POST["txtdirecusuario"]) || $_POST["txtdirecusuario"] == "" || $_POST["txtdirecusuario"] == null || preg_match("/^\s+$/", $_POST["txtdirecusuario"])) {
        echo "Debes escribir una dirección";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ]|[0-9])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s]|[0-9]|[\,])*$/", $_POST["txtdirecusuario"])) {
        echo "La dirección puede contener letras o números separados por coma o espacio";
    } else if (strlen($_POST["txtdirecusuario"]) > 100) {
        echo "La dirección no debe superar los 100 caracteres";
    } else {

        $nombreusuario = $_POST["txtusuario"];
        $nombre = $_POST["txtnombres"];
        $apellido = $_POST["txtapellidos"];
        $telefono = $_POST["txttelefono"];
        $direccion = $_POST["txtdirecusuario"];

        $objUsuario = new Usuario();
        $objUsuario->Usuario2($nombreusuario, $nombre, $apellido, $telefono, $direccion);
        $resul = $objUsuario->modificarUsuario($idusuario);
        if ($resul != "") {
            echo "<script language='javascript'>alert('Datos modificados correctamente');window.location='../Vista/listarusuario.php'</script>";
        } else {
            echo "<script language='javascript'>alert('Error al modificar datos');window.location='../Vista/listarusuario.php'</script>";
        }
    }
}

if (isset($_POST["btnCorreo"]) && $_POST["btnCorreo"] == "Modificar") {
    $idusuario = $_SESSION["idusuario2"];
    if (empty($_POST["txtcorreousuario"]) || $_POST["txtcorreousuario"] == "" || $_POST["txtcorreousuario"] == null || preg_match("/^\s+$/", $_POST["txtcorreousuario"])) {
        echo "Debes escribir un correo";
    } else if (!preg_match("/(^\S+@\S+\.\S+)/", $_POST["txtcorreousuario"])) {
        echo "El correo no es válido";
    } else if (strlen($_POST["txtcorreousuario"]) > 50) {
        echo "El correo no debe superar los 50 caracteres";
    } else if (empty($_POST["txtnuevocorreo"]) || $_POST["txtnuevocorreo"] == "" || $_POST["txtnuevocorreo"] == null || preg_match("/^\s+$/", $_POST["txtnuevocorreo"])) {
        echo "Debes escribir un correo nuevo";
    } else if (!preg_match("/(^\S+@\S+\.\S+)/", $_POST["txtnuevocorreo"])) {
        echo "El correo nuevo no es válido";
    } else if (strlen($_POST["txtnuevocorreo"]) > 50) {
        echo "El correo no debe superar los 50 caracteres";
    } else {

        $correo = $_POST["txtcorreousuario"];
        $correonuevo = $_POST["txtnuevocorreo"];

        $objUsuario = new Usuario();
        $objUsuario->Usuario();
        $resul = $objUsuario->existeCorreo($correonuevo);
        $num = mysqli_num_rows($resul);
        if ($num > 0) {
            echo "Este correo ya esta asociado a otro usuario";
        } else if (isset($_POST["btnCorreo"]) && $_POST["btnCorreo"] === "Modificar") {
            $objUsuario = new Usuario();
            $resul = $objUsuario->modificarCorreo($idusuario, $correonuevo);
            if ($resul != "") {
                echo "<script language='javascript'>alert('Datos Modificados correctamente');window.location='../Vista/listarusuario.php'</script>";
            } else {
                echo "<script language='javascript'>alert('Error al modificar datos');window.location='../Vista/listarusuario.php'</script>";
            }
        }
    }
}
