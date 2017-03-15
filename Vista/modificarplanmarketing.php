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

require_once ("../Clases/planMarketing.php");

$idplanmarketing = base64_decode(filter_input(INPUT_GET, 'idplanmarketing'));
$_SESSION["idplanmarketing"] = $idplanmarketing;

$objMarketing = new planMarketing();
$res = $objMarketing->listarDesdeId($idplanmarketing);
$fila = mysqli_fetch_array($res);

require_once ("../Controlador/require_modificarMarketing.php");
?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
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
                <h1 align="center"><strong><em>Modificar Plan de Marketing</em></strong></h1>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form1" name="form1" method="post" action="../Controlador/control_marketing2.php" onsubmit="return validarMarketing()">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Nombre del Plan:</label>
                                    <input class="form-control" name="txtnombreplanmarketing" type="text" id="txtnombreplanmarketing" value="<?php echo $fila["nombre_planMarketing"]; ?>" size="40" />
                                </strong> 
                            </div>
                        </div>
                    </div>    

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Situaci&oacute;n Actual:</label>
                                    <textarea class="form-control" rows="2" name="txtsituacionactual" id="txtsituacionactual"><?php echo $fila1["descr_propiedadMarketing"]; ?></textarea>
                                </strong> 
                            </div>
                        </div>
                    </div>    

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Objetivos:</label>

                                    <textarea class="form-control" rows="2" name="txtobjetivos" id="txtobjetivos"><?php echo $fila2["descr_propiedadMarketing"]; ?></textarea>

                                </strong> 
                            </div>
                        </div>
                    </div>    

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label">Estrategia a seguir:</label>
                                    <textarea class="form-control" rows="2" name="txtestrategia" id="txtestrategia"><?php echo $fila3["descr_propiedadMarketing"]; ?></textarea>
                                </strong> 
                            </div>
                        </div>
                    </div>    

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Plan de acci&oacute;n:</label>
                                    <textarea class="form-control" rows="3" name="txtplanaccion"id="txtplanaccion"><?php echo $fila4["descr_propiedadMarketing"]; ?></textarea>
                                </strong> 
                            </div>
                        </div>
                    </div>        

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Presupuesto:</label>
                                    <textarea class="form-control" rows="1" name="txtpresupuesto" id="txtpresupuesto"><?php echo $fila5["descr_propiedadMarketing"]; ?></textarea>
                                </strong> 
                            </div>
                        </div>
                    </div>        

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >M&eacute;todo de control:</label>
                                    <textarea class="form-control" rows="2" name="txtmetodocontrol" id="txtmetodocontrol"><?php echo $fila6["descr_propiedadMarketing"]; ?></textarea>
                                </strong> 
                            </div>
                        </div>
                    </div>        

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <div class="">
                                        <input class="btn-primary form-control" name="btnmodificarplanmarketing" type="submit" id="btnmodificarplanmarketing" value="Modificar" />
                                    </div>
                                </strong> 
                            </div>
                        </div>
                    </div>                      

                    <div class="panel-footer">
                        <div class="col-lg-offset-4">
                            <a href="botoninicio.php"><input name="btninicio" id="btninicio" type="button" value="Inicio"></a>
                            <a href="listarplanmarketing.php"><input name="btnatras" id="btnatras" type="button" value="Volver"></a>


                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</body>
</html>
