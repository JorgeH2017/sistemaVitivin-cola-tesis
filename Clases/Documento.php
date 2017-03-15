<?php

require_once("../Modelo/Conexion.php");

class Documento {

    private $iddocumento;
    private $nombredocumento;
    private $pesodocumento;
    private $tipodocumento;
    private $fechacreacion;
    private $idusuario;
    private $tipousuario;

    public function __construct() {
        
    }

    public function Documento($nombredocumento = "", $pesodocumento = "", $tipodocumento = "", $idusuario = "", $tipousuario = "", $iddocumento = null, $fechacreacion = null) {
        $this->iddocumento = $iddocumento;
        $this->nombredocumento = $nombredocumento;
        $this->pesodocumento = $pesodocumento;
        $this->tipodocumento = $tipodocumento;
        $this->fechacreacion = $fechacreacion;
        $this->idusuario = $idusuario;
        $this->tipousuario = $tipousuario;
    }

    function getIddocumento() {
        return $this->iddocumento;
    }

    function getNombredocumento() {
        return $this->nombredocumento;
    }

    function getPesodocumento() {
        return $this->pesodocumento;
    }

    function getTipodocumento() {
        return $this->tipodocumento;
    }

    function getFechaCreacion() {
        return $this->fechacreacion;
    }

    function getIdusuario() {
        return $this->idusuario;
    }

    function getTipousuario() {
        return $this->tipousuario;
    }

    function setNombredocumento($nombredocumento) {
        $this->nombredocumento = $nombredocumento;
    }

    function setPesodocumento($pesodocumento) {
        $this->pesodocumento = $pesodocumento;
    }

    function setTipodocumento($tipodocumento) {
        $this->tipodocumento = $tipodocumento;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setTipousuario($tipousuario) {
        $this->tipousuario = $tipousuario;
    }

    public function insertarDocumento() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "insert into documento(nombre_documento,peso_documento,tipo_documento,id_usuario,id_tipoUsuario)values('" . $this->nombredocumento . "','" . $this->pesodocumento . "','" . $this->tipodocumento . "','" . $this->idusuario . "','" . $this->tipousuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    function listarDocumentoPorFecha() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from documento order by fecha_creacion";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    function listarDocumentoDesdeId($iddocumento) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from documento where(id_documento='" . $iddocumento . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    function eliminarDocumentoDesdeId($iddocumento) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "delete from documento where(id_documento='" . $iddocumento . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    function existeDocumento($name) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select nombre_documento from documento where(nombre_documento='" . $name . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

}
