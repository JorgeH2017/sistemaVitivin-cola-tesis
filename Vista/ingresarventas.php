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

require_once ("../Clases/Venta.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link href="estilosComercial.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>

        <script src="../Vista/Javascript/validarVenta.js"></script>
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
                    <h1 align="center"><strong> <em>Ingresar Ventas</em></strong></h1>
                    <br>
                </div>


                <div class="panel-body">
                    <form class="form-horizontal" id="form1" name="form1" method="post" action="../Controlador/control_venta.php" onsubmit="return validarVenta()">

                        <div class="form-group">
                            <div class="row centered-form">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>    
                                        <input class="form-control" name="txtdocumentoventa" type="text" id="txtdocumentoventa" value="" placeholder="Número documento" />
                                    </strong>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label">Fecha:</label>
                            <div class="col-md-7">
                                <input class="form-control" type="date" name="txtfechaventa" id="txtfechaventa"/> 
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="row centered-form">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>    
                                        <input class="form-control" name="txtcantidadvinoventa" type="text" id="txtcantidadvinoventa" placeholder="Cantidad de vino">
                                    </strong>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row centered-form">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>    
                                        <input class="form-control" name="txttipodocumento" type="text" id="txttipodocumento" placeholder="Tipo de documento"/>
                                    </strong>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row centered-form">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>    
                                        <input class="form-control" name="txtmontototal" type="text" id="txtmontototal" placeholder="Monto total ej: 350,85"/>
                                    </strong>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Nombre Vino:</label> 
                            <div class="col-md-7">    
                                <?php
                                $objVenta = new Venta();
                                $res = $objVenta->listarNombreVinos()
                                ?>
                                <select class="form-control" name="selectnombrevino" id="selectnombrevino" >
                                    <option value="0">Seleccione un vino para la venta</option>
                                    <?php
                                    while ($fila = mysqli_fetch_array($res)) {
                                        ?>
                                        <option value=" <?php echo $fila["id_vino"] ?> "> <?php echo $fila["nombre_vino"]; ?> </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-offset-4">
                                    <strong>
                                        <input class="btn-primary"  name="btningresarventa" type="submit" id="btningresarventa" value="Ingresar"/>
                                        <a href="botoninicio.php"><input name="btninicio" id="btninicio" type="button" value="Volver"></a>
                                    </strong>
                                </div>
                            </div>
                        </div> 

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
