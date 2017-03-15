<?php

session_start();

$idusuario = $_SESSION["id"];
$tipousuario = $_SESSION["TipUsuario"];

require_once("../Clases/Proveedor.php");

if (isset($_POST["btningresarproveedor"]) && $_POST["btningresarproveedor"] == "Ingresar") {
    if (empty($_POST["txtrutproveedor"]) || $_POST["txtrutproveedor"] == "" || $_POST["txtrutproveedor"] == null || preg_match("/^\s+$/", $_POST["txtrutproveedor"])) {
        echo "Debes escribir un dni ";
    }

    $letra = substr($_POST["txtrutproveedor"], -1);
    $numeros = substr($_POST["txtrutproveedor"], 0, -1);
    if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra && strlen($letra) == 1 && strlen($numeros) == 8) {
        
    } else {
        echo "El dni no es válido ";
    }

    if (empty($_POST["txtnombreproveedor"]) || $_POST["txtnombreproveedor"] == "" || $_POST["txtnombreproveedor"] == null || preg_match("/^\s+$/", $_POST["txtnombreproveedor"])) {
        echo "Debes escribir un nombre";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/", $_POST["txtnombreproveedor"])) {
        echo "El nombre debe ser solo letras";
    } else if (strlen($_POST["txtnombreproveedor"]) > 50) {
        echo "El nombre no debe superar los 50 caracteres";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])*([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/", $_POST["txtapellidoproveedor"])) {
        echo "El apellido debe ser solo letras o ingresarlo vacio";
    } else if (preg_match("/^\s+$/", $_POST["txtapellidoproveedor"])) {
        echo "El apellido debe ser solo letras o ingresarlo vacio";
    } else if (preg_match("/^\s+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/", $_POST["txtapellidoproveedor"])) {
        echo "El apellido debe ser solo letras o ingresarlo vacio. Sin espacios al comienzo";
    } else if (strlen($_POST["txtapellidoproveedor"]) > 50) {
        echo "El apellido no debe superar los 50 caracteres";
    } else if (empty($_POST["txttelefonoproveedor"]) || $_POST["txttelefonoproveedor"] == "" || $_POST["txttelefonoproveedor"] == null || preg_match("/^\s+$/", $_POST["txttelefonoproveedor"])) {
        echo "Debes escribir un teléfono";
    } else if (!preg_match("/^([0-9]+){9}$/", $_POST["txttelefonoproveedor"])) {
        echo "El teléfono no es un número válido";
    } else if (strlen($_POST["txttelefonoproveedor"]) > 9) {
        echo "El teléfono no debe superar los 9 caracteres";
    } else if (empty($_POST["txtdireccionproveedor"]) || $_POST["txtdireccionproveedor"] == "" || $_POST["txtdireccionproveedor"] == null || preg_match("/^\s+$/", $_POST["txtdireccionproveedor"])) {
        echo "Debes escribir una dirección";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ]|[0-9])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s]|[0-9]|[\,])*$/", $_POST["txtdireccionproveedor"])) {
        echo "La dirección puede contener letras o números separados por coma o espacio";
    } else if (strlen($_POST["txtdireccionproveedor"]) > 100) {
        echo "La dirección no debe superar los 100 caracteres";
    } else {

        $rutproveedor = $_POST["txtrutproveedor"];
        $nombreproveedor = $_POST["txtnombreproveedor"];
        $apellidoproveedor = $_POST["txtapellidoproveedor"];
        $telefonoproveedor = $_POST["txttelefonoproveedor"];
        $direccionproveedor = $_POST["txtdireccionproveedor"];

        $objProv = new Proveedor();
        $objProv->Proveedor($rutproveedor);
        $resul = $objProv->existeRut($rutproveedor);
        $num = mysqli_num_rows($resul);
        if ($num > 0) {
            echo "El rut del proveedor ya existe, debes ingresar otro";
        } else {
            if (isset($_POST["btningresarproveedor"]) && $_POST["btningresarproveedor"] == "Ingresar") {
                $objProv = new Proveedor();
                $objProv->Proveedor($rutproveedor, $nombreproveedor, $apellidoproveedor, $telefonoproveedor, $direccionproveedor, $idusuario, $tipousuario);
                $resul = $objProv->insertarProveedor();
                if ($resul != "") {
                    echo "<script language='javascript'>alert('Datos ingresados correctamente');window.location='../Vista/ingresarproveedor.php'</script>";
                } else {
                    echo "<script language='javascript'>alert('Error al ingresar datos');window.location='../Vista/ingresarproveedor.php'</script>";
                }
            }
        }
    }
}



