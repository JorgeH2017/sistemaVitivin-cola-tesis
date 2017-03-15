<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location:../Vista/index.html");
} elseif ($_SESSION["TipUsuario"] == 2) {
    header("Location:../Vista/paneladministrativo.php");
} elseif ($_SESSION["TipUsuario"] == 3) {
    header("Location:../Vista/panelcalidad.php");
} elseif ($_SESSION["TipUsuario"] == 5) {
    header("Location:../Vista/panelcompras.php");
} elseif ($_SESSION["TipUsuario"] == 6) {
    header("Location:../Vista/panelinventario.php");
}

require_once ("../Clases/Cliente.php");

$rutcliente = base64_decode(filter_input(INPUT_GET, 'rutcliente'));
$objClie = new Cliente();
$res = $objClie->listarDesdeRut($rutcliente);
$fila = mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link href="estilosComercial.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>

        <script src="../Vista/Javascript/validarCliente.js"></script>

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
                    <h1 align="center"><strong><em>Modificar Cliente</em></strong></h1>
                    <br>
                </div>

                <div class="panel-body">
                    <form id = "form1" name = "form1" method = "post" action = "../Controlador/control_cliente2.php" onsubmit="return validarCliente()">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <strong> 
                                        <label class="control-label col-md-2" >Dni:</label>
                                        <label class="control-label col-md-offset-3">
                                            <input class="form-control" name = "txtrutcliente" type = "text" id = "txtrutcliente" readonly value = "<?php echo $fila["rut_cliente"]; ?>" />
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
                                            <input class="form-control" name = "txtnombrecliente" type = "text" id = "txtnombrecliente" value = "<?php echo $fila["nombre_cliente"]; ?>"/>
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
                                            <input class="form-control" name = "txtapellidocliente" type = "text" id = "txtapellidocliente" value = "<?php echo $fila["apellidos_cliente"]; ?>"/>
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
                                            <input class="form-control" name = "txttelefonocliente" type = "tel" id = "txttelefonocliente" value="<?php echo $fila["telefono_cliente"]; ?>"/>
                                        </label>
                                    </strong> 
                                </div>
                            </div>
                        </div>    

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <strong> 
                                        <label class="control-label col-md-2" >Correo electrónico</label>
                                        <label class="control-label col-md-offset-3">
                                            <input class="form-control" name = "txtcorreocliente" type = "email" id = "txtcorreocliente" value = "<?php echo $fila["correo_cliente"]; ?>"/>
                                        </label>
                                    </strong> 
                                </div>
                            </div>
                        </div>    

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <strong> 
                                        <label class="control-label col-md-2" >Dirección:</label>
                                        <label class="control-label col-md-offset-3">
                                            <input class="form-control" name = "txtdireccioncliente" type = "text" id = "txtdireccioncliente" value = "<?php echo $fila["direccion_cliente"]; ?>"/>
                                        </label>
                                    </strong> 
                                </div>
                            </div>
                        </div>    

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong> 
                                        <div class="btn-primary">
                                            <input class="form-control" name="btnmodificarcliente" type="submit" id="btnmodificarcliente" value="Modificar" />
                                        </div>
                                    </strong> 
                                </div>
                            </div>
                        </div>          


                        <div class="panel-footer">
                            <div class="col-lg-offset-4">
                                <a href = "botoninicio.php">
                                    <input name = "btninicio" id = "btninicio" type = "button" value = "Inicio">
                                </a> <a href = "listarcliente.php">
                                    <input name = "btnatras" id = "btnatras" type = "button" value = "Volver">
                                </a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
