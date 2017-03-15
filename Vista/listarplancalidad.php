<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location:../Vista/index.html");
} elseif ($_SESSION["TipUsuario"] == 2) {
    header("Location:../Vista/paneladministrativo.php");
} elseif ($_SESSION["TipUsuario"] == 4) {
    header("Location:../Vista/panelcomercial.php");
} elseif ($_SESSION["TipUsuario"] == 5) {
    header("Location:../Vista/panelcompras.php");
} elseif ($_SESSION["TipUsuario"] == 6) {
    header("Location:../Vista/panelinventario.php");
}

require_once ("../Clases/planCalidad.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link href="estilosCalidad.css" rel="stylesheet" type="text/css" />
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
                <h1 align="center"><strong><em>Listar Planes de Calidad</em></strong></h1>
            </div>

            <form id="form1" name="form1" method="post" action="" class="fondo">



                <table class="table table-bordered">
                    <tr>
                        <th><center>Nombre vino</center></th>
                    <th><center>Fecha de creacion</center></th>
                    <th><span><center>Modificar</center></span></th>
                    <th><span><center>Eliminar</center></span></th>
                    </tr>

                    <?php
                    $objCalidad = new planCalidad();
                    $res = $objCalidad->listarPlanCalidad();
                    $num = mysqli_num_rows($res);
                    if ($num == 0) {
                        echo "<font color='white>NO HAY DATOS INGRESADOS</font>";
                    } else {
                        while ($fila = mysqli_fetch_array($res)) {
                            ?>

                            <tr>
                                <td><span><center><?php echo $fila['nombre_vino_planCalidad']; ?></center></span></td>
                                <td><span><center><?php echo $fila['fecha_planCalidad']; ?></center></span></td>
                                <td><span><center><strong><a href="modificarplandecalidad.php?idplancalidad=<?php echo base64_encode($fila["id_planCalidad"]); ?>">Modificar</a></strong></center></span></td>
                                <td><span><center><strong><a onclick="return confirmar()" href="../Controlador/eliminarplandecalidad.php?idplancalidad=<?php echo base64_encode($fila["id_planCalidad"]); ?>">Eliminar</a></strong></center></span></td>
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
    </body>
</html>
