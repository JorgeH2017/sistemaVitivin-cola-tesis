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

<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link href="estilosAdministrativa.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>
        <script src="../Vista/Javascript/validarSocio.js"></script>

    </head>
    <body>

        <div class="container-fluid">
            <br>
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <br>
                    <div align="right">
                        Nombre de usuario: <?= $_SESSION["usuario"]; ?>
                        <p align="right">
                            <a href="modificarusuariosimple.php"><input name="btnmodificarperfil" id="btnmodificarperfil" type="button" value="Modificar Perfil Usuario"></a><br>
                            <a href="../Controlador/dologout.php"><input name="btncerrar" id="btncerrar" type="button" value="Cerrar Sesión"></a>  </p> </div>  
                    <h1 align="center"><strong><em>Ingresar Socio</em></strong></h1>
                    <br>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" id="form1" name="form1" method="post" action="../Controlador/control_socio.php" onsubmit="return validarSocio()">
                        <br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong> 
                                        <input class="form-control" name="txtrutsocio" type="text" id="txtrutsocio" placeholder="Dni ej: 99999999R"/>
                                    </strong> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row centered-form">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>                 
                                        <input class="form-control" name="txtnombresocio" type="text" id="txtnombresocio" placeholder="Nombres"  />
                                    </strong>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row centered-form">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>
                                        <input class="form-control" name="txtapellidossocio" type="text" id="txtapellidossocio" placeholder="Apellidos" />
                                    </strong>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>
                                        <input class="form-control" name="txttelefonosocio" type="text" id="txttelefonosocio" placeholder="Teléfono ej: 988875898" />
                                    </strong>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>
                                        <input class="form-control" name="txtcorreosocio" type="email" id="txtcorreosocio" placeholder="Correo" />
                                    </strong>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>
                                        <input class="form-control" name="txtdireccionsocio" type="text" id="txtdireccionsocio" placeholder="Dirección"/>
                                    </strong>

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-offset-4">
                                    <strong>
                                        <input  class="btn-primary"  name="btningresosocio" type="submit" id="btningresosocio" value="Ingresar" />
                                        <a href="botoninicio.php"><input name="btninicio" id="btninicio" type="button" value="Volver"></a>
                                    </strong>

                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
