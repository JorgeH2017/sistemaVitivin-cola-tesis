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

require_once("../Clases/Trabajador.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link href="estilosAdministrativa.css" rel="stylesheet" type="text/css" />
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>
        <script src="../Vista/Javascript/validarTrabajador.js"></script>
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
                    <h1 align="center"><strong><em>Ingresar Trabajador</em></strong></h1>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="form1" name="form1" method="post" action="../Controlador/control_trabajador.php" onsubmit="return validarTrabajador()">
                        <br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong> 
                                        <input class="form-control" name="txtruttrabajador" type="text" id="txtruttrabajador" placeholder="Dni ej: 99999999R" />
                                    </strong> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong> 
                                        <input class="form-control" name="txtnombretrabajador" type="text" id="txtnombretrabajador" placeholder="Nombres" />
                                    </strong> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong> 
                                        <input class="form-control" name="txtapellidotrabajador" type="text" id="txtapellidotrabajador" placeholder="Apellidos" />
                                    </strong> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong> 
                                        <input class="form-control" name="txttelefonotrabajador" type="tel" id="txttelefonotrabajador" placeholder="Teléfono ej: 988875898"/>
                                    </strong> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong> 
                                        <input class="form-control" name="txtcorreotrabajador" type="email" id="txtcorreotrabajador" placeholder="Correo electrónico" />
                                    </strong> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-md-offset-1">
                                    <strong> 
                                        <input class="form-control" name="txtdirecciontrabajador" type="text" id="txtdirecciontrabajador" placeholder="Direccion" />
                                    </strong> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Puesto de trabajo:</label> 
                            <div class="col-md-7">
                                <?php
                                $objTrabajador = new Trabajador();
                                $res = $objTrabajador->listarPuestoTrabajo();
                                ?>
                                <select class="form-control" name="selectpuestotrabajo" id="selectpuestotrabajo">
                                    <option value="0">Seleccione un puesto de trabajo:</option>		 
                                    <?php
                                    while ($fila = mysqli_fetch_array($res)) {
                                        ?>
                                        <option value=" <?php echo $fila["id_puestoTrabajo"] ?>">
                                            <?php echo $fila["nombre_puestoTrabajo"]; ?>        
                                        </option>     
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <br>
                            <div class="form-group">
                                <div class="col-lg-offset-4">
                                    <strong>
                                        <input name="btningresartrabajador" type="submit" id="btningresartrabajador" value="Ingresar" />
                                        <a href="botoninicio.php"><input name="btninicio" id="btninicio" type="button" value="Inicio"></a>
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
