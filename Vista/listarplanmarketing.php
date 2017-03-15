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

require_once ("../Clases/planMarketing.php")
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
                <h1 align="center"><strong><em>Listar Planes de Marketing</em></strong></h1>
            </div>

            <form id="form1" name="form1" method="post" action="listarplanmarketing.php">


                <table class="table table-bordered" width="516" border="1" align="center">';
                    <tr>
                        <th width="131"><center>Nombre Plan</center></th>
                    <th width="156"><center><span>Fecha de creacion </span></center></th>
                    <th width="116"><center><span>Modificar</span></center></th>
                    <th width="85"><center><span>Eliminar</span></center></th>
                    </tr>

                    <?php
                    $objMarketing = new planMarketing();
                    $res = $objMarketing->listarPlanMarketing();
                    $num = mysqli_num_rows($res);
                    if ($num == 0) {
                        echo "<font color='white'>NO HAY DATOS INGRESADOS</font>";
                    } else {
                        while ($fila = mysqli_fetch_array($res)) {
                            ?>

                            <tr>
                                <td><center><?php echo $fila['nombre_planMarketing']; ?></center></td>
                            <td><center><?php echo $fila['fecha_planMarketing']; ?> </center></td>
                            <td><strong><center><a href="modificarplanmarketing.php?idplanmarketing=<?php echo base64_encode($fila["id_planMarketing"]); ?>">Modificar</a></center></strong></td>
                            <td><strong><center><a onclick="return confirmar()" href="../Controlador/eliminarplanmarketing.php?idplanmarketing=<?php echo base64_encode($fila["id_planMarketing"]); ?>">Eliminar</a></center></strong></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
                <br>
                <br>

                <div class="form-group">
                    <div class="col-lg-offset-6">
                        <strong>
                            <a href="botoninicio.php"><input name="btninicio" id="btninicio" type="button" value="Inicio"></a>
                        </strong>
                    </div>

                </div>

            </form>
        </div>
    </body>
</html>
