<?php

session_start();

require_once ("../Modelo/Usuario.php");

if (isset($_POST["btnlogin"]) && $_POST["btnlogin"] == "Ingresar") {

    $username = filter_input(INPUT_POST, 'txtusuario');
    $password = filter_input(INPUT_POST, 'txtpass');

    if ($username != '' && $password != '') {

//Buscar datos en BD
        $objUsuario = new Usuario();
        $validarusuario = $objUsuario->existeUsuario($username);


//manipular datos
        $fila = $validarusuario->fetch();

        $user = $fila["nombre_usuario"];
        if ($user === $username) {
            $contrasenaBD = $fila["contrasena_usuario"];
            if ($contrasenaBD === $password) {
//if (password_verify($password, $contrasenaBD) || $password == $contrasenaBD) {
                if ($fila["id_tipoUsuario"] == 1) {

                    $_SESSION["id"] = $fila["id_usuario"];
                    $_SESSION["usuario"] = $fila["nombre_usuario"];
                    $_SESSION["TipUsuario"] = 1;
                    Header("Location:../Vista/panelAdmin.php");
                } else if ($fila["id_tipoUsuario"] == 2) {

                    $_SESSION["id"] = $fila["id_usuario"];
                    $_SESSION["usuario"] = $fila["nombre_usuario"];
                    $_SESSION["TipUsuario"] = 2;
                    Header("Location:../Vista/panelUsuario.php");
                }
            } else {
                "<script>alert('Contraseña incorrecta');window.location='../index.php'</script>";
            }
        } else {
            "<script>alert('El usuario no existe');window.location='../index.php'</script>";
        }
    } else {
        echo "<script>alert('Complete todos los campos');window.location='../index.php'</script>";
    }
}


