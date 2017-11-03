<?php

require_once("../Modelo/Conexion.php");

class Cliente {

    private $rutcliente;
    private $nombrecliente;
    private $apellidocliente;
    private $telefonocliente;
    private $correocliente;
    private $direccioncliente;
    private $idusuario;
    private $tipousuario;

    public function __construct() {
        
    }

    public function Cliente($rutcliente = "", $nombrecliente = "", $apellidocliente = "", $telefonocliente = "", $correocliente = "", $direccioncliente = "", $idusuario = "", $tipousuario = "") {
        $this->rutcliente = $rutcliente;
        $this->nombrecliente = $nombrecliente;
        $this->apellidocliente = $apellidocliente;
        $this->telefonocliente = $telefonocliente;
        $this->correocliente = $correocliente;
        $this->direccioncliente = $direccioncliente;
        $this->idusuario = $idusuario;
        $this->tipousuario = $tipousuario;
    }

//Accesadores
    function getRutCliente() {
        return $this->rutcliente;
    }

    function getNombreCliente() {
        return $this->nombrecliente;
    }

    function getApellidoCliente() {
        return $this->apellidocliente;
    }

    function getTelefonoCliente() {
        return $this->telefonocliente;
    }

    function getCorreoCliente() {
        return $this->correocliente;
    }

    function getDireccionCliente() {
        return $this->direccioncliente;
    }

    function getIdUsuario() {
        return $this->idusuario;
    }

    function getTipoUsuario() {
        return $this->tipousuario;
    }

//Mutadores
    function setRutCliente($rutcliente) {
        $this->rutcliente = $rutcliente;
    }

    function setNombreCliente($nombrecliente) {
        $this->nombrecliente = $nombrecliente;
    }

    function setApellidoCliente($apellidocliente) {
        $this->apellidocliente = $apellidocliente;
    }

    function setTelefonoCliente($telefonocliente) {
        $this->telefonocliente = $telefonocliente;
    }

    function setCorreoCliente($correocliente) {
        $this->correocliente = $correocliente;
    }

    function setDireccionCliente($direccioncliente) {
        $this->direccioncliente = $direccioncliente;
    }

    function setIdUsuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setTipoUsuario($tipousuario) {
        $this->tipousuario = $tipousuario;
    }

    //Metodos de negocio
    public function existeRut($rutcliente) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select rut_cliente from cliente where(rut_cliente='" . $rutcliente . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function insertarCliente() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "insert into cliente values('" . $this->rutcliente . "','" . $this->nombrecliente . "','" . $this->apellidocliente . "','" . $this->telefonocliente . "','" . $this->correocliente . "','" . $this->direccioncliente . "','" . $this->idusuario . "','" . $this->tipousuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function modificarCliente() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "update cliente set nombre_cliente='" . $this->nombrecliente . "',apellidos_cliente='" . $this->apellidocliente . "',telefono_cliente='" . $this->telefonocliente . "',correo_cliente='" . $this->correocliente . "',direccion_cliente='" . $this->direccioncliente . "' where(rut_cliente='" . $this->rutcliente . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function eliminarCliente($rutcliente) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "delete from cliente where (rut_cliente='" . $rutcliente . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function listarCliente() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from cliente";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

    public function listarDesdeRut($rutcliente) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from cliente where(rut_cliente='" . $rutcliente . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }
 
}
