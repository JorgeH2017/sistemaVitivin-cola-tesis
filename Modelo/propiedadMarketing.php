<?php

require_once("../Modelo/Conexion.php");

class propiedadMarketing {

    private $idpropiedadmarketing;
    private $nombrepropiedadmarketing;
    private $descrpropiedadmarketing;
    private $idplanmarketing;

    public function __construct() {
        
    }

    public function propiedadMark($nombrepropiedadmarketing = "", $descrpropiedadmarketing = "", $idplanmarketing = "", $idpropiedadmarketing = null) {
        $this->idpropiedadmarketing = $idpropiedadmarketing;
        $this->nombrepropiedadmarketing = $nombrepropiedadmarketing;
        $this->descrpropiedadmarketing = $descrpropiedadmarketing;
        $this->idplanmarketing = $idplanmarketing;
    }

    function getIdPropiedadMarketing() {
        return $this->idpropiedadmarketing;
    }

    function getNombrePropiedadMarketing() {
        return $this->nombrepropiedadmarketing;
    }

    function getDescrPropiedadMarketing() {
        return $this->descrpropiedadmarketing;
    }

    function getIdPlanMarketing() {
        return $this->idplanmarketing;
    }

    function setNombrePropiedadMarketing($nombrepropiedadmarketing) {
        $this->nombrepropiedadmarketing = $nombrepropiedadmarketing;
    }

    function setDescrPropiedadMarketing($descrpropiedadmarketing) {
        $this->descrpropiedadmarketing = $descrpropiedadmarketing;
    }

    function setIdPlanMarketing($idplanmarketing) {
        $this->idplanmarketing = $idplanmarketing;
    }

    //Metodos de negocio
    public function insertarPropiedadMarketing() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "insert into propiedad_marketing(nombre_propiedadMarketing,descr_propiedadmarketing,id_planMarketing) values('" . $this->nombrepropiedadmarketing . "','" . $this->descrpropiedadmarketing . "','" . $this->idplanmarketing . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function modificarPropiedadMarketing($nombrepropiedadmarketing, $idplanmarketing) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "update propiedad_marketing set descr_propiedadMarketing='" . $this->descrpropiedadmarketing . "' where(nombre_propiedadMarketing='" . $nombrepropiedadmarketing . "' and id_planMarketing='" . $idplanmarketing . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function listarPropiedadMarketing($nombrepropiedadmarketing, $idplanmarketing) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select descr_propiedadMarketing from propiedad_marketing where(nombre_propiedadMarketing='" . $nombrepropiedadmarketing. "'and id_planMarketing='" . $idplanmarketing . "')";
        $objConex->cerrarConexion();
        $matrix = $objConex->ejecutarConsulta($sql);
        return $matrix;
    }

}
?>


