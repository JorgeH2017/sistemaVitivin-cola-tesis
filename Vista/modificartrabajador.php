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

require_once ("../Clases/Trabajador.php");

$ruttrab = base64_decode(filter_input(INPUT_GET, 'ruttrab'));
$objTrabajador = new Trabajador();
$res = $objTrabajador->listarDesdeRut($ruttrab);
$fila = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link href="estilosAdministrativa.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>

        <script src="../Vista/Javascript/validarTrabajador.js"></script>
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
                    <h1 align="center"><strong>Modificar Trabajador</strong></h1>
                    <br>
                </div>
                <div class="panel-body">    
                    <form class="form-horizontal" id="form1" name="form1" method="post" action="../Controlador/control_trabajador2.php" onsubmit="return validarTrabajador()">


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <strong> 
                                        <label class="control-label col-md-2" >Dni:</label>
                                        <label class="control-label col-md-offset-3">   
                                            <input class="form-control" name="txtruttrabajador" type="text" id="txtruttrabajador" readonly value="<?php echo $fila["rut_trabajador"]; ?>"/>
                                        </label>
                                    </strong> 
                                </div>
                            </div>
                        </div>    

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <strong> 
                                        <label class="control-label col-md-2" >Nombres:</label>
                                        <label class="control-label col-md-offset-3">   
                                            <input class="form-control" name="txtnombretrabajador" type="text" id="txtnombretrabajador" value="<?php echo $fila["nombre_trabajador"]; ?>"/>
                                        </label>
                                    </strong> 
                                </div>
                            </div>
                        </div>    

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <strong> 
                                        <label class="control-label col-md-2" >Apellidos:</label>
                                        <label class="control-label col-md-offset-3">   
                                            <input class="form-control" type="text" name="txtapellidotrabajador" id="txtapellidotrabajador" value="<?php echo $fila["apellidos_trabajador"]; ?>"/>
                                        </label>
                                    </strong> 
                                </div>
                            </div>
                        </div>        

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <strong> 
                                        <label class="control-label col-md-2" >Teléfono:</label>
                                        <label class="control-label col-md-offset-3">   
                                            <input class="form-control" name="txttelefonotrabajador" type="tel" id="txttelefonotrabajador" value="<?php echo $fila["telefono_trabajador"]; ?>"/>
                                        </label>
                                    </strong> 
                                </div>
                            </div>
                        </div>        

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <strong> 
                                        <label class="control-label col-md-2" >Correo electrónico:</label>
                                        <label class="control-label col-md-offset-3">   
                                            <input class="form-control" name="txtcorreotrabajador" type="email" id="txtcorreotrabajador" value="<?php echo $fila["correo_trabajador"]; ?>"/>
                                        </label>
                                    </strong> 
                                </div>
                            </div>
                        </div>        

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <strong> 
                                        <label class="control-label col-md-2" >Dirección:</label>
                                        <label class="control-label col-md-offset-3">   
                                            <input class="form-control" name="txtdirecciontrabajador" type="text" id="txtdirecciontrabajador" value="<?php echo $fila["direccion_trabajador"]; ?>"/>
                                        </label>
                                    </strong> 
                                </div>
                            </div>
                        </div>        

                        <div class="form-group">
                            <label class="col-md-4 control-label">Puesto de trabajo:</label> 
                            <div class="col-md-7">    

                                <?php
                                $res2 = $objTrabajador->listarPuestoTrabajo();
                                ?>
                                <select class="form-control" name="selectpuestotrabajo" id="selectpuestotrabajo">
                                    <?php
                                    while ($fila2 = mysqli_fetch_array($res2)) {
                                        if ($fila["id_puestoTrabajo"] == $fila2["id_puestoTrabajo"]) {
                                            echo "<option value=\"$fila2[id_puestoTrabajo]\" selected>$fila2[nombre_puestoTrabajo]</option>";
                                        } else {
                                            echo "<option value=\"$fila2[id_puestoTrabajo]\">$fila2[nombre_puestoTrabajo]</option>";
                                        }
                                    }
                                    ?>
                                </select> 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong> 
                                        <div class="btn-primary">
                                            <input class="btn-primary form-control" name="btnmodificartrabajador" type="submit" id="btnmodificartrabajador" value="Modificar" />
                                        </div>
                                    </strong> 
                                </div>
                            </div>
                        </div>              
                        <td>&nbsp;</td>

                        <div class="panel-footer">
                            <div class="col-lg-offset-4">  
                                <a href="botoninicio.php"><input name="btninicio" type="button" value="Inicio"></a>
                                <a href="listartrabajador.php"><input name="btnatras" type="button" value="Volver"></a>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </body>
</html>
