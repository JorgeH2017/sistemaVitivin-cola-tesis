<?php

session_start();

$idusuario = $_SESSION["id"];
$tipousuario = $_SESSION["TipUsuario"];

require_once("../Clases/Venta.php");

if (isset($_POST["btningresarventa"]) && $_POST["btningresarventa"] == "Ingresar") {
    if (empty($_POST["txtdocumentoventa"]) || $_POST["txtdocumentoventa"] == "" || $_POST["txtdocumentoventa"] == null || preg_match("/^\s+$/", $_POST["txtdocumentoventa"])) {
        echo "Debes escribir un número de documento";
    } else if (!preg_match("/^[0-9]+$/", $_POST["txtdocumentoventa"])) {
        echo "El número de documento no es válido";
    } else if (strlen($_POST["txtdocumentoventa"]) > 11) {
        echo "El número de documento no debe superar los 11 caracteres";
    } else if (empty($_POST["txtfechaventa"]) || $_POST["txtfechaventa"] == "" || $_POST["txtfechaventa"] == null) {
        echo "Debes seleccionar una fecha de venta";
    } else if (empty($_POST["txtcantidadvinoventa"]) || $_POST["txtcantidadvinoventa"] == "" || $_POST["txtcantidadvinoventa"] == null || preg_match("/^\s+$/", $_POST["txtcantidadvinoventa"])) {
        echo "Debes escribir una cantidad";
    } else if (!preg_match("/^[1-9][0-9]*$/", $_POST["txtcantidadvinoventa"])) {
        echo "La cantidad no es un número válido";
    } else if (strlen($_POST["txtcantidadvinoventa"]) > 11) {
        echo "La cantidad no debe superar los 11 caracteres";
    } else if (empty($_POST["txttipodocumento"]) || $_POST["txttipodocumento"] == "" || $_POST["txttipodocumento"] == null || preg_match("/^\s+$/", $_POST["txttipodocumento"])) {
        echo "Debes escribir un tipo de documento";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/", $_POST["txttipodocumento"])) {
        echo "El tipo de documento debe ser solo letras";
    } else if (strlen($_POST["txttipodocumento"]) > 30) {
        echo "El tipo de documento no debe superar los 30 caracteres";
    } else if (empty($_POST["txtmontototal"]) || $_POST["txtmontototal"] == "" || $_POST["txtmontototal"] == null || preg_match("/^\s+$/", $_POST["txtmontototal"])) {
        echo "Debes escribir un monto total";
    } else if (!preg_match("/^[0-9]+\.[0-9]{2}$/", $_POST["txtmontototal"])) {
        echo "El monto total no es un número válido o no tiene el formato adecuado de dos decimales después del punto";
    } else if (strlen($_POST["txtmontototal"]) > 20) {
        echo "El monto total no debe superar los 20 caracteres";
    } else if (empty($_POST["selectnombrevino"]) || $_POST["selectnombrevino"] == "" || $_POST["selectnombrevino"] == null) {
        echo "Debes seleccionar un nombre de vino";
    } else {

        $numeroventa = $_POST["txtdocumentoventa"];
        $fechaventa = $_POST["txtfechaventa"];
        $cantidadvinoventa = $_POST["txtcantidadvinoventa"];
        $tipodocumento = $_POST["txttipodocumento"];
        $montototal = $_POST["txtmontototal"];
        $idvino = $_POST["selectnombrevino"];

        $objVenta = new Venta();
        $objVenta->Venta($numeroventa);
        $resul = $objVenta->existeVenta($numeroventa);
        $num = mysqli_num_rows($resul);
        if ($num > 0) {
            echo "El número de venta ya existe, debes ingresar otro";
        } else if (isset($_POST["btningresarventa"]) && $_POST["btningresarventa"] == "Ingresar") {
            $objVenta = new Venta();
            $objVenta->Venta($idvino);
            $resul2 = $objVenta->buscarCantidad($idvino);
            $fila = mysqli_fetch_array($resul2);
            $row = $fila[0];
            if ($row >= $cantidadvinoventa) {
                $objVenta->disminuirStockVino($idvino, $cantidadvinoventa);
                $objVenta->Venta($numeroventa, $fechaventa, $cantidadvinoventa, $tipodocumento, $montototal, $idusuario, $tipousuario, $idvino);
                $resul3 = $objVenta->insertarVenta();
                echo "<script language='javascript'>alert('Datos ingresados correctamente');window.location='../Vista/ingresarventas.php'</script>";
            } else if ($row < $cantidadvinoventa) {
                echo "La cantidad de vino ingresada es mayor a la cantidad actual, debes ingresar una cantidad menor";
            }
        }
    }
}


