<?php

require_once("../Modelo/Conexion.php");


class puestoTrabajo {

    private $idpuesto;
    private $nombrepuesto;

    public function __construct() {
        
    }

    public function puestoTrabajo($nombrepuesto="", $idpuesto = null) {
        $this->idpuesto = $idpuesto;
        $this->nombrepuesto = $nombrepuesto;
    }

    function getidPuesto() {
        return $this->idpuesto;
    }

    function getnombrePuesto() {
        return $this->nombrepuesto;
    }

    function setnombrePuesto($nombrepuesto) {
        $this->nombrepuesto = $nombrepuesto;
    }

    //Metodos de negocio
    public function existePuesto($nombrepuesto) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select nombre_puestoTrabajo from puesto_trabajo where(nombre_puestoTrabajo='" . $nombrepuesto . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function insertarPuesto() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "insert into puesto_trabajo (nombre_puestoTrabajo) values('" . $this->nombrepuesto . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function listarPuesto() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from puesto_trabajo";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }
}
