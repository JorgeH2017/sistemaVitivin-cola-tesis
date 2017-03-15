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

        <script src="../Vista/Javascript/validarMarketing.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <br>
            <div class="panel panel-info">

                <div class="panel-heading">
                    <div align="right">
                        Nombre de usuario: <?= $_SESSION["usuario"]; ?>
                        <p align="right">
                            <a href="modificarusuariosimple.php"><input name="btnmodificarperfil" id="btnmodificarperfil" type="button" value="Modificar Perfil Usuario"></a><br>
                            <a href="../Controlador/dologout.php"><input name="btncerrar" id="btncerrar" type="button" value="Cerrar Sesión"></a>  </p> </div>  
                    <h1 align="center"><strong><em>Crear Plan de Marketing</em></strong></h1>
                </div>  

                <div class="panel-body">
                    <form class="form-horizontal" id="form1" name="form1" method="post" action="../Controlador/control_marketing.php" onsubmit="return validarMarketing()">
                        <br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <strong>           
                                        <input name="txtnombreplanmarketing" type="text" id="txtnombreplanmarketing" placeholder="Nombre del Plan"/>
                                    </strong> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>       
                                        <textarea class="form-control" name="txtsituacionactual" cols="80" rows="3" id="txtsituacionactual" placeholder="Situación Actual"></textarea>
                                    </strong> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>       
                                        <textarea class="form-control" name="txtobjetivos" cols="80" rows="3" id="txtobjetivos" placeholder="Objetivos"></textarea>
                                    </strong> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>       
                                        <textarea class="form-control" name="txtestrategia" cols="80" rows="3" id="txtestrategia" placeholder="Estrategia a seguir"></textarea>
                                    </strong> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>       
                                        <textarea class="form-control" name="txtplanaccion" cols="80" rows="3" id="txtplanaccion" placeholder="Plan de acción"></textarea>
                                    </strong> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>       
                                        <textarea class="form-control" name="txtpresupuesto" cols="80" rows="2" id="txtpresupuesto" placeholder="Presupuesto"></textarea>
                                    </strong> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong>       
                                        <textarea class="form-control" name="txtmetodocontrol" cols="80" rows="3" id="txtmetodocontrol" placeholder="Método de control"></textarea>
                                    </strong> 
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="form-group">
                            <div class="col-lg-offset-4">
                                <strong>
                                    <input class="btn-primary" name="btncrearplanmarketing" type="submit" id="btncrearplanmarketing" value="Crear" />
                                    <a href="botoninicio.php"><input name="btninicio" id="btninicio" type="button" value="Volver"></a>  
                                </strong>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
