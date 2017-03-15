<?php

require_once("../Modelo/Conexion.php");

class planCalidad {

    private $idplancalidad;
    private $nombreplancalidad;
    private $fechaplancalidad;
    private $idusuario;
    private $idtipousuario;

    public function planCalidad($nombreplancalidad = "", $idusuario = "", $idtipousuario = "", $idplancalidad = null, $fechaplancalidad = null) {
        $this->idplancalidad = $idplancalidad;
        $this->nombreplancalidad = $nombreplancalidad;
        $this->fechaplancalidad = $fechaplancalidad;
        $this->idusuario = $idusuario;
        $this->idtipousuario = $idtipousuario;
    }

    function getidPlanCalidad() {
        return $this->idplancalidad;
    }

    function getNombrePlanCalidad() {
        return $this->nombreplancalidad;
    }

    function getFechaPlanCalidad() {
        return $this->fechaplancalidad;
    }

    function getIdUsuario() {
        return $this->idusuario;
    }

    function getIdTipoUsuario() {
        return $this->idtipousuario;
    }

    function setNombrePlanCalidad($nombreplancalidad) {
        $this->nombreplancalidad = $nombreplancalidad;
    }

    function setIdUsuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setIdTipoUsuario($idtipousuario) {
        $this->idtipousuario = $idtipousuario;
    }

//Metodos de negocio
    public function insertarPlanCalidad() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "insert into calidad_plan (nombre_vino_planCalidad,id_usuario,id_tipoUsuario) values('" . $this->nombreplancalidad . "','" . $this->idusuario . "','" . $this->idtipousuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function selectIdPlan() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select id_planCalidad from calidad_plan order by id_planCalidad DESC LIMIT 1";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function modificarPlanCalidad($idplancalidad) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "update calidad_plan set nombre_vino_planCalidad='" . $this->nombreplancalidad . "' where(id_planCalidad='" . $idplancalidad . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function eliminarPlanCalidad($idplancalidad) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "delete calidad_plan,propiedad_calidad from calidad_plan inner join propiedad_calidad on calidad_plan.id_planCalidad=propiedad_calidad.id_planCalidad where(calidad_plan.id_planCalidad='" . $idplancalidad . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function listarPlanCalidad() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from calidad_plan ";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

    public function listarDesdeId($idplancalidad) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from calidad_plan where(id_planCalidad='" . $idplancalidad . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function listarPlanCalidad2() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "SELECT calidad_plan.id_planCalidad,calidad_plan.nombre_vino_planCalidad,calidad_plan.fecha_planCalidad,propiedad_calidad.nombre_propiedadCalidad,propiedad_calidad.descr_propiedadCalidad from calidad_plan inner join propiedad_calidad on calidad_plan.id_planCalidad=propiedad_calidad.id_planCalidad";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

}
?>

