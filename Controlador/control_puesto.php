<?php

require_once("../Clases/puestoTrabajo.php");

if (isset($_POST["btningresarpuesto"]) && $_POST["btningresarpuesto"] == "Ingresar") {
    if (empty($_POST["txtnombrepuesto"]) || $_POST["txtnombrepuesto"] == "" || $_POST["txtnombrepuesto"] == null || preg_match("/^\s+$/", $_POST["txtnombrepuesto"])) {
        echo "Debes escribir un nombre de puesto";
    } else if (!preg_match("/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/", $_POST["txtnombrepuesto"])) {
        echo "El nombre del puesto debe ser solo letras";
    } else if (strlen($_POST["txtnombrepuesto"]) > 30) {
        echo "El nombre del puesto no debe superar los 30 caracteres";
    } else {

        $nombrepuesto = $_POST["txtnombrepuesto"];

        $objPuesto = new puestoTrabajo();
        $objPuesto->puestoTrabajo($nombrepuesto);
        $resul = $objPuesto->existePuesto($nombrepuesto);
        $num = mysqli_num_rows($resul);
        if ($num > 0) {
            echo "El puesto de trabajo ya existe, debes ingresar otro";
        } else if (isset($_POST["btningresarpuesto"]) && $_POST["btningresarpuesto"] == "Ingresar") {
            $objPuesto = new puestoTrabajo();
            $objPuesto->puestoTrabajo($nombrepuesto);
            $resul = $objPuesto->insertarPuesto();
            if ($resul != "") {
                echo "<script language='javascript'>alert('Datos ingresados correctamente');window.location='../Vista/ingresarpuestotrabajador.php'</script>";
            } else {
                echo "<script language='javascript'>alert('Error al ingresar datos');window.location='../Vista/ingresarpuestoTrabajador.php'</script>";
            }
        }
    }
}
    