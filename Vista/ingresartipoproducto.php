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

require_once ("../Clases/tipoProducto.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link href="estilosCompras.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>

        <script src="../Vista/Javascript/validarTipo.js"></script>
    </head>
    <body>

        <div class="container-fluid">
            <br>
            <br>
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <br>
                    <div align="right">
                        Nombre de usuario: <?= $_SESSION["usuario"]; ?>
                        <p align="right">
                            <a href="modificarusuariosimple.php"><input name="btnmodificarperfil" id="btnmodificarperfil" type="button" value="Modificar Perfil Usuario"></a><br>
                            <a href="../Controlador/dologout.php"><input name="btncerrar" id="btncerrar" type="button" value="Cerrar Sesión"></a>  </p> </div>  

                    <h1 align="center"><strong><em>Ingresar Tipo de Producto</em></strong></h1>
                    <br>
                </div>
                <div class="panel-body">
                    <form id="form1" name="form1" method="post" action="../Controlador/control_tipo.php" onsubmit="return validarTipo()">
                        <br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-offset-4">
                                    <strong> 
                                        <input name="txttipoproducto" type="text" id="txttipoproducto" placeholder="Nombre tipo de producto"/>
                                    </strong> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-offset-4">
                                    <strong>
                                        <input name="btningresartipoproducto" type="submit" id="btningresartipoproducto" value="Ingresar" />
                                        <a href="botoninicio.php"><input name="btninicio" id="btninicio" type="button" value="Volver"></a>
                                    </strong>
                                </div>
                            </div>
                        </div>       
                        <div class="panel-footer">       

                            <table class="table table-bordered" width="450" border="1" align="center">
                                <tr>
                                    <th><center>Tipos de productos ingresados</center></th>
                                </tr>

                                <?php
                                $objProducto = new tipoProducto();
                                $res = $objProducto->listarTipo();
                                $num = mysqli_num_rows($res);
                                if ($num == 0) {
                                    echo "<font color='white'>NO HAY DATOS INGRESADOS</font>";
                                } else {
                                    while ($fila = mysqli_fetch_array($res)) {
                                        ?>
                                        <tr>
                                            <td><center> <?php echo $fila['nombre_tipoProducto']; ?></center></td>
                                        </tr>

                                        <?php
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
