<?php

require_once("../Modelo/Conexion.php");

class Trabajador {

    private $ruttrabajador;
    private $nombretrabajador;
    private $apellidotrabajador;
    private $telefonotrabajador;
    private $correotrabajador;
    private $direcciontrabajador;
    private $idusuario;
    private $puestotrabajo;
    private $tipousuario;

    public function __construct() {
        
    }

    public function Trabajador($ruttrabajador = "", $nombretrabajador = "", $apellidotrabajador = "", $telefonotrabajador = "", $correotrabajador = "", $direcciontrabajador = "", $idusuario = "", $puestotrabajo = "", $tipousuario = "") {
        $this->ruttrabajador = $ruttrabajador;
        $this->nombretrabajador = $nombretrabajador;
        $this->apellidotrabajador = $apellidotrabajador;
        $this->telefonotrabajador = $telefonotrabajador;
        $this->correotrabajador = $correotrabajador;
        $this->direcciontrabajador = $direcciontrabajador;
        $this->idusuario = $idusuario;
        $this->puestotrabajo = $puestotrabajo;
        $this->tipousuario = $tipousuario;
    }

//Accesadores
    function getRutTrabajador() {
        return $this->ruttrabajador;
    }

    function getNombreTrabajador() {
        return $this->nombretrabajador;
    }

    function getApellidoTrabajador() {
        return $this->apellidotrabajador;
    }

    function getTelefonoTrabajador() {
        return $this->telefonotrabajador;
    }

    function getCorreoTrabajador() {
        return $this->correotrabajador;
    }

    function getDireccionTrabajador() {
        return $this->direcciontrabajador;
    }

    function getIdUsuario() {
        return $this->idusuario;
    }

    function getPuestoTrabajo() {
        return $this->puestotrabajo;
    }

    function getTipoUsuario() {
        return $this->tipousuario;
    }

//Mutadores
    function setRutTrabajador($ruttrabajador) {
        $this->ruttrabajador = $ruttrabajador;
    }

    function setNombreTrabajador($nombretrabajador) {
        $this->nombretrabajador = $nombretrabajador;
    }

    function setApellidoTrabajador($apellidotrabajador) {
        $this->apellidotrabajador = $apellidotrabajador;
    }

    function setTelefonoTrabajador($telefonotrabajador) {
        $this->telefonotrabajador = $telefonotrabajador;
    }

    function setCorreoTrabajador($correotrabajador) {
        $this->correotrabajador = $correotrabajador;
    }

    function setDireccionTrabajador($direcciontrabajador) {
        $this->direcciontrabajador = $direcciontrabajador;
    }

    function setIdUsuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setPuestoTrabajo($puestotrabajo) {
        $this->puestotrabajo = $puestotrabajo;
    }

    function setTipoUsuario($tipousuario) {
        $this->tipousuario = $tipousuario;
    }

//Metodos de negocio
    public function existeRut($ruttrabajador) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select rut_trabajador from trabajador where(rut_trabajador='" . $ruttrabajador . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function insertarTrabajador() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "insert into trabajador values('" . $this->ruttrabajador . "','" . $this->nombretrabajador . "','" . $this->apellidotrabajador . "','" . $this->telefonotrabajador . "','" . $this->correotrabajador . "','" . $this->direcciontrabajador . "','" . $this->idusuario . "','" . $this->puestotrabajo . "','" . $this->tipousuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function modificarTrabajador() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "update trabajador set nombre_trabajador='" . $this->nombretrabajador . "',apellidos_trabajador='" . $this->apellidotrabajador . "',telefono_trabajador='" . $this->telefonotrabajador . "',correo_trabajador='" . $this->correotrabajador . "',direccion_trabajador='" . $this->direcciontrabajador . "',id_puestoTrabajo='" . $this->puestotrabajo . "' where(rut_trabajador='" . $this->ruttrabajador . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function eliminarTrabajador($ruttrabajador) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "delete from trabajador where (rut_trabajador='" . $ruttrabajador . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function listarTrabajador() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select trabajador.rut_trabajador,trabajador.nombre_trabajador,trabajador.apellidos_trabajador,trabajador.telefono_trabajador,puesto_trabajo.nombre_puestoTrabajo from trabajador inner join puesto_trabajo on trabajador.id_puestoTrabajo=puesto_trabajo.id_puestoTrabajo";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

    public function listarPuestoTrabajo() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select id_puestoTrabajo,nombre_puestoTrabajo from puesto_trabajo";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

    public function listarDesdeRut($ruttrabajador) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from trabajador where(rut_trabajador='" . $ruttrabajador . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function listarTrabajador2() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select trabajador.rut_trabajador,trabajador.nombre_trabajador,trabajador.apellidos_trabajador,trabajador.telefono_trabajador,trabajador.correo_trabajador,trabajador.direccion_trabajador,puesto_trabajo.nombre_puestoTrabajo from trabajador inner join puesto_trabajo on trabajador.id_puestoTrabajo=puesto_trabajo.id_puestoTrabajo";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

}
