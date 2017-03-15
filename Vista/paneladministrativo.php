<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location:../Vista/index.html");
} elseif ($_SESSION["TipUsuario"] == 1) {
    header("Location:../Vista/panelAdmin.php");
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
        <title>Documento sin t&iacute;tulo</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link rel="stylesheet" href="estilosAdministrativa.css">
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>

    </head>
    <body>

        <div class="navbar navbar-right" role="navigation">
            Nombre de usuario: <?= $_SESSION["usuario"]; ?>
            <p align="right">
                <a href="modificarusuariosimple.php"><input name="btnmodificarperfil" id="btnmodificarperfil" type="button" value="Modificar Perfil Usuario"></a><br>
                <a href="../Controlador/dologout.php"><input name="btncerrar" id="btncerrar" type="button" value="Cerrar Sesión"></a>  </p> </div>  
        <br><br><br>
        <div class="container-fluid">
            <br>
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <br>
                    <h1 align="center"><strong><em>Sistema Vitivinícola</em></strong></h1>
                    <br>
                </div>

                <div class="panel-body">

                    <form id="form1" name="form1" method="post" action="">

                        <h2><center>Menú Administración</center></h2>

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <div class="">
                                        <a href="ingresarsocio.php">
                                            <input class="btn-primary form-control" name="btnaccesoingresosocio" type="button" id="btnaccesoingresosocio" value="Ingresar socio" class="botones"/>
                                        </a>
                                    </div>
                                </strong> 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <div class="">
                                        <a href="listarsocio.php">
                                            <input class="btn-success form-control" name="btnaccesolistarsocio" type="button" id="btnaccesolistarsocio" value="Listar socio" class="botones"/>
                                        </a>
                                    </div>
                                </strong> 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <div class="">
                                        <a href="ingresarpuestotrabajador.php">
                                            <input class="btn-info form-control" name="btnaccesopuestotrabajo" type="button" id="btnaccesopuestotrabajo" value="Ingresar puesto de trabajo" class="botones"/>
                                        </a>
                                    </div>
                                </strong> 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <div class="">
                                        <a href="ingresartrabajador.php">
                                            <input class="btn-warning form-control" name="btnaccesoingresotrabajador" type="button" id="btnaccesoingresotrabajador" value="Ingresar trabajador" class="botones"/>
                                        </a>
                                    </div>
                                </strong> 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <div class="">
                                        <a href="listartrabajador.php">
                                            <input class="btn-danger form-control" name="btnaccesolistartrabajador" type="button" id="btnaccesolistartrabajador" value="Listar trabajador" class="botones"/>
                                        </a>
                                    </div>
                                </strong> 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <div class="">
                                        <a href="subirdocumento.php">
                                            <input class="btn-primary form-control" name="btnaccesosubirdocumento" type="button" id="btnaccesosubirdocumento" value="Subir documento" class="botones"/>
                                        </a>
                                    </div>
                                </strong> 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <div class="">
                                        <a href="descargardocumento.php">
                                            <input class="btn-success form-control" name="btnaccesodescarga" type="button" id="btnaccesodescarga" value="Descargar documento" class="botones"/>
                                        </a>
                                    </div>
                                </strong> 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <div class="">
                                        <a href="panelreportes.php">
                                            <input class="btn-success form-control" name="btnaccesoreporte" type="button" id="btnaccesoreporte" value="Reportes" class="botones"/>
                                        </a>
                                    </div>
                                </strong> 
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
