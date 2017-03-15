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
} elseif ($_SESSION["TipUsuario"] == 6) {
    header("Location:../Vista/panelinventario.php");
}

require_once("../Clases/Usuario.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link href="estilosUsuario.css" rel="stylesheet" type="text/css" />
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>
        <script src="../Vista/Javascript/validarUsuario.js"></script>

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
                    <h1 align="center"><strong><em>Registrar Usuario</em></strong></h1>
                    <br>
                </div>

                <div class="panel-body">  
                    <form class="form-horizontal" id="form1" name="form1" method="post" action="../Controlador/control_usuario.php" onsubmit="return validarUsuario()">         
                        <br>
                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <input class="form-control" name="txtusuario" type="text" id="txtusuario" placeholder="Nombre usuario"/>
                                </strong> 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <input class="form-control" name="txtpass" type="password" id="txtpass" placeholder="Contraseña ej: Kaio_@2014"/>
                                </strong> 
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <input class="form-control" name="txtrepetircontrasena" type="password" id="txtrepetircontrasena" placeholder="Repetir contraseña"/>
                                </strong> 
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <input class="form-control" name="txtnombres" type="text" id="txtnombres" placeholder="Nombre"/>
                                </strong> 
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <input class="form-control" name="txtapellidos" type="text" id="txtapellidos"  placeholder="Apellidos"/>
                                </strong> 
                            </div>
                        </div>  

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <input class="form-control" name="txttelefono" type="tel" id="txttelefono" placeholder="Teléfono ej: 988875898"/>
                                </strong> 
                            </div>
                        </div>  

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <input class="form-control" name="txtcorreousuario" type="email" id="txtcorreousuario" placeholder="Correo electrónico"/>
                                </strong> 
                            </div>
                        </div>  

                        <div class="form-group">
                            <div class="col-lg-10 col-md-offset-1">
                                <strong> 
                                    <input class="form-control" name="txtdirecusuario" type="text" id="txtdirecusuario" placeholder="Dirección"/>
                                </strong> 
                            </div>
                        </div>   


                        <div class="form-group">
                            <label class="col-md-4 control-label">Tipo de usuario:</label> 
                            <div class="col-md-7">            
                                <?php
                                $objUsuario = new Usuario();
                                $res = $objUsuario->listarTipoUsuario();
                                ?>

                                <select class="form-control" name="selecttipousuario" id="selecttipousuario">
                                    <option value="0">Seleccione un tipo de usuario</option>
                                    <?php
                                    while ($fila = mysqli_fetch_array($res)) {
                                        ?>
                                        <option value=" <?php echo $fila["id_tipoUsuario"] ?> "> <?php echo $fila["nombre_tipoUsuario"]; ?> </option>
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
                                        <input name="btnregistrousuario" type="submit" id="btnregistrousuario" value="Ingresar" />
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
