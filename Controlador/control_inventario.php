<?php

session_start();

$idusuario = $_SESSION["id"];
$tipousuario = $_SESSION["TipUsuario"];

require_once("../Clases/Inventario.php");

if (isset($_POST["btningresarvino"]) && $_POST["btningresarvino"] == "Ingresar") {
    if (empty($_POST["txtnombrevino"]) || $_POST["txtnombrevino"] == "" || $_POST["txtnombrevino"] == null || preg_match("/^\s+$/", $_POST["txtnombrevino"])) {
        echo "Debes escribir un nombre de vino";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/", $_POST["txtnombrevino"])) {
        echo "El nombre del vino debe ser solo letras";
    } else if (strlen($_POST["txtnombrevino"]) > 50) {
        echo "El nombre del vino no debe superar los 50 caracteres";
    } else if (empty($_POST["txtcantidadvino"]) || $_POST["txtcantidadvino"] == "" || $_POST["txtcantidadvino"] == null || preg_match("/^\s+$/", $_POST["txtcantidadvino"])) {
        echo "Debes escribir una cantidad de vino";
    } else if (!preg_match("/^[1-9][0-9]*$/", $_POST["txtcantidadvino"])) {
        echo "La cantidad no es un número válido";
    } else if (strlen($_POST["txtcantidadvino"]) > 12) {
        echo "La cantidad no debe superar los 12 caracteres";
    } else {

        $nombrevino = $_POST["txtnombrevino"];
        $cantidadvino = $_POST["txtcantidadvino"];

        $objVino = new Inventario();
        $objVino->Inventario($nombrevino);
        $resul = $objVino->existeVino($nombrevino);
        $num = mysqli_num_rows($resul);
        if ($num > 0) {
            echo "El nombre del vino ya existe, debes ingresar otro";
        } else {
            if (isset($_POST["btningresarvino"]) && $_POST["btningresarvino"] == "Ingresar") {
                $objVino = new Inventario();
                $objVino->Inventario($nombrevino, $cantidadvino, $idusuario, $tipousuario);
                $resul = $objVino->insertarVino();
                if ($resul != "") {
                    echo "<script language='javascript'>alert('Datos ingresados correctamente');window.location='../Vista/ingresarvinos.php'</script>";
                } else {
                    echo "<script language='javascript'>alert('Error al ingresar datos');window.location='../Vista/ingresarvinos.php'</script>";
                }
            }
        }
    }
}

