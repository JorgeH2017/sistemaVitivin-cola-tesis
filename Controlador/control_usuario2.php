<?php

session_start();

require_once("../Clases/Usuario.php");

if (isset($_POST["btnmodificartelefono"]) && $_POST["btnmodificartelefono"] == "Modificar Teléfono") {
    if (empty($_POST["txttelefono"]) || $_POST["txttelefono"] == "" || $_POST["txttelefono"] == null || preg_match("/^\s+$/", $_POST["txttelefono"])) {
        echo "Debes escribir un teléfono";
    } else if (!preg_match("/^([0-9]+){9}$/", $_POST["txttelefono"])) {
        echo "El teléfono no es un número válido";
    } else if (strlen($_POST["txttelefono"]) > 9) {
        echo "El teléfono no debe superar los 9 caracteres";
    } else {
        $telefono = $_POST["txttelefono"];

        $idusuario = $_SESSION["idusuario"];
        $objUsuario = new Usuario();
        $resul = $objUsuario->modificarTelefono($idusuario, $telefono);
        if ($resul != "") {
            echo "<script language='javascript'>alert('Telefono modificado correctamente');window.location='../Vista/modificarusuariosimple.php'</script>";
        } else {
            echo "<script language='javascript'>alert('Error al modificar datos');window.location='../Vista/modificarusuariosimple.php'</script>";
        }
    }
}

if (isset($_POST["btnmodificarcorreo"]) && $_POST["btnmodificarcorreo"] == "Modificar Correo") {
    $idusuario = $_SESSION["idusuario"];
    if (empty($_POST["txtcorreousuario"]) || $_POST["txtcorreousuario"] == "" || $_POST["txtcorreousuario"] == null || preg_match("/^\s+$/", $_POST["txtcorreousuario"])) {
        echo "Debes escribir un correo";
    } else if (!preg_match("/(^\S+@\S+\.\S+)/", $_POST["txtcorreousuario"])) {
        echo "El correo no es válido";
    } else if (strlen($_POST["txtcorreousuario"]) > 50) {
        echo "El correo no debe superar los 50 caracteres";
    } else if (empty($_POST["txtcorreonuevo"]) || $_POST["txtcorreonuevo"] == "" || $_POST["txtcorreonuevo"] == null || preg_match("/^\s+$/", $_POST["txtcorreonuevo"])) {
        echo "Debes escribir un correo";
    } else if (!preg_match("/(^\S+@\S+\.\S+)/", $_POST["txtcorreonuevo"])) {
        echo "El correo no es válido";
    } else if (strlen($_POST["txtcorreonuevo"]) > 50) {
        echo "El correo no debe superar los 50 caracteres";
    } else {

        $correo = $_POST["txtcorreousuario"];
        $correonuevo = $_POST["txtcorreonuevo"];

        $objUsuario = new Usuario();
        $objUsuario->Usuario();
        $resul = $objUsuario->existeCorreo($correonuevo);
        $num = mysqli_num_rows($resul);
        if ($num > 0) {
            echo "<script language='javascript'>alert('Este correo ya esta asociado a otro usuario');window.location='../Vista/modificarusuariosimple.php'</script>";
        } else if (isset($_POST["btnmodificarcorreo"]) && $_POST["btnmodificarcorreo"] === "Modificar Correo") {
            $objUsuario = new Usuario();
            $resul = $objUsuario->modificarCorreo($idusuario, $correonuevo);
            if ($resul != "") {
                echo "<script language='javascript'>alert('Correo modificado correctamente');window.location='../Vista/modificarusuariosimple.php'</script>";
            } else {
                echo "<script language='javascript'>alert('Error al modificar datos');window.location='../Vista/modificarusuariosimple.php'</script>";
            }
        }
    }
}

