<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location:../Vista/index.html");
} elseif ($_SESSION["TipUsuario"] == 1) {
    header("Location:../Vista/panelAdmin.php");
} elseif ($_SESSION["TipUsuario"] == 2) {
    header("Location:../Vista/paneladministrativo.php");
} elseif ($_SESSION["TipUsuario"] == 3) {
    header("Location:../Vista/panelcalidad.php");
} elseif ($_SESSION["TipUsuario"] == 4) {
    header("Location:../Vista/panelcomercial.php");
} elseif ($_SESSION["TipUsuario"] == 6) {
    header("Location:../Vista/panelinventario.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Documento sin t&iacute;tulo</title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link rel="stylesheet" href="estilosCompras.css">
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>
    </head>
    <body>

        <div class="navbar navbar-right"> 
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
                    <form id="form1" name="form1" method="post">
                        <h2><center>Menú Compras</center></h2>

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <div class="">
                                        <a href="ingresarproveedor.php">
                                            <input class="btn-warning form-control" name="btnaccesoingresarproveedor" type="button" id="btnaccesoingresarproveedor" value="Ingresar proveedor" class="botones"/>
                                        </a>    
                                    </div>
                                </strong> 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <div class="">
                                        <a href="ingresartipoproducto.php">
                                            <input class="btn-warning form-control" name="btnaccesoingresartipoproducto" type="button" value="Ingresar tipo de producto" class="botones"/>
                                        </a>    
                                    </div>
                                </strong> 
                            </div>
                        </div>            

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <div class="">
                                        <a href="listarproveedor.php">
                                            <input class="btn-warning form-control" name="btnaccesolistarproveedores" type="button" id="btnaccesolistarproveedores" value="Listar proveedores" class="botones"/>
                                        </a>    
                                    </div>
                                </strong> 
                            </div>
                        </div>            

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <div class="">
                                        <a href="ingresarcompras.php">
                                            <input class="btn-warning form-control" name="btnaccesocompraproductos" type="button" id="btnaccesocompraproductos" value="Ingresar compra de producto" class="botones"/>
                                        </a>    
                                    </div>
                                </strong> 
                            </div>
                        </div>            

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <div class="">
                                        <a href="listarproductos.php">
                                            <input class="btn-warning form-control" name="btnaccesolistarproductos" type="button" id="btnaccesolistarproductos" value="Listar compra de productos" class="botones"/>
                                        </a>    
                                    </div>
                                </strong> 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <div class="">
                                        <a href="descargardocumento_usuario.php">
                                            <input class="btn-warning form-control" name="btnaccesodescarga" type="button" id="btnaccesodescarga" value="Descargar documento" class="botones"/>
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
                                            <input class="btn-warning form-control" name="btnaccesoreporte" type="button" id="btnaccesoreporte" value="Reportes" class="botones"/>
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
