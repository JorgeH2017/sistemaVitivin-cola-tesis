<?php

session_start();

if ($_SESSION["TipUsuario"] == 1) {
    header("location:../Vista/panelAdmin.php");
} else if ($_SESSION["TipUsuario"] == 2) {
    header("location:../Vista/paneladministrativo.php");
} else if ($_SESSION["TipUsuario"] == 3) {
    header("location:../Vista/panelcalidad.php");
} else if ($_SESSION["TipUsuario"] == 4) {
    header("location:../Vista/panelcomercial.php");
} else if ($_SESSION["TipUsuario"] == 5) {
    header("location:../Vista/panelcompras.php");
} else if ($_SESSION["TipUsuario"] == 6) {
    header("location:../Vista/panelinventario.php");
}
?>
