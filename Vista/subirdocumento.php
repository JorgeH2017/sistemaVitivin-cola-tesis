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

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <title></title>
        <link href="estilosAdministrativa.css" rel="stylesheet" type="text/css" />
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>

        <script src="../Vista/Javascript/validarDocumento.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <br>
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <br>
                    <div align="right">
                        Nombre de usuario:<?= $_SESSION["usuario"]; ?>
                        <p align="right">
                            <a href="modificarusuariosimple.php"><input name="btnmodificarperfil" id="btnmodificarperfil" type="button" value="Modificar Perfil Usuario"></a><br>
                            <a href="../Controlador/dologout.php"><input name="btncerrar" id="btncerrar" type="button" value="Cerrar Sesión"></a>  </p> </div>  
                    <h1 align="center"><strong><em>Subir Documento</em></strong></h1>
                    <br>
                </div>

                <div class="panel-body">

                    <form id="form1" name="form1" enctype="multipart/form-data" method="post" action="../Controlador/upload.php" onsubmit="return validarDocumento()">

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label col-md-0" >Seleccione archivo:</label>
                                    <label class="control-label col-md-offset-0">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="52428800" />
                                        <input class="form-control"  name="archivo[]" type="file" id="archivo" multiple=""/>  
                                        <input class="btn-primary form-control"  name="btnsubirarchivo" type="submit" id="btnsubirarchivo" value="Subir archivo" />
                                    </label>
                                </strong> 
                            </div>
                        </div>      

                    </form>
                    <div class="panel-footer">
                        <div class="col-lg-offset-5">
                            <a href="botoninicio.php"><input name="btninicio" type="button" value="Inicio"> </a>
                        </div></div> 
                </div>
            </div>
        </div>
    </body>
</html>
