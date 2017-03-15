<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location:../Vista/index.html");
} elseif ($_SESSION["TipUsuario"] == 2) {
    header("Location:../Vista/paneladministrativo.php");
} elseif ($_SESSION["TipUsuario"] == 4) {
    header("Location:../Vista/panelcomercial.php");
} elseif ($_SESSION["TipUsuario"] == 5) {
    header("Location:../Vista/panelcompras.php");
} elseif ($_SESSION["TipUsuario"] == 6) {
    header("Location:../Vista/panelinventario.php");
}

require_once ("../Clases/planCalidad.php");

$idplancalidad = base64_decode(filter_input(INPUT_GET, 'idplancalidad'));
$_SESSION["idplancalidad"] = $idplancalidad;

$objCalidad = new planCalidad();
$res = $objCalidad->listarDesdeId($idplancalidad);
$fila = mysqli_fetch_array($res);

require_once("../Controlador/require_modificarCalidad.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link href="estilosCalidad.css" rel="stylesheet" type="text/css" />
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>
        <script src="../Vista/Javascript/validarCalidad.js"></script>
    </head>
    <body>

        <div class="container-fluid">
            <br>
            <div class="panel panel-info">

                <div class="panel-heading">
                    <div align="right">
                        Nombre de usuario:<?= $_SESSION["usuario"]; ?>
                        <p align="right">
                            <a href="modificarusuariosimple.php"><input name="btnmodificarperfil" id="btnmodificarperfil" type="button" value="Modificar Perfil Usuario"></a><br>
                            <a href="../Controlador/dologout.php"><input name="btncerrar" id="btncerrar" type="button" value="Cerrar Sesión"></a>  </p> </div>  
                    <h1 align="center"><strong><em>Modificar Plan de Calidad</em></strong></h1>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" id="form1" name="form1" method="post" action="../Controlador/control_calidad2.php" onsubmit="return validarCalidad()">

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Nombre del vino:</label>
                                    <input class="form-control" name="txtvinocalidad" type="text" id="txtvinocalidad" value="<?php echo $fila["nombre_vino_planCalidad"]; ?>"/>          
                                </strong> 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Estabilizaci&oacute;n por frío:</label>
                                    <input class="form-control" name="txtestabilidad" type="text" id="txtestabilidad" value="<?php echo $fila1["descr_propiedadCalidad"]; ?>"/>          
                                </strong> 
                            </div>
                        </div>                

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Estabilidad frente al calor:</label>
                                    <input class="form-control" name="txtestabilidadcalor" type="text" id="txtestabilidadcalor" value="<?php echo $fila2["descr_propiedadCalidad"]; ?>"/>          
                                </strong> 
                            </div>
                        </div>              

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Nivel de metales:</label>
                                    <input class="form-control" name="txtnivelmetal" type="text" id="txtnivelmetal" value="<?php echo $fila3["descr_propiedadCalidad"]; ?>"/>           
                                </strong> 
                            </div>
                        </div>       

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Tendencia a la oxidaci&oacute;n:</label>
                                    <input class="form-control" name="txtoxidacion" type="text" id="txtoxidacion" value="<?php echo $fila4["descr_propiedadCalidad"]; ?>"/>          
                                </strong> 
                            </div>
                        </div>      

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Estabilidad microbiol&oacute;gica:</label>
                                    <input class="form-control" name="txtestabilidadmicro" type="text" id="txtestabilidadmicro" value="<?php echo $fila5["descr_propiedadCalidad"]; ?>" />          
                                </strong> 
                            </div>
                        </div>        

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >S&oacute;lidos solubles totales:</label>
                                    <input class="form-control" name="txtsolubles" type="text" id="txtsolubles" value="<?php echo $fila6["descr_propiedadCalidad"]; ?>"/>             
                                </strong> 
                            </div>
                        </div>   

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Medida hidrom&eacute;trica:</label>
                                    <input class="form-control" name="txthidro" type="text" id="txthidro"  value="<?php echo $fila7["descr_propiedadCalidad"]; ?>" />             
                                </strong> 
                            </div>
                        </div>   

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Nivel de PH:</label>
                                    <input class="form-control" name="txtph" type="text" id="txtph" value="<?php echo $fila8["descr_propiedadCalidad"]; ?>" />             
                                </strong> 
                            </div>
                        </div>      

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Nivel de alcohol:</label>
                                    <input class="form-control" name="txtalcohol" type="text" id="txtalcohol"  value="<?php echo $fila9["descr_propiedadCalidad"]; ?>" />               
                                </strong> 
                            </div>
                        </div>      

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Nivel de acidez:</label>
                                    <input class="form-control" name="txtacidez" type="text" id="txtacidez" value="<?php echo $fila10["descr_propiedadCalidad"]; ?>"/>             
                                </strong> 
                            </div>
                        </div>  

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Nivel de acidez titulable:</label>
                                    <input class="form-control" name="txtacideztitu" type="text" id="txtacideztitu" value="<?php echo $fila11["descr_propiedadCalidad"]; ?>"/>             
                                </strong> 
                            </div>
                        </div>      

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Nivel de acidez vol&aacute;til:</label>
                                    <input class="form-control" name="txtacidezvol" type="text" id="txtacidezvol"  value="<?php echo $fila12["descr_propiedadCalidad"]; ?>"/>             
                                </strong> 
                            </div>
                        </div>      

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Nivel de hierro:</label>
                                    <input class="form-control" name="txthierro" type="text" id="txthierro" value="<?php echo $fila13["descr_propiedadCalidad"]; ?>"/>             
                                </strong> 
                            </div>
                        </div>     

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Nivel de magnesio: </label>
                                    <input class="form-control" name="txtmagnesio" type="text" id="txtmagnesio" value="<?php echo $fila14["descr_propiedadCalidad"]; ?>" />             
                                </strong> 
                            </div>
                        </div>         

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Nivel de calcio: </label>
                                    <input class="form-control" name="txtcalcio" type="text" id="txtcalcio" value="<?php echo $fila15["descr_propiedadCalidad"]; ?>"/>            
                                </strong> 
                            </div>
                        </div>   

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Nivel de potasio: </label>
                                    <input class="form-control" name="txtpotasio" type="text" id="txtpotasio" required value="<?php echo $fila16["descr_propiedadCalidad"]; ?>"/>             
                                </strong> 
                            </div>
                        </div>  

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Nivel de sodio:</label>
                                    <input class="form-control" name="txtsodio" type="text" id="txtsodio" value="<?php echo $fila17["descr_propiedadCalidad"]; ?>"/>             
                                </strong> 
                            </div>
                        </div>        

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label" >Color:</label>
                                    <input class="form-control" name="txtcolor" type="text" id="txtcolor" value="<?php echo $fila18["descr_propiedadCalidad"]; ?>"/>             
                                </strong> 
                            </div>
                        </div>       

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <div class="">
                                        <input class="btn-primary form-control" name="btnmodificarcalidad" type="submit" id="btnmodificarcalidad" value="Modificar" />
                                    </div>
                                </strong> 
                            </div>
                        </div>     

                        <div class="panel-footer">
                            <div class="col-lg-offset-4">
                                <a href="botoninicio.php"><input name="btninicio" id="btninicio" type="button" value="Inicio"></a>
                                <a href="listarplancalidad.php"><input name="btnatras" id="btnatras" type="button" value="Volver"></a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