if (isset($_POST["btnmodificardireccion"]) && $_POST["btnmodificardireccion"] == "Modificar Dirección") {
    $idusuario = $_SESSION["idusuario"];
    if (empty($_POST["txtdireccusuario"]) || $_POST["txtdireccusuario"] == "" || $_POST["txtdireccusuario"] == null || preg_match("/^\s+$/", $_POST["txtdireccusuario"])) {
        echo "Debes escribir una dirección";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ]|[0-9])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s]|[0-9]|[\,])*$/", $_POST["txtdireccusuario"])) {
        echo "La dirección puede contener letras o números separados por coma o espacio";
    } else if (strlen($_POST["txtdireccusuario"]) > 100) {
        echo "La dirección no debe superar los 100 caracteres";
    } else {

        $direccion = $_POST["txtdireccusuario"];

        $objUsuario = new Usuario();
        $resul = $objUsuario->modificarDireccion($idusuario, $direccion);
        if ($resul != "") {
            echo "<script language='javascript'>alert('Dirección modificada correctamente');window.location='../Vista/modificarusuariosimple.php'</script>";
        } else {
            echo "<script language='javascript'>alert('Error al modificar datos');window.location='../Vista/modificarusuariosimple.php'</script>";
        }
    }
}

if (isset($_POST["btnmodificarcontrasena"]) && $_POST["btnmodificarcontrasena"] == "Modificar Contraseña") {
    $idusuario = $_SESSION["idusuario"];
    if (empty($_POST["txtcontrasenaactual"]) || $_POST["txtcontrasenaactual"] == "" || $_POST["txtcontrasenaactual"] == null || preg_match("/^\s+$/", $_POST["txtcontrasenaactual"])) {
        echo "Debes escribir la contraseña actual";
    } else if (empty($_POST["txtcontrasenanueva"]) || $_POST["txtcontrasenanueva"] == "" || $_POST["txtcontrasenanueva"] == null || preg_match("/^\s+$/", $_POST["txtcontrasenanueva"])) {
        echo "Debes escribir una contraseña nueva";
    } else if (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $_POST["txtcontrasenanueva"])) {
        echo "La contraseña nueva no es válida. Es válida si contiene al menos 1 letra mayúscula y 1 minúscula sin tildes , al menos 1 número, al menos 1 caracter. Un largo minimo de 8 y máximo de 20";
    } else if (strlen($_POST["txtcontrasenanueva"]) > 20) {
        echo "La contraseña nueva no debe superar los 20 caracteres";
    } else if (empty($_POST["txtrepetircontrasenanueva"]) || $_POST["txtrepetircontrasenanueva"] == "" || $_POST["txtrepetircontrasenanueva"] == null || preg_match("/^\s+$/", $_POST["txtrepetircontrasenanueva"])) {
        echo "Debes escribir la contraseña en el campo repetir contraseña";
    } else if ($_POST["txtrepetircontrasenanueva"] != $_POST["txtcontrasenanueva"]) {
        echo "Las contraseñas son diferentes";
    } else {

        $contrasenaactual = $_POST["txtcontrasenaactual"];
        $contrasenanueva = $_POST["txtcontrasenanueva"];
        $repetircontrasena = $_POST["txtrepetircontrasenanueva"];

        $objUsuario = new Usuario();
        $resul = $objUsuario->seleccionarContrasena($idusuario);
        $fila = mysqli_fetch_array($resul);
        $contrasena = $fila["contrasena_usuario"];

        if (password_verify($contrasenaactual, $contrasena) || ( $contrasenaactual == $contrasena)) {
            $contrasenanueva = password_hash($contrasenanueva, PASSWORD_BCRYPT);
            $objUsuario->modificarContrasena($idusuario, $contrasenanueva);
            echo "<script language='javascript'>alert('Contraseña modificada correctamente');window.location='../Vista/modificarusuariosimple.php'</script>";
        } else {
            echo "<script language='javascript'>alert('La contraseña actual es incorrecta');window.location='../Vista/modificarusuariosimple.php'</script>";
        }
    }
}
