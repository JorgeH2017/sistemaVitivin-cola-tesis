<?php

require_once("../Modelo/Conexion.php");

class Socio {

    private $rutsocio;
    private $nombresocio;
    private $apellidosocio;
    private $telefonosocio;
    private $correosocio;
    private $direccionsocio;
    private $idusuario;
    private $tipousuario;

    public function __construct() {
        
    }

    public function Socio($rutsocio = "", $nombresocio = "", $apellidosocio = "", $telefonosocio = "", $correosocio = "", $direccionsocio = "", $idusuario = "", $tipousuario = "") {
        $this->rutsocio = $rutsocio;
        $this->nombresocio = $nombresocio;
        $this->apellidosocio = $apellidosocio;
        $this->telefonosocio = $telefonosocio;
        $this->correosocio = $correosocio;
        $this->direccionsocio = $direccionsocio;
        $this->idusuario = $idusuario;
        $this->tipousuario = $tipousuario;
    }

    function getRutsocio() {
        return $this->rutsocio;
    }

    function getNombresocio() {
        return $this->nombresocio;
    }

    function getApellidosocio() {
        return $this->apellidosocio;
    }

    function getTelefonosocio() {
        return $this->telefonosocio;
    }

    function getCorreosocio() {
        return $this->correosocio;
    }

    function getDireccionsocio() {
        return $this->direccionsocio;
    }

    function getIdusuario() {
        return $this->idusuario;
    }

    function getTipousuario() {
        return $this->tipousuario;
    }

    function setRutsocio($rutsocio) {
        $this->rutsocio = $rutsocio;
    }

    function setNombresocio($nombresocio) {
        $this->nombresocio = $nombresocio;
    }

    function setApellidosocio($apellidosocio) {
        $this->apellidosocio = $apellidosocio;
    }

    function setTelefonosocio($telefonosocio) {
        $this->telefonosocio = $telefonosocio;
    }

    function setCorreosocio($correosocio) {
        $this->correosocio = $correosocio;
    }

    function setDireccionsocio($direccionsocio) {
        $this->direccionsocio = $direccionsocio;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setTipousuario($tipousuario) {
        $this->tipousuario = $tipousuario;
    }

    //Metodos de negocio
    public function existeRut($rutsocio) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select rut_socio from socio where(rut_socio='" . $rutsocio . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function insertarSocio() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "insert into socio values('" . $this->rutsocio . "','" . $this->nombresocio . "','" . $this->apellidosocio . "','" . $this->telefonosocio . "','" . $this->correosocio . "','" . $this->direccionsocio . "','" . $this->idusuario . "','" . $this->tipousuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function modificarSocio() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "update socio set nombre_socio='" . $this->nombresocio . "',apellidos_socio='" . $this->apellidosocio . "',telefono_socio='" . $this->telefonosocio . "',correo_socio='" . $this->correosocio . "',direccion_socio='" . $this->direccionsocio . "'where(rut_socio='" . $this->rutsocio . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function eliminarSocio($rutsocio) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "delete from socio where (rut_socio='" . $rutsocio . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function listarSocio() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from socio";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

    public function listarDesdeRut($rutsocio) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from socio where(rut_socio='" . $rutsocio . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }
    
}

?>
