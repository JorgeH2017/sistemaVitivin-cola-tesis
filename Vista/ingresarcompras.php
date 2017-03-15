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
} elseif ($_SESSION["TipUsuario"] == 6) {
    header("Location:../Vista/panelinventario.php");
}

require_once("../Clases/Compra.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link href="estilosCompras.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>

        <script src="../Vista/Javascript/validarCompra.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <br>
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <div align="right">
                        Nombre de usuario: <?= $_SESSION["usuario"]; ?>
                        <p align="right">
                            <a href="modificarusuariosimple.php"><input name="btnmodificarperfil" id="btnmodificarperfil" type="button" value="Modificar Perfil Usuario"></a><br>
                            <a href="../Controlador/dologout.php"><input name="btncerrar" id="btncerrar" type="button" value="Cerrar Sesión"></a>  </p> </div>  
                    <h1 align="center"><strong><em>Ingresar Compras</em></strong></h1>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" id="form1" name="form1" method="post" action="../Controlador/control_compra.php" onsubmit="return validarCompra()">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong> 
                                        <input class="form-control" name="txtnombreproducto" type="text" id="txtnombreproducto" value="" placeholder="Nombre producto" />
                                    </strong> 
                                </div>
                            </div>
                        </div>           


                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong> 
                                        <input class="form-control" name="txtdescrproducto" type="text" id="txtdescrproducto" placeholder="Descripci&oacute;n"/>
                                    </strong> 
                                </div>
                            </div>
                        </div>   

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong> 
                                        <input class="form-control" name="txtcantidadproducto" type="text" id="txtcantidadproducto" placeholder="Cantidad" />
                                    </strong> 
                                </div>
                            </div>
                        </div>                     

                        <div class="form-group">
                            <label class="col-md-4 control-label">Tipo Producto:</label> 
                            <div class="col-md-7">           
                                <?php
                                $objCompra = new Compra();
                                $res = $objCompra->listarTipoProducto();
                                ?>
                                <select class="form-control" name="selecttipoproducto" id="selecttipoproducto" class="select">
                                    <option value="0">Seleccione un tipo de producto:</option>
                                    <?php
                                    while ($fila = mysqli_fetch_array($res)) {
                                        ?>
                                        <option value=" <?php echo $fila["id_tipoProducto"] ?> "> <?php echo $fila["nombre_tipoProducto"]; ?> </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <br>
                            <div class="form-group">
                                <div class="col-lg-offset-4">
                                    <strong>
                                        <input name="btningresarproducto" type="submit" id="btningresarproducto" value="Ingresar" />
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
