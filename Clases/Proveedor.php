<?php

require_once("../Modelo/Conexion.php");

class Proveedor {

    private $rutproveedor;
    private $nombreproveedor;
    private $apellidoproveedor;
    private $telefonoproveedor;
    private $direccionproveedor;
    private $idusuario;
    private $tipousuario;

    public function __construct() {
        
    }

    public function Proveedor($rutproveedor = "", $nombreproveedor = "", $apellidoproveedor = "", $telefonoproveedor = "", $direccionproveedor = "", $idusuario = "", $tipousuario = "") {
        $this->rutproveedor = $rutproveedor;
        $this->nombreproveedor = $nombreproveedor;
        $this->apellidoproveedor = $apellidoproveedor;
        $this->telefonoproveedor = $telefonoproveedor;
        $this->direccionproveedor = $direccionproveedor;
        $this->idusuario = $idusuario;
        $this->tipousuario = $tipousuario;
    }

    function getRutProveedor() {
        return $this->rutproveedor;
    }

    function getNombreProveedor() {
        return $this->nombreproveedor;
    }

    function getApellidoProveedor() {
        return $this->apellidoproveedor;
    }

    function getTelefonoProveedor() {
        return $this->telefonoproveedor;
    }

    function getDireccionProveedor() {
        return $this->direccionproveedor;
    }

    function getIdUsuario() {
        return $this->idusuario;
    }

    function getTipoUsuario() {
        return $this->tipousuario;
    }

    function setRutProveedor($rutproveedor) {
        $this->rutproveedor = $rutproveedor;
    }

    function setNombreProveedor($nombreproveedor) {
        $this->nombreproveedor = $nombreproveedor;
    }

    function setApellidoProveedor($apellidoproveedor) {
        $this->apellidoproveedor = $apellidoproveedor;
    }

    function setTelefonoProveedor($telefonoproveedor) {
        $this->telefonoproveedor = $telefonoproveedor;
    }

    function setDireccionProveedor($direccionproveedor) {
        $this->direccionproveedor = $direccionproveedor;
    }

    function setIdUsuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setTipoUsuario($tipousuario) {
        $this->tipousuario = $tipousuario;
    }

//Metodos de negocio
    public function existeRut($rutproveedor) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select rut_proveedor from proveedor where(rut_proveedor='" . $rutproveedor . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function insertarProveedor() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "insert into proveedor values('" . $this->rutproveedor . "','" . $this->nombreproveedor . "','" . $this->apellidoproveedor . "','" . $this->telefonoproveedor . "','" . $this->direccionproveedor . "','" . $this->idusuario . "','" . $this->tipousuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function modificarProveedor() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "update proveedor set nombre_proveedor='" . $this->nombreproveedor . "',apellidos_proveedor='" . $this->apellidoproveedor . "',telefono_proveedor='" . $this->telefonoproveedor . "',direccion_proveedor='" . $this->direccionproveedor . "' where(rut_proveedor='" . $this->rutproveedor . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function eliminarProveedor($rutproveedor) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "delete from proveedor where (rut_proveedor='" . $rutproveedor . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function listarProveedor() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from proveedor";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

    public function listarDesdeRut($rutproveedor) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from proveedor where(rut_proveedor='" . $rutproveedor . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

}

?>
