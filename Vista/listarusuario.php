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
} elseif ($_SESSION["TipUsuario"] == 5) {
    header("Location:../Vista/panelcompras.php");
} elseif ($_SESSION["TipUsuario"] == 6) {
    header("Location:../Vista/panelinventario.php");
}

require_once ("../Clases/Usuario.php");
?>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link href="estilosUsuario.css" rel="stylesheet" type="text/css" />
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
            <div class="panel-heading"><h1 align="center"><strong><em>Listar Usuarios</em></strong></h1></div>

            <form id="form1" name="form1" method="post" action="listarusuario" class="fondo">


                <table class="table table-bordered" width="574" border="1">
                    <tr>
                        <th><center><span>Nombre de usuario</span></center></th>
                    <th><center>Nombre</center></th>
                    <th><center>Tipo usuario</center></th>
                    <th><center>Modificar</center></th>
                    <th><center>Modificar Correo</center></th>
                    <th><center>Eliminar</center></th>
                    </tr>

                    <?php
                    $objUsuario = new Usuario();
                    $res = $objUsuario->listarUsuario();
                    $num = mysqli_num_rows($res);
                    if ($num == 0) {
                        echo "<font color='white'>NO HAY DATOS INGRESADOS</font>";
                    } else {
                        while ($fila = mysqli_fetch_array($res)) {
                            ?>
                            <tr> 
                                <td><center><span><?php echo $fila["nombre_usuario"]; ?></span></center></td>
                            <td><center><span><?php echo $fila["nombre"]; ?></span></center></td>
                            <td><center><span><?php echo $fila["nombre_tipoUsuario"]; ?></span></center></td>
                            <td><center><strong><span><a href="modificarusuario.php?idusuario=<?php echo base64_encode($fila["id_usuario"]); ?>">Modificar</a></span> </strong></center></td>
                            <td><center><strong><span><a href="modificarcorreo.php?idusuario=<?php echo base64_encode($fila["id_usuario"]); ?>">Modificar Correo</a></span> </strong></center></td>
                            <td><center><strong><span><a onclick="return confirmar()" href="../Controlador/eliminarusuario.php?idusuario=<?php echo $fila["id_usuario"]; ?>">Eliminar</a></span> </strong></center></td>

                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
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
