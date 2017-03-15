<?php

require_once("../Modelo/Conexion.php");

class Inventario {

    private $idvino;
    private $nombrevino;
    private $cantidadvino;
    private $idusuario;
    private $tipousuario;

    public function __construct() {
        
    }

    public function Inventario($nombrevino = "", $cantidadvino = "", $idusuario = "", $tipousuario = "", $idvino = null) {
        $this->idvino = $idvino;
        $this->nombrevino = $nombrevino;
        $this->cantidadvino = $cantidadvino;
        $this->idusuario = $idusuario;
        $this->tipousuario = $tipousuario;
    }

    function getIdVino() {
        return $this->idvino;
    }

    function getNombreVino() {
        return $this->nombrevino;
    }

    function getCantidadVino() {
        return $this->cantidadvino;
    }

    function getIdUsuario() {
        return $this->idusuario;
    }

    function getTipoUsuario() {
        return $this->tipousuario;
    }

    function setNombreVino($nombrevino) {
        $this->nombrevino = $nombrevino;
    }

    function setCantidadVino($cantidadvino) {
        $this->cantidadVino = $cantidadvino;
    }

    function setIdUsuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setTipoUsuario($tipousuario) {
        $this->tipousuario = $tipousuario;
    }

    //Metodos de negocio
    public function existeVino($nombrevino) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select nombre_vino from inventario where(nombre_vino='" . $nombrevino . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function insertarVino() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "insert into inventario (nombre_vino,cantidad_vino,id_usuario,id_tipoUsuario) values ('" . $this->nombrevino . "','" . $this->cantidadvino . "','" . $this->idusuario . "','" . $this->tipousuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }


    public function aumentarStockVino($idvino, $cantidad) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "update inventario set cantidad_vino= cantidad_vino + '" . $cantidad . "' where(id_vino='" . $idvino . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }
    
   public function disminuirStockVino($idvino, $cantidad2) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "update inventario set cantidad_vino = cantidad_vino - '" . $cantidad2 . "' where (id_vino='" . $idvino . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }


    public function listarVino() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from inventario ";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

    public function listarDesdeId($idvino) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from inventario where(id_vino='" . $idvino . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

   
}

?>
