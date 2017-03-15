<?php

session_start();

$idusuario = $_SESSION["id"];
$tipousuario = $_SESSION["TipUsuario"];

require_once("../Clases/planMarketing.php");
require_once ("../Clases/propiedadMarketing.php");

if (isset($_POST["btnmodificarplanmarketing"]) && $_POST["btnmodificarplanmarketing"] == "Modificar") {
    if (empty($_POST["txtnombreplanmarketing"]) || $_POST["txtnombreplanmarketing"] == "" || $_POST["txtnombreplanmarketing"] == null || preg_match("/^\s+$/", $_POST["txtnombreplanmarketing"])) {
        echo "Debes escribir un nombre del plan";
    } else if (strlen($_POST["txtnombreplanmarketing"]) > 50) {
        echo "El nombre del plan no debe superar los 50 caracteres";
    } else if (empty($_POST["txtsituacionactual"]) || $_POST["txtsituacionactual"] == "" || $_POST["txtsituacionactual"] == null || preg_match("/^\s+$/", $_POST["txtsituacionactual"])) {
        echo "Debes escribir la situación actual";
    } else if (strlen($_POST["txtsituacionactual"]) > 500) {
        echo "La situación actual no debe superar los 500 caracteres";
    } else if (empty($_POST["txtobjetivos"]) || $_POST["txtobjetivos"] == "" || $_POST["txtobjetivos"] == null || preg_match("/^\s+$/", $_POST["txtobjetivos"])) {
        echo "Debes escribir los objetivos";
    } else if (strlen($_POST["txtobjetivos"]) > 500) {
        echo "Los objetivos no deben superar los 500 caracteres";
    } else if (empty($_POST["txtestrategia"]) || $_POST["txtestrategia"] == "" || $_POST["txtestrategia"] == null || preg_match("/^\s+$/", $_POST["txtestrategia"])) {
        echo "Debes escribir la estrategia";
    } else if (strlen($_POST["txtestrategia"]) > 500) {
        echo "La estrategia no debe superar los 500 caracteres";
    } else if (empty($_POST["txtplanaccion"]) || $_POST["txtplanaccion"] == "" || $_POST["txtplanaccion"] == null || preg_match("/^\s+$/", $_POST["txtplanaccion"])) {
        echo "Debes escribir el plan de acción";
    } else if (strlen($_POST["txtplanaccion"]) > 500) {
        echo "El plan de acción no debe superar los 500 caracteres";
    } else if (empty($_POST["txtpresupuesto"]) || $_POST["txtpresupuesto"] == "" || $_POST["txtpresupuesto"] == null || preg_match("/^\s+$/", $_POST["txtpresupuesto"])) {
        echo "Debes escribir el presupuesto";
    } else if (strlen($_POST["txtpresupuesto"]) > 500) {
        echo "El presupuesto no debe superar los 500 caracteres";
    } else if (empty($_POST["txtmetodocontrol"]) || $_POST["txtmetodocontrol"] == "" || $_POST["txtmetodocontrol"] == null || preg_match("/^\s+$/", $_POST["txtmetodocontrol"])) {
        echo "Debes escribir el método de control";
    } else if (strlen($_POST["txtmetodocontrol"]) > 500) {
        echo "El método de control no debe superar los 500 caracteres";
    } else {

        $nombreplanmarketing = $_POST["txtnombreplanmarketing"];
        $situacionactual = $_POST["txtsituacionactual"];
        $objetivo = $_POST["txtobjetivos"];
        $estrategia = $_POST["txtestrategia"];
        $planaccion = $_POST["txtplanaccion"];
        $presupuesto = $_POST["txtpresupuesto"];
        $metodocontrol = $_POST["txtmetodocontrol"];

        $idplanmarketing = $_SESSION["idplanmarketing"];
        $objMarketing = new planMarketing();
        $objMarketing->planMarketing($nombreplanmarketing, $idusuario, $tipousuario);
        $objMarketing->modificarPlanMarketing($idplanmarketing);

        $objProMarketing = new propiedadMarketing();
        $objProMarketing->propiedadMark('Situación Actual', $situacionactual, $idplanmarketing);
        $objProMarketing->modificarPropiedadMarketing('Situación Actual', $idplanmarketing);
        $objProMarketing->propiedadMark('Objetivos', $objetivo, $idplanmarketing);
        $objProMarketing->modificarPropiedadMarketing('Objetivos', $idplanmarketing);
        $objProMarketing->propiedadMark('Estrategia a seguir', $estrategia, $idplanmarketing);
        $objProMarketing->modificarPropiedadMarketing('Estrategia a seguir', $idplanmarketing);
        $objProMarketing->propiedadMark('Plan de acción', $planaccion, $idplanmarketing);
        $objProMarketing->modificarPropiedadMarketing('Plan de acción', $idplanmarketing);
        $objProMarketing->propiedadMark('Presupuesto', $presupuesto, $idplanmarketing);
        $objProMarketing->modificarPropiedadMarketing('Presupuesto', $idplanmarketing);
        $objProMarketing->propiedadMark('Método de control', $metodocontrol, $idplanmarketing);
        $objProMarketing->modificarPropiedadMarketing('Método de control', $idplanmarketing);

        echo "<script language='javascript'>alert('Datos modificados correctamente');window.location='../Vista/listarplanmarketing.php'</script>";
    }
}
    