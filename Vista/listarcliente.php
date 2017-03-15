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

require_once ("../Clases/Cliente.php")
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link href="estilosComercial.css" rel="stylesheet"/>
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
            <div class="panel-heading">
                <div align="right">
                    Nombre de usuario: <?= $_SESSION["usuario"]; ?>
                    <p align="right">
                        <a href="modificarusuariosimple.php"><input name="btnmodificarperfil" id="btnmodificarperfil" type="button" value="Modificar Perfil Usuario"></a><br>
                        <a href="../Controlador/dologout.php"><input name="btncerrar" id="btncerrar" type="button" value="Cerrar Sesión"></a>  </p> </div>  
                <h1 align="center"><strong><em>Listar Cliente</em></strong></h1>
            </div>
            <br>
            <form id="form1" name="form1" method="post" action="listarcliente" class="fondo"> 


                <table class="table table-bordered" width="600" border="3" cellspacing="5">
                    <tr>
                        <th width="82"><center><span class="Estilo9">Rut</span></center></th>
                    <th width="99"><center><span class="Estilo9">Nombres</span></center></th>
                    <th width="96"><center><span class="Estilo9">Apellidos</span></center></th>
                    <th width="94"><center><span class="Estilo9">Tel&eacute;fono</span></center></th>
                    <th width="85"><center><span class="Estilo9">Modificar</span></center></th>
                    <th width="87"><center><span class="Estilo9">Eliminar</span></center></th>
                    </tr>

                    <?php
                    $objClie = new Cliente();
                    $res = $objClie->listarCliente();
                    $num = mysqli_num_rows($res);
                    if ($num == 0) {
                        echo "<font color='white>NO HAY DATOS INGRESADOS</font>";
                    } else {
                        while ($fila = mysqli_fetch_array($res)) {
                            ?>

                            <tr>
                                <td><center><span><?php echo ($fila["rut_cliente"]); ?></span></center></td>
                            <td><center><span><?php echo ($fila["nombre_cliente"]); ?></span></center></td>
                            <td><center><span><?php echo ($fila["apellidos_cliente"]); ?></span></center></td>
                            <td><center><span><?php echo ($fila["telefono_cliente"]); ?></span></center></td>
                            <td><center><span><strong><a href="modificarcliente.php?rutcliente=<?php echo base64_encode($fila["rut_cliente"]); ?>">Modificar</a></strong></span></center></td>
                <td><center><span><strong><a onclick="return confirmar()" href="../Controlador/eliminarcliente.php?rutcliente=<?php echo base64_encode($fila["rut_cliente"]); ?>">Eliminar</a></strong></span></center></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
                <br>
                <br>

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
