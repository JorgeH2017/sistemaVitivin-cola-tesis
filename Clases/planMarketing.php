<?php

require_once("../Modelo/Conexion.php");

class planMarketing {

    private $idplanmarketing;
    private $nombreplanmarketing;
    private $fechaplanmarketing;
    private $idusuario;
    private $idtipousuario;

    public function planMarketing($nombreplanmarketing = "", $idusuario = "", $idtipousuario = "", $idplanmarketing = null, $fechaplanmarketing = null) {
        $this->idplanmarketing = $idplanmarketing;
        $this->nombreplanmarketing = $nombreplanmarketing;
        $this->fechaplanmarketing = $fechaplanmarketing;
        $this->idusuario = $idusuario;
        $this->idtipousuario = $idtipousuario;
    }

    function getIdPlanMarketing() {
        return $this->idplanmarketing;
    }

    function getNombrePlanMarketing() {
        return $this->nombreplanmarketing;
    }

    function getFechaPlanMarketing() {
        return $this->fechaplanmarketing;
    }

    function getIdUsuario() {
        return $this->idusuario;
    }

    function getIdTipoUsuario() {
        return $this->idtipousuario;
    }

    function setNombrePlanMarketing($nombreplanmarketing) {
        $this->nombreplanmarketing = $nombreplanmarketing;
    }

    function setIdUsuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setIdTipoUsuario($idtipousuario) {
        $this->idtipousuario = $idtipousuario;
    }

//Metodos de negocio
    public function insertarPlanMarketing() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "insert into plan_marketing (nombre_planMarketing,id_usuario,id_tipoUsuario)values('" . $this->nombreplanmarketing . "','" . $this->idusuario . "','" . $this->idtipousuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function selectIdPlan() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select id_planMarketing from plan_marketing order by id_planMarketing DESC LIMIT 1";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function modificarPlanMarketing($idplanmarketing) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "update plan_marketing set nombre_planMarketing='" . $this->nombreplanmarketing . "' where(id_planMarketing='" . $idplanmarketing . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function eliminarPlanMarketing($idplanmarketing) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "delete plan_marketing,propiedad_marketing from plan_marketing inner join propiedad_marketing on plan_marketing.id_planMarketing=propiedad_marketing.id_planMarketing where(plan_marketing.id_planMarketing='" . $idplanmarketing . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function listarPlanMarketing() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from plan_marketing ";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

    public function listarDesdeId($idplanmarketing) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from plan_marketing where(id_planMarketing='" . $idplanmarketing . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

     public function listarPlanMarketing2() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "SELECT plan_marketing.id_planMarketing,plan_marketing.nombre_planMarketing,plan_marketing.fecha_planMarketing,propiedad_marketing.nombre_propiedadMarketing,propiedad_marketing.descr_propiedadMarketing from plan_marketing inner join propiedad_marketing on plan_marketing.id_planMarketing=propiedad_marketing.id_planMarketing";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

}




