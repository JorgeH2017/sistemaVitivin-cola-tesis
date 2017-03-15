<?php

require_once("../Modelo/Conexion.php");

class Venta {

    private $numeroventa;
    private $fechaventa;
    private $cantidadvinoventa;
    private $tipodocumento;
    private $montototal;
    private $idusuario;
    private $tipousuario;
    private $idvino;

    public function __construct() {
        
    }

    public function Venta($numeroventa = "", $fechaventa = "", $cantidadvinoventa = "", $tipodocumento = "", $montototal = "", $idusuario = "", $tipousuario = "", $idvino = "") {
        $this->numeroventa = $numeroventa;
        $this->fechaventa = $fechaventa;
        $this->cantidadvinoventa = $cantidadvinoventa;
        $this->tipodocumento = $tipodocumento;
        $this->montototal = $montototal;
        $this->idusuario = $idusuario;
        $this->tipousuario = $tipousuario;
        $this->idvino = $idvino;
    }

//Accesadores
    function getNumeroVenta() {
        return $this->numeroventa;
    }

    function getFechaVenta() {
        return $this->fechaventa;
    }

    function getCantidadVinoVenta() {
        return $this->cantidadvinoventa;
    }

    function getTipoDocumento() {
        return $this->tipodocumento;
    }

    function getMontoTotal() {
        return $this->montototal;
    }

    function getIdUsuario() {
        return $this->idusuario;
    }

    function getTipoUsuario() {
        return $this->tipousuario;
    }

    function getIdVino() {
        return $this->idvino;
    }

//Mutadores
    function setNumeroVenta($numeroventa) {
        $this->numeroventa = $numeroventa;
    }

    function setFechaVenta($fechadocumentoventa) {
        $this->fechadocumentoventa = $fechadocumentoventa;
    }

    function setCantidadVinoVenta($cantidadvinoventa) {
        $this->cantidadvinoventa = $cantidadvinoventa;
    }

    function setTipoDocumento($tipodocumento) {
        $this->tipodocumento = $tipodocumento;
    }

    function setMontoTotal($montototal) {
        $this->montototal = $montototal;
    }

    function setIdUsuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setTipoUsuario($tipousuario) {
        $this->tipousuario = $tipousuario;
    }

    function setIdVino($idvino) {
        $this->idvino = $idvino;
    }

//Metodos de negocio
    public function existeVenta($numeroventa) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select id_documentoVenta from ventas where(id_documentoVenta='" . $numeroventa . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function insertarVenta() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "insert into ventas values('" . $this->numeroventa . "','" . $this->fechaventa . "','" . $this->cantidadvinoventa . "','" . $this->tipodocumento . "','" . $this->montototal . "','" . $this->idusuario . "','" . $this->tipousuario . "','" . $this->idvino . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function listarNombreVinos() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select id_vino,nombre_vino from inventario";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

    public function buscarCantidad($idvino) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select cantidad_vino from inventario where(id_vino='" . $idvino . "')";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

    public function disminuirStockVino($idvino, $cantidadvinoventa) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "update inventario set cantidad_vino=cantidad_vino -'" . $cantidadvinoventa . "' where(id_vino='" . $idvino . "')";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

    public function listarVentas() {
        $objConex = new Conexion;
        $objConex->abrirConexion();
        $sql = "select ventas.id_documentoVenta,ventas.fecha_documentoVenta,ventas.cantidad_vinoVenta,ventas.tipo_documentoVenta,ventas.monto_totalVenta,inventario.nombre_vino from ventas inner join inventario on ventas.id_vino=inventario.id_vino";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

}
?>
 
