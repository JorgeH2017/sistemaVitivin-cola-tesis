<?php

session_start();

$idusuario = $_SESSION["id"];
$tipousuario = $_SESSION["TipUsuario"];

require_once("../Clases/Cliente.php");

if (isset($_POST["btningresarcliente"]) && $_POST["btningresarcliente"] == "Ingresar") {
    if (empty($_POST["txtrutcliente"]) || $_POST["txtrutcliente"] == "" || $_POST["txtrutcliente"] == null || preg_match("/^\s+$/", $_POST["txtrutcliente"])) {
        echo "Debes escribir un dni ";
    }

    $letra = substr($_POST["txtrutcliente"], -1);
    $numeros = substr($_POST["txtrutcliente"], 0, -1);
    if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra && strlen($letra) == 1 && strlen($numeros) == 8) {
        
    } else {
        echo "El dni no es válido ";
    }

    if (empty($_POST["txtnombrecliente"]) || $_POST["txtnombrecliente"] == "" || $_POST["txtnombrecliente"] == null || preg_match("/^\s+$/", $_POST["txtnombrecliente"])) {
        echo "Debes escribir un nombre";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/", $_POST["txtnombrecliente"])) {
        echo "El nombre debe ser solo letras";
    } else if (strlen($_POST["txtnombrecliente"]) > 50) {
        echo "El nombre no debe superar los 50 caracteres";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])*([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/", $_POST["txtapellidocliente"])) {
        echo "El apellido debe ser solo letras o ingresarlo vacio";
    } else if (preg_match("/^\s+$/", $_POST["txtapellidocliente"])) {
        echo "El apellido debe ser solo letras o ingresarlo vacio";
    } else if (preg_match("/^\s+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/", $_POST["txtapellidocliente"])) {
        echo "El apellido debe ser solo letras o ingresarlo vacio. Sin espacios al comienzo";
    } else if (strlen($_POST["txtapellidocliente"]) > 50) {
        echo "El apellido no debe superar los 50 caracteres";
    } else if (empty($_POST["txttelefonocliente"]) || $_POST["txttelefonocliente"] == "" || $_POST["txttelefonocliente"] == null || preg_match("/^\s+$/", $_POST["txttelefonocliente"])) {
        echo "Debes escribir un teléfono";
    } else if (!preg_match("/^([0-9]+){9}$/", $_POST["txttelefonocliente"])) {
        echo "El teléfono no es un número válido";
    } else if (strlen($_POST["txttelefonocliente"]) > 9) {
        echo "El teléfono no debe superar los 9 caracteres";
    } else if (!preg_match("/(^$|\S+@\S+\.\S+)/", $_POST["txtcorreocliente"])) {
        echo "El correo no es válido";
    } else if (preg_match("/^\s+$/", $_POST["txtcorreocliente"])) {
        echo "El correo no es válido";
    } else if (strlen($_POST["txtcorreocliente"]) > 50) {
        echo "El correo no debe superar los 50 caracteres";
    } else if (empty($_POST["txtdireccioncliente"]) || $_POST["txtdireccioncliente"] == "" || $_POST["txtdireccioncliente"] == null || preg_match("/^\s+$/", $_POST["txtdireccioncliente"])) {
        echo "Debes escribir una dirección";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ]|[0-9])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s]|[0-9]|[\,])*$/", $_POST["txtdireccioncliente"])) {
        echo "La dirección puede contener letras o números separados por coma o espacio";
    } else if (strlen($_POST["txtdireccioncliente"]) > 100) {
        echo "La dirección no debe superar los 100 caracteres";
    } else {

        $rutcliente = $_POST["txtrutcliente"];
        $nombrecliente = $_POST["txtnombrecliente"];
        $apellidocliente = $_POST["txtapellidocliente"];
        $telefonocliente = $_POST["txttelefonocliente"];
        $correocliente = $_POST["txtcorreocliente"];
        $direccioncliente = $_POST["txtdireccioncliente"];

        $objClie = new Cliente();
        $objClie->Cliente($rutcliente);
        $resul = $objClie->existeRut($rutcliente);
        $num = mysqli_num_rows($resul);
        if ($num > 0) {
            echo "El rut del cliente ya existe, debes ingresar otro";
        } else if (isset($_POST["btningresarcliente"]) && $_POST["btningresarcliente"] == "Ingresar") {
            $objClie = new Cliente();
            $objClie->Cliente($rutcliente, $nombrecliente, $apellidocliente, $telefonocliente, $correocliente, $direccioncliente, $idusuario, $tipousuario);
            $resul = $objClie->insertarCliente();
            if ($resul != "") {
                echo "<script language='javascript'>alert('Datos ingresados correctamente');window.location='../Vista/ingresarcliente.php'</script>";
            } else {
                echo "<script language='javascript'>alert('Error al ingresar datos');window.location='../Vista/ingresarcliente.php'</script>";
            }
        }
    }
}
    

