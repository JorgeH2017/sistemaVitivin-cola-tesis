<?php

session_start();

require_once("../Clases/Compra.php");

$idproducto = $_SESSION["idproducto"];

if (isset($_POST["btnagregarcantidad"]) && $_POST["btnagregarcantidad"] == "Agregar") {
    if (empty($_POST["txtagregarcantidad"]) || $_POST["txtagregarcantidad"] == "" || $_POST["txtagregarcantidad"] == null || preg_match("/^\s+$/", $_POST["txtagregarcantidad"])) {
        echo "Debes escribir una cantidad para aumentar";
    } else if (!preg_match("/^[1-9][0-9]*$/", $_POST["txtagregarcantidad"])) {
        echo "La cantidad no es un número válido";
    } else if (strlen($_POST["txtagregarcantidad"]) > 10) {
        echo "La cantidad no debe superar los 10 caracteres";
    } else {

        $cantidad = $_POST["txtagregarcantidad"];
        $objCompra = new Compra();
        $objCompra->aumentarStockProducto($idproducto, $cantidad);
        echo "<script language='javascript'>alert('El stock ha sido aumentado correctamente');window.location='../Vista/listarproductos.php'</script>";
    }
}


if (isset($_POST["btndisminuircantidad"]) && $_POST["btndisminuircantidad"] == "Disminuir") {
    if (isset($_POST["txtcantidadactualproducto"]) && $_POST["txtcantidadactualproducto"] != "") {
        $cantidadactual = $_POST["txtcantidadactualproducto"];

        if (empty($_POST["txtdisminuircantidad"]) || $_POST["txtdisminuircantidad"] == "" || $_POST["txtdisminuircantidad"] == null || preg_match("/^\s+$/", $_POST["txtdisminuircantidad"])) {
            echo "Debes escribir una cantidad para disminuir";
        } else if (!preg_match("/^[1-9][0-9]*$/", $_POST["txtdisminuircantidad"])) {
            echo "La cantidad no es un número válido";
        } else if (strlen($_POST["txtdisminuircantidad"]) > 10) {
            echo "La cantidad no debe superar los 10 caracteres";
        } else {

            $cantidad2 = $_POST["txtdisminuircantidad"];
            $objCompra = new Compra();
            $resultado = $cantidadactual - $cantidad2;
            if ($resultado < 0) {
                echo "<script language='javascript'>alert('La cantidad actual de producto es menor a la cantidad para disminuir');window.location='../Vista/listarproductos.php'</script>";
            } else {
                $objCompra->disminuirStockProducto($idproducto, $cantidad2);
                echo "<script language='javascript'>alert('La cantidad de producto ha disminuido correctamente');window.location='../Vista/listarproductos.php'</script>";
            }
        }
    }
}


    