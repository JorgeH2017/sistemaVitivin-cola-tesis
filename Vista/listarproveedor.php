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

require_once ("../Clases/Proveedor.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link href="estilosCompras.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>

        <script type="text/javascript">
            <!--
function confirmar() {
                if (!confirm("Desea eliminar este registro?"))
                    return false;
            }
            //-->
        </script>

    </head>
    <body>
        <div class="container-fluid">
            <br>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div align="right">
                        Nombre de usuario: <?= $_SESSION["usuario"]; ?>
                        <p align="right">
                            <a href="modificarusuariosimple.php"><input name="btnmodificarperfil" id="btnmodificarperfil" type="button" value="Modificar Perfil Usuario"></a><br>
                            <a href="../Controlador/dologout.php"><input name="btncerrar" id="btncerrar" type="button" value="Cerrar Sesión"></a>  </p> </div>  
                    <h1 align="center" ><strong><em>Listar Proveedor</em></strong></h1>
                </div>
            </div>
            <form id="form1" name="form1" method="post" action="listarproveedor" class="fondo">


                <table class="table table-bordered">
                    <tr>
                        <th width="82"><center><span class="Estilo6">Rut</span></center></th>
                    <th width="99"><center><span class="Estilo6">Nombres</span></center></th>
                    <th width="96"><center><span class="Estilo6">Apellidos</span></center></th>
                    <th width="94"><center><span class="Estilo6">Teléfono</span></center></th>
                    <th width="85"><center><span class="Estilo6">Dirección</span></center></th>
                    <th width="87"><center><span class="Estilo6">Modificar</span></center></th>
                    <th width="87"><center><span class="Estilo6">Eliminar</span></center></th>
                    </tr>

                    <?php
                    $objProv = new Proveedor();
                    $res = $objProv->listarProveedor();
                    $num = mysqli_num_rows($res);
                    if ($num == 0) {
                        echo "<font color='white'>NO HAY DATOS INGRESADOS</font>";
                    } else {
                        while ($fila = mysqli_fetch_array($res)) {
                            ?>

                            <tr>
                                <td><center><span><?php echo $fila["rut_proveedor"]; ?></span></center></td>
                            <td><center><span><?php echo $fila["nombre_proveedor"]; ?></span></center></td>
                            <td><center><span><?php echo $fila["apellidos_proveedor"]; ?></span></center></td>
                            <td><center><span><?php echo $fila["telefono_proveedor"]; ?></span></center></td>
                            <td><center><span><?php echo $fila["direccion_proveedor"]; ?></span></center></td>
                            <td><center><strong><span><a href="modificarproveedor.php?rutproveedor=<?php echo base64_encode($fila["rut_proveedor"]); ?>">Modificar</a></span></strong></center></td>
                <td><center><strong><span><a onclick="return confirmar()" href="../Controlador/eliminarproveedor.php?rutproveedor=<?php echo base64_encode($fila["rut_proveedor"]); ?>">Eliminar</a></span></strong></center></td>
                            </tr>

                            <?php
                        }
                    }
                    ?>
                </table>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-offset-6">
                            <strong>
                                <a href="botoninicio.php"><input name="btninicio" id="btninicio" type="button" value="Inicio"></a>
                            </strong>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </body>
</html>
