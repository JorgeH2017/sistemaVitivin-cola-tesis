<?php

session_start();

require_once("../Clases/Usuario.php");

if (isset($_POST["btnregistrousuario"]) && $_POST["btnregistrousuario"] == "Ingresar") {
    if (empty($_POST["txtusuario"]) || $_POST["txtusuario"] == "" || $_POST["txtusuario"] == null || preg_match("/^\s+$/", $_POST["txtusuario"])) {
        echo "Debes escribir un nombre de usuario";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ]|[0-9]|[\_\-])+$/", $_POST["txtusuario"])) {
        echo "El nombre de usuario no es válido. Es válido si contiene letras (con y sin tilde), números enteros o guiones";
    } else if (strlen($_POST["txtusuario"]) > 30) {
        echo "El nombre de usuario no debe superar los 30 caracteres";
    } else if (empty($_POST["txtpass"]) || $_POST["txtpass"] == "" || $_POST["txtpass"] == null || preg_match("/^\s+$/", $_POST["txtpass"])) {
        echo "Debes escribir una contraseña";
    } else if (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $_POST["txtpass"])) {
        echo "La contraseña no es válida. Es válida si contiene al menos 1 letra mayúscula y 1 minúscula sin tildes , al menos 1 número, al menos 1 caracter. Un largo minimo de 8 y máximo de 20";
    } else if (strlen($_POST["txtpass"]) > 20) {
        echo "La contraseña no debe superar los 20 caracteres";
    } else if (empty($_POST["txtrepetircontrasena"]) || $_POST["txtrepetircontrasena"] == "" || $_POST["txtrepetircontrasena"] == null || preg_match("/^\s+$/", $_POST["txtrepetircontrasena"])) {
        echo "Debes escribir la contraseña en el campo repetir contraseña";
    } else if ($_POST["txtrepetircontrasena"] != $_POST["txtpass"]) {
        echo "Las contraseñas son diferentes";
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
    } else if (empty($_POST["txtcorreousuario"]) || $_POST["txtcorreousuario"] == "" || $_POST["txtcorreousuario"] == null || preg_match("/^\s+$/", $_POST["txtcorreousuario"])) {
        echo "Debes escribir un correo";
    } else if (!preg_match("/(^\S+@\S+\.\S+)/", $_POST["txtcorreousuario"])) {
        echo "El correo no es válido";
    } else if (strlen($_POST["txtcorreousuario"]) > 50) {
        echo "El correo no debe superar los 50 caracteres";
    } else if (empty($_POST["txtdirecusuario"]) || $_POST["txtdirecusuario"] == "" || $_POST["txtdirecusuario"] == null || preg_match("/^\s+$/", $_POST["txtdirecusuario"])) {
        echo "Debes escribir una dirección";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ]|[0-9])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s]|[0-9]|[\,])*$/", $_POST["txtdirecusuario"])) {
        echo "La dirección puede contener letras o números separados por coma o espacio";
    } else if (strlen($_POST["txtdirecusuario"]) > 100) {
        echo "La dirección no debe superar los 100 caracteres";
    } else if (empty($_POST["selecttipousuario"]) || $_POST["selecttipousuario"] == "" || $_POST["selecttipousuario"] == null) {
        echo "Debes seleccionar un tipo de usuario";
    } else {

        $nombreusuario = $_POST["txtusuario"];
        $contrasena = $_POST["txtpass"];
        $passhash = password_hash($contrasena, PASSWORD_BCRYPT);
        $repetircontrasena = $_POST["txtrepetircontrasena"];
        $nombre = $_POST["txtnombres"];
        $apellido = $_POST["txtapellidos"];
        $telefono = $_POST["txttelefono"];
        $correo = $_POST["txtcorreousuario"];
        $direccion = $_POST["txtdirecusuario"];
        $tipousuario = $_POST["selecttipousuario"];

        $objUsuario = new Usuario();
        $objUsuario->Usuario($nombreusuario);
        $resul = $objUsuario->existeUsuario($nombreusuario);
        $num = mysqli_num_rows($resul);
        if ($num > 0) {
            echo "El nombre de usuario ya existe, debes ingresar otro";
        }

        $resul2 = $objUsuario->existeCorreo($correo);
        $num2 = mysqli_num_rows($resul2);
        if ($num2 > 0) {
            echo "Este correo ya esta asociado a otro usuario";
        } else if (isset($_POST["btnregistrousuario"]) && $_POST["btnregistrousuario"] === "Ingresar") {
            $objUsuario = new Usuario();
            $objUsuario->Usuario($nombreusuario, $passhash, $nombre, $apellido, $telefono, $correo, $direccion, $tipousuario);
            $resul = $objUsuario->insertarUsuario();
            if ($resul != "") {
                echo "<script language='javascript'>alert('Datos ingresados correctamente');window.location='../Vista/registrarusuario.php'</script>";
            } else {
                echo "<script language='javascript'>alert('Error al ingresar datos');window.location='../Vista/registrarusuario.php'</script>";
            }
        }
    }
}








    