<?php

session_start();

require_once ("../Clases/Inventario.php");

$idvino = $_SESSION["idvino"];

if (isset($_POST["btnagregarcantidad"]) && $_POST["btnagregarcantidad"] == "Agregar") {
    if (empty($_POST["txtagregarvino"]) || $_POST["txtagregarvino"] == "" || $_POST["txtagregarvino"] == null || preg_match("/^\s+$/", $_POST["txtagregarvino"])) {
        echo "Debes escribir una cantidad para aumentar";
    } else if (!preg_match("/^[1-9][0-9]*$/", $_POST["txtagregarvino"])) {
        echo "La cantidad no es un número válido";
    } else if (strlen($_POST["txtagregarvino"]) > 12) {
        echo "La cantidad no debe superar los 12 caracteres";
    } else {

        $cantidad = $_POST["txtagregarvino"];
        $objVino = new Inventario;
        $objVino->aumentarStockVino($idvino, $cantidad);
        echo "<script language='javascript'>alert('El stock ha sido aumentado correctamente');window.location='../Vista/listarstockvino.php'</script>";
    }
}

if (isset($_POST["btndisminuircantidad"]) && $_POST["btndisminuircantidad"] == "Disminuir") {
    if (isset($_POST["txtcantidadactualvino"]) && $_POST["txtcantidadactualvino"] != "") {
        $cantidadactual = $_POST["txtcantidadactualvino"];

        if (empty($_POST["txtdisminuirvino"]) || $_POST["txtdisminuirvino"] == "" || $_POST["txtdisminuirvino"] == null || preg_match("/^\s+$/", $_POST["txtdisminuirvino"])) {
            echo "Debes escribir una cantidad para disminuir";
        } else if (!preg_match("/^[1-9][0-9]*$/", $_POST["txtdisminuirvino"])) {
            echo "La cantidad no es un número válido";
        } else if (strlen($_POST["txtdisminuirvino"]) > 12) {
            echo "La cantidad no debe superar los 12 caracteres";
        } else {

            $cantidad2 = $_POST["txtdisminuirvino"];
            $objVino = new Inventario();
            $resultado = $cantidadactual - $cantidad2;
            if ($resultado < 0) {
                echo "<script language='javascript'>alert('La cantidad actual de vino es menor a la cantidad para disminuir');window.location='../Vista/listarstockvino.php'</script>";
            } else {
                $objVino->disminuirStockVino($idvino, $cantidad2);
                echo "<script language='javascript'>alert('La cantidad de vino ha disminuido correctamente');window.location='../Vista/listarstockvino.php'</script>";
            }
        }
    }
}

