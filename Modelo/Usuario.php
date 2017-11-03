<?php

require_once("../Modelo/Conexion.php");

class Usuario {

    private $idusuario;
    private $nombreusuario;
    private $contrasenausuario;
    private $nombre;
    private $apellido;
    private $telefonousuario;
    private $correousuario;
    private $direccionusuario;
    private $tipousuario;

    public function __construct() {
        
    }

    public function Usuario($nombreusuario = "", $contrasenausuario = "", $nombre = "", $apellido = "", $telefonousuario = "", $correousuario = "", $direccionusuario = "", $tipousuario = "", $idusuario = null) {
        $this->idusuario = $idusuario;
        $this->nombreusuario = $nombreusuario;
        $this->contrasenausuario = $contrasenausuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefonousuario = $telefonousuario;
        $this->correousuario = $correousuario;
        $this->direccionusuario = $direccionusuario;
        $this->tipousuario = $tipousuario;
    }

    public function Usuario2($nombreusuario = "", $nombre = "", $apellido = "", $telefonousuario = "", $direccionusuario = "", $idusuario = null) {
        $this->idusuario = $idusuario;
        $this->nombreusuario = $nombreusuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefonousuario = $telefonousuario;
        $this->direccionusuario = $direccionusuario;
    }

    function getIdUsuario() {
        return $this->idusuario;
    }

    function getNombreUsuario() {
        return $this->nombreusuario;
    }

    function getContrasenaUsuario() {
        return $this->contrasenausuario;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getTelefonoUsuario() {
        return $this->telefonousuario;
    }

    function getCorreoUsuario() {
        return $this->correousuario;
    }

    function getDireccionUsuario() {
        return $this->direccionusuario;
    }

    function getTipoUsuario() {
        return $this->tipousuario;
    }

    function setNombreUsuario($nombreusuario) {
        $this->nombreusuario = $nombreusuario;
    }

    function setContrasenaUsuario($contrasenausuario) {
        $this->contrasenausuario = $contrasenausuario;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setTelefonoUsuario($telefonousuario) {
        $this->telefonousuario = $telefonousuario;
    }

    function setCorreoUsuario($correousuario) {
        $this->correousuario = $correousuario;
    }

    function setDireccionUsuario($direccionusuario) {
        $this->direccionusuario = $direccionusuario;
    }

    function setTipoUsuario($tipousuario) {
        $this->tipousuario = $tipousuario;
    }

//Metodos de negocio
    public function existeUsuario($nombreusuario) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select nombre_usuario from usuario where(nombre_usuario='" . $nombreusuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function insertarUsuario() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "insert into usuario(nombre_usuario,contrasena_usuario,nombre,apellidos,telefono_usuario,correo_usuario,direccion_usuario,id_tipoUsuario)values('" . $this->nombreusuario . "','" . $this->contrasenausuario . "','" . $this->nombre . "','" . $this->apellido . "','" . $this->telefonousuario . "','" . $this->correousuario . "','" . $this->direccionusuario . "','" . $this->tipousuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function modificarUsuario($idusuario) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "update usuario set nombre_usuario='" . $this->nombreusuario . "',nombre='" . $this->nombre . "',apellidos='" . $this->apellido . "',telefono_usuario='" . $this->telefonousuario . "',direccion_usuario='" . $this->direccionusuario . "' where(id_usuario='" . $idusuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function modificarPerfilUsuario($idusuario) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "update usuario set contrasena_usuario='" . $this->contrasenausuario . "',teleono_usuario='" . $this->telefonousuario . "',correo_usuario='" . $this->correousuario . "',direccion_usuario='" . $this->direccionusuario . "' where(id_usuario='" . $idusuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function eliminarUsuario($idusuario) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "delete from usuario where(id_usuario='" . $idusuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function listarUsuario() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select usuario.id_usuario,usuario.nombre_usuario,usuario.nombre,usuario_tipo.nombre_tipoUsuario from usuario inner join usuario_tipo on usuario.id_tipoUsuario=usuario_tipo.id_tipoUsuario";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

    public function listarTipoUsuario() {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select id_tipoUsuario,nombre_tipoUsuario from usuario_tipo where nombre_tipoUsuario != 'Administrador'";
        $matrix = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $matrix;
    }

    public function listarDesdeId($idusuario) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select nombre_usuario,nombre,apellidos,telefono_usuario,direccion_usuario from usuario where(id_usuario='" . $idusuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function listarDesdeId2($idusuario) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select telefono_usuario,correo_usuario,direccion_usuario from usuario where(id_usuario='" . $idusuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function listarTipoUsuarioDesdeId($idusuario) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select usuario_tipo.id_tipoUsuario from usuario_tipo inner join usuario on usuario_tipo.id_tipoUsuario=usuario.id_tipoUsuario where(usuario.id_usuario='" . $idusuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function modificarTelefono($idusuario, $telefono) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "update usuario set telefono_usuario='" . $telefono . "' where(id_usuario='" . $idusuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function modificarCorreo($idusuario, $correo) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "update usuario set correo_usuario='" . $correo . "' where(id_usuario='" . $idusuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function modificarDireccion($idusuario, $direccion) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "update usuario set direccion_usuario='" . $direccion . "' where(id_usuario='" . $idusuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function seleccionarContrasena($idusuario) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select contrasena_usuario from usuario where(id_usuario='" . $idusuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function modificarContrasena($idusuario, $contrasenanueva) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "update usuario set contrasena_usuario='" . $contrasenanueva . "' where(id_usuario='" . $idusuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function existeCorreo($correousuario) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select correo_usuario from usuario where(correo_usuario='" . $correousuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function seleccionarCorreo($idusuario) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select correo_usuario from usuario where(id_usuario='" . $idusuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function comprobarCorreo($mail) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from usuario where(correo_usuario='" . $mail . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function modificarContrasena2($contrasenanueva, $mail) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "update usuario set contrasena_usuario='" . $contrasenanueva . "' where(correo_usuario='" . $mail . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

    public function seleccionarUsuario($nombreusuario) {
        $objConex = new Conexion();
        $objConex->abrirConexion();
        $sql = "select * from usuario where(nombre_usuario='" . $nombreusuario . "')";
        $resul = $objConex->ejecutarConsulta($sql);
        $objConex->cerrarConexion();
        return $resul;
    }

}
