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

            <div class="panel-heading">
                <div align="right">
                    Nombre de usuario: <?= $_SESSION["usuario"]; ?>
                    <p align="right">
                        <a href="modificarusuariosimple.php"><input name="btnmodificarperfil" id="btnmodificarperfil" type="button" value="Modificar Perfil Usuario"></a><br>
                        <a href="../Controlador/dologout.php"><input name="btncerrar" id="btncerrar" type="button" value="Cerrar Sesión"></a>  </p> </div>  
                <h1 align="center"><strong><em>Listar Socios</em></strong></h1>
            </div>


            <br>

            <table class="table table-bordered" border="3" align="center">
                <tr>
                    <th width = "85"><center><span>Nombres</span></center></th>
                <th width = "76"><center><span>Correo</span></center></th>
                <th width = "88"><center><span>Teléfono</span></center></th>
                <th width = "76"><center><span>Modificar</span></center></th>
                <th width = "73"><center><span>Eliminar</span></center></th>
                </tr>

                <?php
                $objSocio = new Socio();
                $res = $objSocio->listarSocio();
                $num = mysqli_num_rows($res);
                if ($num == 0) {
                    echo "<font color='white'>NO HAY DATOS INGRESADOS</font>";
                } else {

                    while ($fila = mysqli_fetch_array($res)) {
                        ?>

                        <tr>
                            <td><center><?php echo $fila["nombre_socio"]; ?></center></td>
                        <td><center><?php echo $fila["correo_socio"]; ?></center></td>
                        <td><center><?php echo $fila["telefono_socio"]; ?></center></td>
                        <td><center><strong><a href="modificarsocio.php?rutsocio=<?php echo base64_encode($fila["rut_socio"]); ?>">Modificar</a></strong></center></td>
                        <td><center><strong><a onclick="return confirmar()" href="../Controlador/eliminarsocio.php?rutsocio=<?php echo base64_encode($fila["rut_socio"]); ?>">Eliminar</a></strong></center></td>
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



        </div>
    </body>
</html>
