<?php

require_once("../Modelo/Conexion.php");

class propiedadCalidad {

    private $idpropiedadcalidad;
    private $nombrepropiedadcalidad;
    private $descrpropiedadcalidad;
    private $idplancalidad;

    public function __construct() {
        
    }

    public function propiedadCal($nombrepropiedadcalidad = "", $descrpropiedadcalidad = "", $idplancalidad = "", $idpropiedadcalidad = null) {
        $this->idpropiedadcalidad = $idpropiedadcalidad;
        $this->nombrepropiedadcalidad = $nombrepropiedadcalidad;
        $this->descrpropiedadcalidad = $descrpropiedadcalidad;
        $this->idplancalidad = $idplancalidad;
    }

    function getidPropiedadCalidad() {
        return $this->idpropiedadcalidad;
    }

    function getNombrePropiedadCalidad() {
        return $this->nombrepropiedadcalidad;
    }

    function getDescrPropiedadCalidad() {
        return $this->descrpropiedadcalidad;
    }

    function getIdPlanCalidad() {
        return $this->idplancalidad;
    }

    function setNombrePropiedadCalidad($nombrepropiedadcalidad) {
        $this->nombrepropiedadcalidad = $nombrepropiedadcalidad;
    }

    function setDescrPropiedadCalidad($descrpropiedadcalidad) {
        $this->descrpropiedadcalidad = $descrpropiedadcalidad;
    }

    function setIdPlanCalidad($idplancalidad) {
        $this->idplancalidad = $idplancalidad;
    }

    //Metodos de negocio
    public function insertarPropiedadCalidad() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "insert into propiedad_calidad (nombre_propiedadCalidad,descr_propiedadCalidad,id_planCalidad) values ('" . $this->nombrepropiedadcalidad . "','" . $this->descrpropiedadcalidad . "','" . $this->idplancalidad . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function modificarPropiedadCalidad($nombrepropiedadcalidad,$idplancalidad) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql="update propiedad_calidad set descr_propiedadCalidad='" . $this->descrpropiedadcalidad . "' where(nombre_propiedadCalidad='".$nombrepropiedadcalidad."' and id_planCalidad='" . $idplancalidad . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function listarPropiedadCalidad($nombrepropiedadcalidad, $idplancalidad) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select descr_propiedadCalidad from propiedad_calidad where(nombre_propiedadCalidad='" . $nombrepropiedadcalidad . "'and id_planCalidad='" . $idplancalidad . "')";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

}

?>
