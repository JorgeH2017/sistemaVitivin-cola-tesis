<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location:../Vista/index.html");
} elseif ($_SESSION["TipUsuario"] == 2) {
    header("Location:../Vista/paneladministrativo.php");
} elseif ($_SESSION["TipUsuario"] == 3) {
    header("Location:../Vista/panelcalidad.php");
} elseif ($_SESSION["TipUsuario"] == 4) {
    header("Location:../Vista/panelcomercial.php");
} elseif ($_SESSION["TipUsuario"] == 5) {
    header("Location:../Vista/panelcompras.php");
} elseif ($_SESSION["TipUsuario"] == 6) {
    header("Location:../Vista/panelinventario.php");
}

require_once ("../Clases/Usuario.php");

$idusuario = base64_decode(filter_input(INPUT_GET,'idusuario'));
$_SESSION["idusuario"] = $idusuario;
$objUsuario = new Usuario();
$res = $objUsuario->listarDesdeId($idusuario);
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
                    <h1 align="center"><strong><em>Modificar Usuario</em></strong></h1>
                    <br>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" id="form1" name="form1" method="post" action="../Controlador/control_usuario3.php" onsubmit="return validarUsuario2()">

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label col-md-2" >Nombre usuario:</label>
                                    <label class="control-label col-md-offset-3">
                                        <input class="form-control" name="txtusuario" type="text" id="txtusuario" readonly value="<?php echo $fila["nombre_usuario"]; ?>"/>
                                    </label>
                                </strong> 
                            </div>
                        </div>    

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label col-md-2" >Nombre:</label>
                                    <label class="control-label col-md-offset-3">
                                        <input class="form-control" name="txtnombres" type="text" id="txtnombres" value="<?php echo $fila["nombre"]; ?>"/>
                                    </label>
                                </strong> 
                            </div>
                        </div>                       

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label col-md-2" >Apellidos:</label>
                                    <label class="control-label col-md-offset-3">
                                        <input class="form-control" name="txtapellidos" type="text" id="txtapellidos" value="<?php echo $fila["apellidos"]; ?>"/>
                                    </label>
                                </strong> 
                            </div>
                        </div>      

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label col-md-2" >Tel&eacute;fono:</label>
                                    <label class="control-label col-md-offset-3">
                                        <input class="form-control" name="txttelefono" type="tel" id="txttelefono" value="<?php echo $fila["telefono_usuario"]; ?>"/>
                                    </label>
                                </strong> 
                            </div>
                        </div>    

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label col-md-2" >Direcci&oacute;n:</label>
                                    <label class="control-label col-md-offset-3">
                                        <input class="form-control" name="txtdirecusuario" type="text" id="txtdirecusuario" value="<?php echo $fila["direccion_usuario"]; ?>"/>
                                    </label>
                                </strong> 
                            </div>
                        </div>  

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong> 
                                        <div class="btn-primary">
                                            <input class="btn-primary form-control" name="btnmodificarusuario" type="submit" id="btnmodificarusuario" value="Modificar" />
                                        </div>
                                    </strong> 
                                </div>
                            </div>
                        </div>         

                        <div class="panel-footer">
                            <div class="col-lg-offset-4">
                                <a href="botoninicio.php"><input name="btninicio" id="btninicio" type="button" value="Inicio"></a>
                                <a href="listarusuario.php">
                                    <input name="btnatras" id="btnatras" type="button" value="Volver"></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
