<?php

require_once("../Clases/tipoProducto.php");

if (isset($_POST["btningresartipoproducto"]) && $_POST["btningresartipoproducto"] == "Ingresar") {
    if (empty($_POST["txttipoproducto"]) || $_POST["txttipoproducto"] == "" || $_POST["txttipoproducto"] == null || preg_match("/^\s+$/", $_POST["txttipoproducto"])) {
        echo "Debes escribir un tipo de producto";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/", $_POST["txttipoproducto"])) {
        echo "El tipo de producto debe ser solo letras";
    } else if (strlen($_POST["txttipoproducto"]) > 30) {
        echo "El tipo de producto no debe superar los 30 caracteres";
    } else {

        $nombretipoproducto = $_POST["txttipoproducto"];
        $objPro = new tipoProducto();
        $objPro->tipoProducto($nombretipoproducto);
        $resul = $objPro->existeTipoProd($nombretipoproducto);
        $num = mysqli_num_rows($resul);
        if ($num > 0) {
            echo "El tipo de producto ya existe, debes ingresar otro";
        } else if (isset($_POST["btningresartipoproducto"]) && $_POST["btningresartipoproducto"] == "Ingresar") {
            $objPro = new tipoProducto();
            $objPro->tipoProducto($nombretipoproducto);
            $resul = $objPro->insertarTipoProd();
            if ($resul != "") {
                echo "<script language='javascript'>alert('Datos ingresados correctamente');window.location='../Vista/ingresartipoproducto.php'</script>";
            } else {
                echo "<script language='javascript'>alert('Error al ingresar datos');window.location='../Vista/ingresartipoproducto.php'</script>";
            }
        }
    }
}
