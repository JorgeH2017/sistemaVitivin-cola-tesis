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

require_once("../Clases/Documento.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link href="estilosAdministrativa.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
            <!--
            -->
        </style>
        <script type="text/javascript">
            <!--
 function confirmar() {
                if (!confirm("Desea eliminar este archivo?"))
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
            <div class="panel-heading">
                <h1 align="center"><strong><em>Descarga Documento</em></strong></h1>
            </div>
            <form>

                <table class="table table-bordered" width="379" border="1" align="center">
                    <tr>
                        <th width="162"><center><span>Nombre Documento </span></center></th>
                    <th width="101"><center><span>Fecha de Subida</span></center></th>
                    <th width="94"><center><span>Descargar</span></center></th>
                    <th width="94"><center><span>Eliminar</span></center></th>
                    </tr>

                    <?php
                    $objDocu = new Documento();
                    $res = $objDocu->listarDocumentoPorFecha();
                    $num = mysqli_num_rows($res);
                    if ($num == 0) {
                        echo "<font color='white'>NO HAY ARCHIVOS SUBIDOS</font>";
                    } else {
                        while ($fila = mysqli_fetch_array($res)) {
                            ?>

                            <tr>
                                <td><span></span><center><?php echo $fila["nombre_documento"]; ?></center></td>
                            <td><span></span><center><?php echo $fila["fecha_creacion"]; ?></center></td>
                            <td><span><center><strong><a href="../Controlador/download.php?iddocumento=<?php echo base64_encode($fila["id_documento"]); ?>">Descargar</a></strong></center></span></td>
                            <td><span><center><strong><a onclick="return confirmar()" href="../Controlador/eliminardescarga.php?iddocumento=<?php echo base64_encode($fila["id_documento"]); ?>">Eliminar</a></strong></center></span></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
                <p align="center" class="Estilo1">&nbsp;</p>

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
