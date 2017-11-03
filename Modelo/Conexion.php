<?php

class Conexion {

    private $tipoBd = 'mysql';
    private $host = 'localhost';
    private $nombreBd = 'sistema_vitivinicola';
    private $usuario = 'root';
    private $clave = '';

    public function __construct() {

        try {
//Conexión a la base de datos

            $conecta = new PDO($this->tipoBd . ':host=' . $this->host . ';dbname=' . $this->nombreBd, $this->usuario, $this->clave);
            $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conecta->exec("SET CHARACTER SET utf8");
        } catch (Exception $e) {
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
        } finally {
            $conecta = null;
        }
    }

}
?>
      