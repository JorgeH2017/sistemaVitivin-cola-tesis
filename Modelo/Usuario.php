<?php

require_once 'Conexion.php';

class Usuario {

    private $idusuario;
    private $nombreusuario;
    private $contrasenausuario;
    private $nombre;
    private $apellido;
    private $telefonousuario;
    private $correousuario;
    private $direccionusuario;
    private $ciudadusuario;
    private $regionusuario;
    private $codpostal;
    private $paisusuario;
    private $fechaingreso;
    private $tipousuario;

    public function __construct() {
        
    }

    public function Usuario($nombreusuario = "", $contrasenausuario = "", $nombre = "", $apellido = "", $telefonousuario = "", $correousuario = "", $direccionusuario = "", $ciudadusuario = "", $regionusuario = "", $codpostal = "", $paisusuario = "", $fechaingreso = "", $tipousuario = "", $idusuario = null) {
        $this->idusuario = $idusuario;
        $this->nombreusuario = $nombreusuario;
        $this->contrasenausuario = $contrasenausuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefonousuario = $telefonousuario;
        $this->correousuario = $correousuario;
        $this->direccionusuario = $direccionusuario;
        $this->ciudadusuario = $ciudadusuario;
        $this->regionusuario = $regionusuario;
        $this->codpostal = $codpostal;
        $this->paisusuario = $paisusuario;
        $this->fechaingreso = $fechaingreso;
        $this->tipousuario = $tipousuario;
    }

    /* public function Usuario2($nombreusuario = "", $nombre = "", $apellido = "", $telefonousuario = "", $direccionusuario = "", $idusuario = null) {
      $this->idusuario = $idusuario;
      $this->nombreusuario = $nombreusuario;
      $this->nombre = $nombre;
      $this->apellido = $apellido;
      $this->telefonousuario = $telefonousuario;
      $this->direccionusuario = $direccionusuario;
      } */

//Métodos accesadores y mutadores
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
        return $this->direccionusuariousuario;
    }

    function getCiudadUsuario() {
        return $this->ciudadusuario;
    }

    function getRegionUsuario() {
        return $this->regionusuario;
    }

    function getCodPostal() {
        return $this->codpostal;
    }

    function getPaisUsuario() {
        return $this->paisusuario;
    }

    function getFechaIngreso() {
        return $this->fechaingreso;
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

    function setCiudadUsuario($ciudadusuario) {
        $this->ciudadusuario = $ciudadusuario;
    }

    function setRegionUsuario($regionusuario) {
        $this->regionusuario = $regionusuario;
    }

    function setCodPostal($codpostal) {
        $this->codpostal = $codpostal;
    }

    function setPaisUsuario($paisusuario) {
        $this->paisusuario = $paisusuario;
    }

    function setTipoUsuario($tipousuario) {
        $this->tipousuario = $tipousuario;
    }

//Metodos de negocio
//Este método verifica que exista un usuario con ese nombre de usuario y contraseña.
//Consulta todos los datos de ese usuario.
    public function existeUsuario($usuario) {
        $objConex = new Conexion();
        $consulta = $objConex->prepare('select * from usuario where nombre_usuario = :usuario');
        $consulta->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $consulta->execute();
        $objConex = null;
        return $consulta;
    }

    /* public function cantidadUsuario($user) {
      $objConex = new Conexion();
      $consulta = $objConex->query("select count(nombre_usuario) from usuario where nombre_usuario=$user");
      $res = $consulta->fetchColumn(1);
      return $res;
      $consulta = null;
      $objConex = null;
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
     */
}
