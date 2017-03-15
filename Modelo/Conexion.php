<?php

class Conexion {

    private $usuario = "root";
    private $clave = "";
    private $host = "127.0.0.1";
    private $bd = "sistema_vitivinicola";
    private $conex = "";

    public function __construct() {
        
    }

//sin ´parametros
    public function abrirConexion() {
        $this->conex = mysqli_connect($this->host, $this->usuario, $this->clave, $this->bd) or die("Problema de conexión");
    }

    public function ejecutarConsulta($sql) {
        $this->abrirConexion();
        $resul = mysqli_query($this->conex, $sql) or die("ERROR : $sql<br>".$sql.mysqli_error($this->conex));
        return $resul;
    }

    public function cerrarConexion() {
        mysqli_close($this->conex);
    }

}
?>

