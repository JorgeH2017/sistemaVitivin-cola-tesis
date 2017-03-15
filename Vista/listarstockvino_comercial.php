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

require_once ("../Clases/Inventario.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>
        <link href="estilosInventario.css" rel="stylesheet"/>

    </head>
    <body>
        <br>
        <div class="container-fluid">
            <br>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div align="right">
                        Nombre de usuario: <?= $_SESSION["usuario"]; ?>
                        <p align="right">
                            <a href="modificarusuariosimple.php"><input name="btnmodificarperfil" id="btnmodificarperfil" type="button" value="Modificar Perfil Usuario"></a><br>
                            <a href="../Controlador/dologout.php"><input name="btncerrar" id="btncerrar" type="button" value="Cerrar Sesión"></a>  </p> </div>  
                    <h1 align="center"><strong><em>Listar Stock de Vinos</em></strong></h1>
                </div>
            </div>
            <form id="form1" name="form1" method="post" action="listarstockvino.php">
                <br><br>
                <table class="table table-bordered">
                    <tr>
                        <th width="130"><center><span>Nombre</span></center></th>
                    <th width="132"><center><p>Cantidad</p></center></th>
                    </tr>

                    <?php
                    $objInv = new Inventario();
                    $res = $objInv->listarVino();
                    $num = mysqli_num_rows($res);
                    if ($num == 0) {
                        echo "no hay datos ingresados";
                    } else {
                        while ($fila = mysqli_fetch_array($res)) {
                            ?>


                            <tr>
                                <td><span><center><?php echo $fila['nombre_vino']; ?></center></span></td>
                                <td><span><center><?php echo $fila['cantidad_vino']; ?></center></span></td>
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
