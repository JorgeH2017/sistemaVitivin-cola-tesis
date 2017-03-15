<?php

require_once("../Modelo/Conexion.php");

class tipoProducto {

    private $idtipoproducto;
    private $nombretipoproducto;

    public function __construct() {
        
    }

    public function tipoProducto($nombretipoproducto="", $idtipoproducto = null) {
        $this->idtipoproducto = $idtipoproducto;
        $this->nombretipoproducto = $nombretipoproducto;
    }

    function getidTipoProducto() {
        return $this->idtiporoducto;
    }

    function getnombreTipoProducto() {
        return $this->nombretipoproducto;
    }

    function setnombreTipoProducto($nombretipoproducto) {
        $this->nombretipoproducto = $nombretipoproducto;
    }

    //Metodos de negocio
    public function existeTipoProd($nombretipoproducto) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select nombre_tipoProducto from tipo_producto where(nombre_tipoProducto='" . $nombretipoproducto . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function insertarTipoProd() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "insert into tipo_producto (nombre_tipoProducto) values ('" . $this->nombretipoproducto . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

     public function listarTipo() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from tipo_producto";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }
}
