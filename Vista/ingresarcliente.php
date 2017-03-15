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
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link href="estilosComercial.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>
        <script src="../Vista/Javascript/validarCliente.js"></script>

    </head>
    <body>

        <div class="container-fluid">
            <br>
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <div align="right">
                        Nombre de usuario: <?= $_SESSION["usuario"]; ?>
                        <p align="right">
                            <a href="modificarusuariosimple.php"><input name="btnmodificarperfil" id="btnmodificarperfil" type="button" value="Modificar Perfil Usuario"></a><br>
                            <a href="../Controlador/dologout.php"><input name="btncerrar" id="btncerrar" type="button" value="Cerrar Sesión"></a>  </p> </div>  
                    <br>
                    <h1 align="center"><strong> <em>Ingresar Cliente</em></strong></h1>
                    <br>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" action="../Controlador/control_cliente.php" method="post" name="form1" id="form1" onsubmit="return validarCliente()">

                        <div class="form-group">
                            <div class="row centered-form">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>    
                                        <input class="form-control" name="txtrutcliente" type="text" id="txtrutcliente" value="" placeholder="Dni ej: 99999999R" />
                                    </strong>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row centered-form">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>                 
                                        <input class="form-control" name="txtnombrecliente" type="text" id="txtnombrecliente" placeholder="Nombres"/>
                                    </strong>
                                </div>
                            </div>
                        </div>    

                        <div class="form-group">
                            <div class="row centered-form">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>                 
                                        <input class="form-control" name="txtapellidocliente" type="text" id="txtapellidocliente" placeholder="Apellidos"/>
                                    </strong>
                                </div>
                            </div>
                        </div>    

                        <div class="form-group">
                            <div class="row centered-form">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>                 
                                        <input class="form-control" name="txttelefonocliente" type="tel" id="txttelefonocliente" placeholder="Teléfono ej: 988875898"/>
                                    </strong>
                                </div>
                            </div>
                        </div>    

                        <div class="form-group">
                            <div class="row centered-form">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>                 
                                        <input class="form-control" name="txtcorreocliente" type="email" id="txtcorreocliente" placeholder="Correo"/>
                                    </strong>
                                </div>
                            </div>
                        </div>    

                        <div class="form-group">
                            <div class="row centered-form">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>                 
                                        <input class="form-control" name="txtdireccioncliente" type="text" id="txtdireccioncliente" placeholder="Dirección"/>
                                    </strong>
                                </div>
                            </div>
                        </div>        

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-offset-4">
                                    <strong>
                                        <input  class="btn-primary"  name="btningresarcliente" type="submit" id="btningresarcliente" value="Ingresar"/>
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
