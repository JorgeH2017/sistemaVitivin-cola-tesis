<?php

session_start();

$idusuario = $_SESSION["id"];
$tipousuario = $_SESSION["TipUsuario"];

require_once("../Clases/planCalidad.php");
require_once ("../Clases/propiedadCalidad.php");

if (isset($_POST["btncrearcalidad"]) && $_POST["btncrearcalidad"] == "Crear") {
    if (empty($_POST["txtvinocalidad"]) || $_POST["txtvinocalidad"] == "" || $_POST["txtvinocalidad"] == null || preg_match("/^\s+$/", $_POST["txtvinocalidad"])) {
        echo "Debes escribir un nombre del vino";
    } else if (strlen($_POST["txtvinocalidad"]) > 30) {
        echo "El nombre del vino no debe superar los 30 caracteres";
    } else if (empty($_POST["txtestabilidad"]) || $_POST["txtestabilidad"] == "" || $_POST["txtestabilidad"] == null || preg_match("/^\s+$/", $_POST["txtestabilidad"])) {
        echo "Debes escribir la estabilización por frío";
    } else if (strlen($_POST["txtestabilidad"]) > 200) {
        echo "La estabilización por frío no debe superar los 200 caracteres";
    } else if (empty($_POST["txtestabilidadcalor"]) || $_POST["txtestabilidadcalor"] == "" || $_POST["txtestabilidadcalor"] == null || preg_match("/^\s+$/", $_POST["txtestabilidadcalor"])) {
        echo "Debes escribir la estabilidad frente al calor";
    } else if (strlen($_POST["txtestabilidadcalor"]) > 200) {
        echo "La estabilidad frente al calor no debe superar los 200 caracteres";
    } else if (empty($_POST["txtnivelmetal"]) || $_POST["txtnivelmetal"] == "" || $_POST["txtnivelmetal"] == null || preg_match("/^\s+$/", $_POST["txtnivelmetal"])) {
        echo "Debes escribir el nivel de metales";
    } else if (strlen($_POST["txtnivelmetal"]) > 200) {
        echo "El nivel de metales no debe superar los 200 caracteres";
    } else if (empty($_POST["txtoxidacion"]) || $_POST["txtoxidacion"] == "" || $_POST["txtoxidacion"] == null || preg_match("/^\s+$/", $_POST["txtoxidacion"])) {
        echo "Debes escribir la tendencia a la oxidación";
    } else if (strlen($_POST["txtoxidacion"]) > 200) {
        echo "La tendencia a la oxidación no debe superar los 200 caracteres";
    } else if (empty($_POST["txtestabilidadmicro"]) || $_POST["txtestabilidadmicro"] == "" || $_POST["txtestabilidadmicro"] == null || preg_match("/^\s+$/", $_POST["txtestabilidadmicro"])) {
        echo "Debes escribir la estabilidad microbiológica";
    } else if (strlen($_POST["txtestabilidadmicro"]) > 200) {
        echo "La estabilidad microbiológica no debe superar los 200 caracteres";
    } else if (empty($_POST["txtsolubles"]) || $_POST["txtsolubles"] == "" || $_POST["txtsolubles"] == null || preg_match("/^\s+$/", $_POST["txtsolubles"])) {
        echo "Debes escribir los sólidos solubles totales";
    } else if (strlen($_POST["txtsolubles"]) > 200) {
        echo "Los sólidos solubles totales no debe superar los 200 caracteres";
    } else if (empty($_POST["txthidro"]) || $_POST["txthidro"] == "" || $_POST["txthidro"] == null || preg_match("/^\s+$/", $_POST["txthidro"])) {
        echo "Debes escribir la medida hidrométrica";
    } else if (strlen($_POST["txthidro"]) > 200) {
        echo "La medida hidrométrica no debe superar los 200 caracteres";
    } else if (empty($_POST["txtph"]) || $_POST["txtph"] == "" || $_POST["txtph"] == null || preg_match("/^\s+$/", $_POST["txtph"])) {
        echo "Debes escribir el nivel de ph";
    } else if (strlen($_POST["txtph"]) > 200) {
        echo "El nivel de ph no debe superar los 200 caracteres";
    } else if (empty($_POST["txtalcohol"]) || $_POST["txtalcohol"] == "" || $_POST["txtalcohol"] == null || preg_match("/^\s+$/", $_POST["txtalcohol"])) {
        echo "Debes escribir el nivel de alcohol";
    } else if (strlen($_POST["txtalcohol"]) > 200) {
        echo "El nivel de alcohol no debe superar los 200 caracteres";
    } else if (empty($_POST["txtacidez"]) || $_POST["txtacidez"] == "" || $_POST["txtacidez"] == null || preg_match("/^\s+$/", $_POST["txtacidez"])) {
        echo "Debes escribir el nivel de acidez";
    } else if (strlen($_POST["txtacidez"]) > 200) {
        echo "El nivel de acidez no debe superar los 200 caracteres";
    } else if (empty($_POST["txtacideztitu"]) || $_POST["txtacideztitu"] == "" || $_POST["txtacideztitu"] == null || preg_match("/^\s+$/", $_POST["txtacideztitu"])) {
        echo "Debes escribir el nivel de acidez titulable";
    } else if (strlen($_POST["txtacideztitu"]) > 200) {
        echo "El nivel de acidez titulable no debe superar los 200 caracteres";
    } else if (empty($_POST["txtacidezvol"]) || $_POST["txtacidezvol"] == "" || $_POST["txtacidezvol"] == null || preg_match("/^\s+$/", $_POST["txtacidezvol"])) {
        echo "Debes escribir el nivel de acidez volátil";
    } else if (strlen($_POST["txtacidezvol"]) > 200) {
        echo "El nivel de acidez volátil no debe superar los 200 caracteres";
    } else if (empty($_POST["txthierro"]) || $_POST["txthierro"] == "" || $_POST["txthierro"] == null || preg_match("/^\s+$/", $_POST["txthierro"])) {
        echo "Debes escribir el nivel de hierro";
    } else if (strlen($_POST["txthierro"]) > 200) {
        echo "El nivel de hierro no debe superar los 200 caracteres";
    } else if (empty($_POST["txtmagnesio"]) || $_POST["txtmagnesio"] == "" || $_POST["txtmagnesio"] == null || preg_match("/^\s+$/", $_POST["txtmagnesio"])) {
        echo "Debes escribir el nivel de magnesio";
    } else if (strlen($_POST["txtmagnesio"]) > 200) {
        echo "<El nivel de magnesio no debe superar los 200 caracteres";
    } else if (empty($_POST["txtcalcio"]) || $_POST["txtcalcio"] == "" || $_POST["txtcalcio"] == null || preg_match("/^\s+$/", $_POST["txtcalcio"])) {
        echo "Debes escribir el nivel de calcio";
    } else if (strlen($_POST["txtcalcio"]) > 200) {
        echo "El nivel de calcio no debe superar los 200 caracteres";
    } else if (empty($_POST["txtpotasio"]) || $_POST["txtpotasio"] == "" || $_POST["txtpotasio"] == null || preg_match("/^\s+$/", $_POST["txtpotasio"])) {
        echo "Debes escribir el nivel de potasio";
    } else if (strlen($_POST["txtpotasio"]) > 200) {
        echo "El nivel de potasio no debe superar los 200 caracteres";
    } else if (empty($_POST["txtsodio"]) || $_POST["txtsodio"] == "" || $_POST["txtsodio"] == null || preg_match("/^\s+$/", $_POST["txtsodio"])) {
        echo "Debes escribir el nivel de sodio";
    } else if (strlen($_POST["txtsodio"]) > 200) {
        echo "El nivel de sodio no debe superar los 200 caracteres";
    } else if (empty($_POST["txtcolor"]) || $_POST["txtcolor"] == "" || $_POST["txtcolor"] == null || preg_match("/^\s+$/", $_POST["txtcolor"])) {
        echo "Debes escribir el color";
    } else if (strlen($_POST["txtcolor"]) > 200) {
        echo "El color no debe superar los 200 caracteres";
    } else {

        $nombreplancalidad = $_POST["txtvinocalidad"];
        $estabilidad = $_POST["txtestabilidad"];
        $estabilidadcalor = $_POST["txtestabilidadcalor"];
        $nivelmetal = $_POST["txtnivelmetal"];
        $oxidacion = $_POST["txtoxidacion"];
        $estabilidadmicro = $_POST["txtestabilidadmicro"];
        $solubles = $_POST["txtsolubles"];
        $hidro = $_POST["txthidro"];
        $ph = $_POST["txtph"];
        $alcohol = $_POST["txtalcohol"];
        $acidez = $_POST["txtacidez"];
        $acideztitu = $_POST["txtacideztitu"];
        $acidezvol = $_POST["txtacidezvol"];
        $hierro = $_POST["txthierro"];
        $magnesio = $_POST["txtmagnesio"];
        $calcio = $_POST["txtcalcio"];
        $potasio = $_POST["txtpotasio"];
        $sodio = $_POST["txtsodio"];
        $color = $_POST["txtcolor"];

        $objCalidad = new planCalidad();
        $objCalidad->planCalidad($nombreplancalidad, $idusuario, $tipousuario);
        $objCalidad->insertarPlanCalidad();
        $resul = $objCalidad->selectIdPlan();
        $fila = mysqli_fetch_array($resul);
        $idcalidad = $fila["id_planCalidad"];

        $objProCalidad = new propiedadCalidad();
        $objProCalidad->propiedadCal('Estabilización por frío', $estabilidad, $idcalidad);
        $objProCalidad->insertarPropiedadCalidad();
        $objProCalidad->propiedadCal('Estabilidad frente al calor', $estabilidadcalor, $idcalidad);
        $objProCalidad->insertarPropiedadCalidad();
        $objProCalidad->propiedadCal('Nivel de metales', $nivelmetal, $idcalidad);
        $objProCalidad->insertarPropiedadCalidad();
        $objProCalidad->propiedadCal('Tendencia a la oxidación', $oxidacion, $idcalidad);
        $objProCalidad->insertarPropiedadCalidad();
        $objProCalidad->propiedadCal('Estabilidad microbiológica', $estabilidadmicro, $idcalidad);
        $objProCalidad->insertarPropiedadCalidad();
        $objProCalidad->propiedadCal('Sólidos solubles totales', $solubles, $idcalidad);
        $objProCalidad->insertarPropiedadCalidad();
        $objProCalidad->propiedadCal('Medida hidrométrica', $hidro, $idcalidad);
        $objProCalidad->insertarPropiedadCalidad();
        $objProCalidad->propiedadCal('Nivel de ph', $ph, $idcalidad);
        $objProCalidad->insertarPropiedadCalidad();
        $objProCalidad->propiedadCal('Nivel de alcohol', $alcohol, $idcalidad);
        $objProCalidad->insertarPropiedadCalidad();
        $objProCalidad->propiedadCal('Nivel de acidez', $acidez, $idcalidad);
        $objProCalidad->insertarPropiedadCalidad();
        $objProCalidad->propiedadCal('Nivel de acidez titulable', $acideztitu, $idcalidad);
        $objProCalidad->insertarPropiedadCalidad();
        $objProCalidad->propiedadCal('Nivel de acidez volátil', $acidezvol, $idcalidad);
        $objProCalidad->insertarPropiedadCalidad();
        $objProCalidad->propiedadCal('Nivel de hierro', $hierro, $idcalidad);
        $objProCalidad->insertarPropiedadCalidad();
        $objProCalidad->propiedadCal('Nivel de magnesio', $magnesio, $idcalidad);
        $objProCalidad->insertarPropiedadCalidad();
        $objProCalidad->propiedadCal('Nivel de calcio', $calcio, $idcalidad);
        $objProCalidad->insertarPropiedadCalidad();
        $objProCalidad->propiedadCal('Nivel de potasio', $potasio, $idcalidad);
        $objProCalidad->insertarPropiedadCalidad();
        $objProCalidad->propiedadCal('Nivel de sodio', $sodio, $idcalidad);
        $objProCalidad->insertarPropiedadCalidad();
        $objProCalidad->propiedadCal('Color', $color, $idcalidad);
        $objProCalidad->insertarPropiedadCalidad();

        echo "<script language='javascript'>alert('Datos ingresados correctamente');window.location='../Vista/crearplandecalidad.php'</script>";
    }
}
