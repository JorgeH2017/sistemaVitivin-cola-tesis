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

require_once ("../Clases/Trabajador.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link href="estilosAdministrativa.css" rel="stylesheet"/>
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
            <div align="right">
                Nombre de usuario: <?= $_SESSION["usuario"]; ?>
                <p align="right">
                    <a href="modificarusuariosimple.php"><input name="btnmodificarperfil" id="btnmodificarperfil" type="button" value="Modificar Perfil Usuario"></a><br>
                    <a href="../Controlador/dologout.php"><input name="btncerrar" id="btncerrar" type="button" value="Cerrar Sesión"></a>  </p> </div>  
            <div class="panel-heading"><h1 align="center"><strong><em>Listar Trabajador</em></strong></h1></div>

            <form id="form1" name="form1" method="post" action="" class="fondo">
                <br>


                <table class="table table-bordered" width="631" border="1">
                    <tr>
                        <th width="38"><center><span class="Estilo10">Rut</span></center></th>
                    <th width="74"><center><span class="Estilo10">Nombres</span></center></th>
                    <th width="75"><center><span class="Estilo10">Apellidos</span></center></th>
                    <th width="149"><center><span class="Estilo10">Puesto de trabajo</center></th>
                    <th width="67"><center><span class="Estilo10">Teléfono</span></center></th>
                    <th width="93"><center><span class="Estilo10">Modificar</span></center></th>
                    <th width="89"><center><span class="Estilo10">Eliminar</span></center></th>
                    </tr>

                    <?php
                    $objTrabajador = new Trabajador();
                    $res = $objTrabajador->listarTrabajador();
                    $num = mysqli_num_rows($res);
                    if ($num == 0) {
                        echo "<font color='white'>NO HAY DATOS INGRESADOS</font>";
                    } else {
                        while ($fila = mysqli_fetch_array($res)) {
                            ?>

                            <tr>
                                <td><span></span><center><?php echo $fila["rut_trabajador"]; ?></center></td>
                            <td><span></span><center><?php echo $fila["nombre_trabajador"]; ?></center></td>   
                            <td><span></span><center><?php echo $fila["apellidos_trabajador"]; ?></center></td>
                            <td><span></span><center><?php echo $fila["nombre_puestoTrabajo"]; ?></center> </td>
                            <td><span></span><center><?php echo $fila["telefono_trabajador"]; ?></center></td>
                            <td><center><strong><a href="modificartrabajador.php?ruttrab=<?php echo base64_encode($fila["rut_trabajador"]); ?>">Modificar</a></strong></center></td>
                            <td><span><center><strong><a onclick="return confirmar()" href="../Controlador/eliminartrabajador.php?ruttrabajador=<?php echo base64_encode($fila["rut_trabajador"]); ?>">Eliminar</a></strong></center></span></td>
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
                                <a href="botoninicio.php"><span><input name="btninicio" id="btninicio"  type="button" value="Inicio"></span></a>
                            </strong>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </body>
</html>
