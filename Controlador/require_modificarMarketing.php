<?php

require_once ("../Clases/propiedadMarketing.php");

$objProMarketing = new propiedadMarketing();
$res1 = $objProMarketing->listarPropiedadMarketing('Situación Actual', $idplanmarketing);
$fila1 = mysqli_fetch_array($res1);
$res2 = $objProMarketing->listarPropiedadMarketing('Objetivos', $idplanmarketing);
$fila2 = mysqli_fetch_array($res2);
$res3 = $objProMarketing->listarPropiedadMarketing('Estrategia a seguir', $idplanmarketing);
$fila3 = mysqli_fetch_array($res3);
$res4 = $objProMarketing->listarPropiedadMarketing('Plan de acción', $idplanmarketing);
$fila4 = mysqli_fetch_array($res4);
$res5 = $objProMarketing->listarPropiedadMarketing('Presupuesto', $idplanmarketing);
$fila5 = mysqli_fetch_array($res5);
$res6 = $objProMarketing->listarPropiedadMarketing('Método de control', $idplanmarketing);
$fila6 = mysqli_fetch_array($res6);
