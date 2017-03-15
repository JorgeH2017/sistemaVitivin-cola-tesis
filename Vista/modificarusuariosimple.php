<?php
session_start();

$idusuario = $_SESSION["id"];
$_SESSION["idusuario"] = $idusuario;

if (!isset($_SESSION["usuario"])) {
    header("location:../Vista/index.html");
}

require_once ("../Clases/Usuario.php");

$objUsuario = new Usuario();
$res = $objUsuario->listarDesdeId2($idusuario);
$fila = mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <link href="estilosUsuario.css" rel="stylesheet" type="text/css" />
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>
        <script src="../Vista/Javascript/validarUsuario.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <br>
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <br>
                    <div align="right">
                        Nombre de usuario: <?= $_SESSION["usuario"]; ?>
                        <p align="right">
                            <a href="modificarusuariosimple.php"><input name="btnmodificarperfil" id="btnmodificarperfil" type="button" value="Modificar Perfil Usuario"></a><br>
                            <a href="../Controlador/dologout.php"><input name="btncerrar" id="btncerrar" type="button" value="Cerrar Sesión"></a>  </p> </div>  
                    <h1 align="center"><strong><em>Modificar Perfil Usuario</em></strong></h1>
                    <br>
                </div>

                <div class="panel-body">

                    <form class="form-horizontal" id="form1" name="form1" method="post" action="../Controlador/control_usuario2.php">

                        <div class="panel-footer">
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <strong>
                                        <label class="control-label col-md-2" >Contrase&ntilde;a actual:</label>
                                        <label class="control-label col-lg-9 col-md-offset-1">
                                            <input class="form-control" name="txtcontrasenaactual" type="password" id="txtcontrasenaactual" />
                                        </label>
                                    </strong>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <strong>
                                        <label class="control-label col-md-2" >Contrase&ntilde;a nueva:</label>
                                        <label class="control-label col-lg-9 col-md-offset-1">
                                            <input class="form-control" name="txtcontrasenanueva" type="password" id="txtcontrasenanueva" />
                                        </label>
                                    </strong>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <strong>
                                        <label class="control-label col-md-2" >Repetir Contraseña:</label>
                                        <label class="control-label col-lg-9 col-md-offset-1">
                                            <input class="form-control" name="txtrepetircontrasenanueva" type="password" id="txtrepetircontrasenanueva" />
                                        </label>
                                    </strong>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>
                                        <input class="btn-warning form-control" name="btnmodificarcontrasena" type="submit" id="btnmodificarcontrasena" value="Modificar Contraseña" onclick="return validarPass()"/>
                                    </strong>
                                </div>
                            </div>
                        </div>    

                        <div class="panel-footer">                        
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <strong>
                                        <label class="control-label col-md-1" >Tel&eacute;fono:</label>
                                        <label class="control-label col-lg-9 col-md-offset-2">
                                            <input class="form-control" name="txttelefono" type="text" id="txttelefono" value="<?php echo $fila["telefono_usuario"]; ?>"/>
                                        </label>
                                    </strong>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <strong>
                                        <input class="btn-warning form-control" name="btnmodificartelefono" type="submit" id="btnmodificartelefono" value="Modificar Teléfono" onclick="return validarTelefono()"/>
                                    </strong>
                                </div>
                            </div>
                        </div>   

                        <div class="panel-footer">
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <strong>
                                        <label class="control-label col-md-2" >Correo electr&oacute;nico:</label>
                                        <label class="control-label col-lg-9 col-md-offset-1">
                                            <input class="form-control" name="txtcorreousuario" type="email" id="txtcorreousuario" readonly value="<?php echo $fila["correo_usuario"]; ?>"/>
                                        </label>
                                    </strong>
                                    <strong>
                                        <label class="control-label col-md-2" >Correo Nuevo:</label>
                                        <label class="control-label col-lg-9 col-md-offset-1">
                                            <input class="form-control" name="txtcorreonuevo" type="email" id="txtcorreonuevo" value=""/>
                                        </label>
                                    </strong>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>

                                        <input class="btn-warning form-control" name="btnmodificarcorreo" type="submit" id="btnmodificarcorreo" value="Modificar Correo" onclick="return validarCorreo()"/>

                                    </strong>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <strong>
                                        <label class="control-label col-md-2" >Direcci&oacute;n:</label>
                                        <label class="control-label col-lg-9 col-md-offset-1">
                                            <input class="form-control" name="txtdireccusuario" type="text" id="txtdireccusuario" value="<?php echo $fila["direccion_usuario"]; ?>" />
                                        </label>
                                    </strong>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>
                                        <input class="btn-warning form-control" name="btnmodificardireccion" type="submit" id="btnmodificardireccion" value="Modificar Dirección" onclick="return validarDireccion()" />
                                    </strong>
                                </div>
                            </div>

                        </div>

                        <div class="panel-footer">
                            <div class="col-lg-offset-5">
                                <a href="botoninicio.php">
                                    <input name="btninicio" id="btninicio" type="button" value="Inicio" /></a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>