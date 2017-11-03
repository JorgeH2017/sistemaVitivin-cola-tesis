<?php

require_once("../Modelo/Conexion.php");

class Compra {

    private $idproducto;
    private $nombreproducto;
    private $descrproducto;
    private $cantidadproducto;
    private $idusuario;
    private $tipousuario;
    private $idtipoproducto;

    public function __construct() {
        
    }

    public function Compra($nombreproducto = "", $descrproducto = "", $cantidadproducto = "", $idusuario = "", $tipousuario = "", $idtipoproducto = "", $idproducto = null) {
        $this->idproducto = $idproducto;
        $this->nombreproducto = $nombreproducto;
        $this->descrproducto = $descrproducto;
        $this->cantidadproducto = $cantidadproducto;
        $this->idusuario = $idusuario;
        $this->tipousuario = $tipousuario;
        $this->idtipoproducto = $idtipoproducto;
    }

    function getIdProducto() {
        return $this->idproducto;
    }

    function getNombreProducto() {
        return $this->nombreproducto;
    }

    function getDescrProducto() {
        return $this->descrproducto;
    }

    function getCantidadProducto() {
        return $this->cantidadproducto;
    }

    function getIdUsuario() {
        return $this->idusuario;
    }

    function getTipoUsuario() {
        return $this->tipousuario;
    }

    function getIdTipoProducto() {
        return $this->idtipoproducto;
    }

    function setNombreProducto($nombreproducto) {
        $this->nombreproducto = $nombreproducto;
    }

    function setDescrProducto($descrproducto) {
        $this->descrproducto = $descrproducto;
    }

    function setCantidadProducto($cantidadproducto) {
        $this->cantidadproducto = $cantidadproducto;
    }

    function setIdUsuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setTipoUsuario($tipousuario) {
        $this->tipousuario = $tipousuario;
    }

    function setIdTipoProducto($idtipoproducto) {
        $this->idtipoproducto = $idtipoproducto;
    }

    //Metodos de negocio
    public function existeProducto($nombreproducto) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select nombre_producto from productos_compra where(nombre_producto='" . $nombreproducto . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function insertarProducto() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "insert into productos_compra(nombre_producto,descr_producto,cantidad,id_usuario,id_tipoUsuario,id_tipoProducto) values ('" . $this->nombreproducto . "','" . $this->descrproducto . "','" . $this->cantidadproducto . "','" . $this->idusuario . "','" . $this->tipousuario . "','" . $this->idtipoproducto . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function aumentarStockProducto($idproducto, $cantidad) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "update productos_compra set cantidad= cantidad + '" . $cantidad . "' where(id_producto='" . $idproducto . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function disminuirStockProducto($idproducto, $cantidad2) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "update productos_compra set cantidad=cantidad -'" . $cantidad2 . "' where(id_producto='" . $idproducto . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }


    public function eliminarProducto($idproducto) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "delete from productos_compra where(id_producto='" . $idproducto . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function listarProducto() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select productos_compra.id_producto,productos_compra.nombre_producto,tipo_producto.nombre_tipoProducto,productos_compra.cantidad from productos_compra inner join tipo_producto on productos_compra.id_tipoProducto=tipo_producto.id_tipoProducto";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

    public function listarTipoProducto() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select id_tipoProducto,nombre_tipoProducto from tipo_producto";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

    public function listarDesdeId($idproducto) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from productos_compra where(id_producto='" . $idproducto . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }
    
     public function seleccionarCompra() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select productos_compra.id_producto,productos_compra.nombre_producto,productos_compra.descr_producto,productos_compra.cantidad,tipo_producto.nombre_tipoProducto from productos_compra inner join tipo_producto on productos_compra.id_tipoProducto=tipo_producto.id_tipoProducto";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

}
?>
 
