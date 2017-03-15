<?php

session_start();

$idusuario = $_SESSION["id"];
$tipousuario = $_SESSION["TipUsuario"];

require_once("../Clases/Compra.php");

if (isset($_POST["btningresarproducto"]) && $_POST["btningresarproducto"] == "Ingresar") {
    if (empty($_POST["txtnombreproducto"]) || $_POST["txtnombreproducto"] == "" || $_POST["txtnombreproducto"] == null || preg_match("/^\s+$/", $_POST["txtnombreproducto"])) {
        echo "Debes escribir un nombre de producto";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/", $_POST["txtnombreproducto"])) {
        echo "El nombre del producto debe ser solo letras";
    } else if (strlen($_POST["txtnombreproducto"]) > 50) {
        echo "El nombre del producto no debe superar los 50 caracteres";
    } else if (empty($_POST["txtdescrproducto"]) || $_POST["txtdescrproducto"] == "" || $_POST["txtdescrproducto"] == null || preg_match("/^\s+$/", $_POST["txtdescrproducto"])) {
        echo "Debes escribir una descripción del producto";
         } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ]|[0-9])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s]|[0-9]|[\,])*$/", $_POST["txtdescrproducto"])) {
        echo "La descripción puede contener letras o números separados por coma o espacio";
    } else if (strlen($_POST["txtdescrproducto"]) > 200) {
        echo "la descripción del producto no debe superar los 200 caracteres";
    } else if (empty($_POST["txtcantidadproducto"]) || $_POST["txtcantidadproducto"] == "" || $_POST["txtcantidadproducto"] == null || preg_match("/^\s+$/", $_POST["txtcantidadproducto"])) {
        echo "Debes escribir una cantidad del producto";
    } else if (!preg_match("/^[1-9][0-9]*$/",$_POST["txtcantidadproducto"])) {
        echo "La cantidad no es un número válido";
    } else if (strlen($_POST["txtcantidadproducto"]) > 10) {
        echo "La cantidad no debe superar los 10 caracteres";
    } else if (empty($_POST["selecttipoproducto"]) || $_POST["selecttipoproducto"] == "" || $_POST["selecttipoproducto"] == null) {
        echo "Debes seleccionar un tipo de producto";
    } else {

        $nombreproducto = $_POST["txtnombreproducto"];
        $descrproducto = $_POST["txtdescrproducto"];
        $cantidadproducto = $_POST["txtcantidadproducto"];
        $tipoproducto = $_POST["selecttipoproducto"];

        $objCompra = new Compra();
        $objCompra->Compra($nombreproducto);
        $resul = $objCompra->existeProducto($nombreproducto);
        $num = mysqli_num_rows($resul);
        if ($num > 0) {
            echo "El nombre del producto ya existe, debes ingresar otro";
        } else if (isset($_POST["btningresarproducto"]) && $_POST["btningresarproducto"] == "Ingresar") {
            $objCompra = new Compra();
            $objCompra->Compra($nombreproducto, $descrproducto, $cantidadproducto, $idusuario, $tipousuario, $tipoproducto);
            $resul = $objCompra->insertarProducto();
            if ($resul != "") {
                echo "<script language='javascript'>alert('Datos ingresados correctamente');window.location='../Vista/ingresarcompras.php'</script>";
            } else {
                echo "<script language='javascript'>alert('Error al ingresar datos');window.location='../Vista/ingresarcompras.php'</script>";
            }
        }
    }
}


                        