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
                        Nombre de usuario: <?= $_SESSION["usuario"]; ?>
                        <p align="right">
                            <a href="modificarusuariosimple.php"><input name="btnmodificarperfil" id="btnmodificarperfil" type="button" value="Modificar Perfil Usuario"></a><br>
                            <a href="../Controlador/dologout.php"><input name="btncerrar" id="btncerrar" type="button" value="Cerrar Sesión"></a>  </p> </div>  
                    <h1 align="center"><strong><em>Crear Plan de Calidad</em></strong></h1>
                </div>  

                <div class="panel-body">
                    <form class="form-horizontal" id="form1" name="form1" method="post" action="../Controlador/control_calidad.php" onsubmit="return validarCalidad()" class="fondo2">

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong>           
                                    <input class="form-control" name="txtvinocalidad" type="text" id="txtvinocalidad" placeholder="Nombre del vino"/>
                                </strong> 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong>           
                                    <input class="form-control"  name="txtestabilidad" type="text" id="txtestabilidad" placeholder="Estabilización por frío" class="texto"/>      
                                    <input class="form-control"  name="txtestabilidadcalor" type="text" id="txtestabilidadcalor" placeholder="Estabilidad frente al calor" class="texto"/>
                                </strong> 
                            </div>
                        </div>            

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong>           
                                    <input class="form-control" name="txtnivelmetal" type="text" id="txtnivelmetal" placeholder="Nivel de metales" class="texto"/>      
                                    <input class="form-control" name="txtoxidacion" type="text" id="txtoxidacion" placeholder="Tendencia a la oxidación" class="texto"/> 
                                </strong> 
                            </div>
                        </div>        

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong>           
                                    <input class="form-control" name="txtestabilidadmicro" type="text" id="txtestabilidadmicro" placeholder="Estabilidad microbiológica" class="texto"/>      
                                    <input class="form-control" name="txtsolubles" type="text" id="txtsolubles" placeholder="Sólidos solubles totales" class="texto"/>
                                </strong> 
                            </div>
                        </div>   

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong>           
                                    <input class="form-control" name="txthidro" type="text" id="txthidro" placeholder="Medida hidrométrica" class="texto"/>      
                                    <input class="form-control" name="txtph" type="text" id="txtph" placeholder="Nivel de PH" class="texto"/>
                                </strong> 
                            </div>
                        </div>               

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong>           
                                    <input class="form-control" name="txtalcohol" type="text" id="txtalcohol" placeholder="Nivel de alcohol" class="texto"/>      
                                    <input class="form-control" name="txtacidez" type="text" id="txtacidez" placeholder="Nivel de acidez" class="texto"/>
                                </strong> 
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong>           
                                    <input class="form-control" name="txtacideztitu" type="text" id="txtacideztitu" placeholder="Nivel de acidez titulable" class="texto"/>      
                                    <input class="form-control" name="txtacidezvol" type="text" id="txtacidezvol" placeholder="Nivel de acidez volátil" class="texto"/>
                                </strong> 
                            </div>
                        </div>  

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong>           
                                    <input class="form-control" name="txthierro" type="text" id="txthierro" placeholder="Nivel de hierro" class="texto"/>      
                                    <input class="form-control" name="txtmagnesio" type="text" id="txtmagnesio" placeholder="Nivel de magnesio" class="texto"/>
                                </strong> 
                            </div>
                        </div>               

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong>           
                                    <input class="form-control" name="txtcalcio" type="text" id="txtcalcio" placeholder="Nivel de calcio" class="texto"/>     
                                    <input class="form-control" name="txtpotasio" type="text" id="txtpotasio" placeholder="Nivel de potasio" class="texto"/>
                                </strong> 
                            </div>
                        </div>                       

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong>           
                                    <input class="form-control" name="txtsodio" type="text" id="txtsodio" placeholder="Nivel de sodio" class="texto"/>     
                                    <input class="form-control" name="txtcolor" type="text" id="txtcolor" placeholder="Color" class="texto"/>    
                                </strong> 
                            </div>
                        </div>                      


                        <div class="form-group">
                            <div class="col-lg-offset-4">
                                <strong>
                                    <input class="btn-primary" name="btncrearcalidad" type="submit" id="btncrearcalidad" value="Crear" />  
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
