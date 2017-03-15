<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location:../Vista/index.html");
} elseif ($_SESSION["TipUsuario"] == 3) {
    header("Location:../Vista/panelcalidad.php");
} elseif ($_SESSION["TipUsuario"] == 4) {
    header("Location:../Vista/panelcomercial.php");
} elseif ($_SESSION["TipUsuario"] == 5) {
    header("Location:../Vista/panelcompras.php");
} elseif ($_SESSION["TipUsuario"] == 6) {
    header("Location:../Vista/panelinventario.php");
}

require_once ("../Clases/Socio.php");

$rutsocio = base64_decode(filter_input(INPUT_GET,'rutsocio'));
$objSocio = new Socio();
$res = $objSocio->listarDesdeRut($rutsocio);
$fila = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link href="estilosAdministrativa.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>
        <script src="../Vista/Javascript/validarSocio.js"></script>
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
                    <h1 align="center"><strong><em>Modificar Socio</em></strong></h1>
                    <br>
                </div>


                <form class="form-horizontal" id="form1" name="form1" method="post" action="../Controlador/control_socio2.php" onsubmit="return validarSocio()">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label col-md-2" >Dni:</label>
                                    <label class="control-label col-md-offset-3">
                                        <input class="form-control" name="txtrutsocio" type="text" id="txtrutsocio" readonly value="<?php echo $fila["rut_socio"]; ?>"/>
                                    </label>
                                </strong> 

                            </div>
                        </div>
                    </div>    

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label col-md-2" >Nombres:</label>
                                    <label class="control-label col-md-offset-3">
                                        <input class="form-control" name="txtnombresocio" type="text" id="txtnombresocio" value="<?php echo $fila["nombre_socio"]; ?>"/>
                                    </label>
                                </strong>

                            </div>
                        </div>
                    </div>    

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label col-md-2" >Apellidos:</label>
                                    <label class="control-label col-md-offset-3">
                                        <input class="form-control" name="txtapellidossocio" type="text" id="txtapellidossocio" value="<?php echo $fila["apellidos_socio"]; ?>"/>
                                    </label>
                                </strong>

                            </div>
                        </div>
                    </div>                 

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label col-md-2" >Teléfono:</label>
                                    <label class="control-label col-md-offset-3">
                                        <input class="form-control" name="txttelefonosocio" type="tel" id="txttelefonosocio" value="<?php echo $fila["telefono_socio"]; ?>"/>
                                    </label>
                                </strong> 

                            </div>
                        </div>
                    </div>                 

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label col-md-2">Correo electrónico:</label>
                                    <label class="control-label col-md-offset-3">
                                        <input class="form-control" name="txtcorreosocio" type="email" id="txtcorreosocio" value="<?php echo $fila["correo_socio"]; ?>"/>
                                    </label>
                                </strong>

                            </div>
                        </div>
                    </div>                            

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label col-md-2">Dirección:</label>
                                    <label class="control-label col-md-offset-3">
                                        <input class="form-control" name="txtdireccionsocio" type="text" id="txtdireccionsocio" value="<?php echo $fila["direccion_socio"]; ?>"/>
                                    </label>
                                </strong> 

                            </div>
                        </div>
                    </div>                   
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-10 col-md-offset-1">

                                <div class="btn-primary">
                                    <strong> 
                                        <input class="btn-primary form-control" name="btnmodificarsocio" type="submit" id="btnmodificarsocio" value="Modificar" />
                                    </strong>
                                </div>  

                            </div>
                        </div>
                    </div>          

                    <div class="panel-footer">
                        <div class="col-lg-offset-4">
                            <a href="listarsocio.php">
                                <input name="btnatras" id="btnatras" type="button" value="Volver"/>
                            </a>
                            <a href="botoninicio.php">
                                <input name="btninicio" id="btninicio" type="button" value="Inicio"/>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
