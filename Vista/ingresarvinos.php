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
}
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <title></title>
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
            <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>
            <link href="estilosInventario.css" rel="stylesheet"/>

            <script src="../Vista/Javascript/validarInventario.js"></script>
        </head>
        <body>
            <br><br><br>       
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
                    <h1 align="center"><strong> <em>Ingresar Vinos</em></strong></h1>
                    <br>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" id="form1" name="form1" method="post" action="../Controlador/control_inventario.php" onsubmit="return validarInventario()">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong> 
                                        <input class="form-control" name="txtnombrevino" type="text" id="txtnombrevino" placeholder="Nombre Vino"/>
                                    </strong> 
                                </div>
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong> 
                                        <input class="form-control" name="txtcantidadvino" type="text" id="txtcantidadvino" placeholder="Cantidad" />
                                    </strong> 
                                </div>
                            </div>
                        </div>               

                        <div class="form-group">
                            <div class="col-lg-offset-4">
                                <strong>
                                    <input class="btn-primary" name="btningresarvino" type="submit" id="btningresarvino" value="Ingresar" />
                                    <a href="botoninicio.php"><input name="btninicio" id="btninicio" type="button" value="Inicio"></a>      
                                </strong>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
