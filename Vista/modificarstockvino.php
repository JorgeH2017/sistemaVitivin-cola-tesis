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

require_once ("../Clases/Inventario.php");

$idvino = base64_decode(filter_input(INPUT_GET, 'idvino'));
$_SESSION["idvino"] = $idvino;
$objVino = new Inventario();
$res = $objVino->listarDesdeId($idvino);
$fila = mysqli_fetch_array($res);
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
        <div class="container-fluid">
            <br>
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <br>
                    <div align="right">
                        Nombre de usuario:<?= $_SESSION["usuario"]; ?>
                        <p align="right">
                            <a href="modificarusuariosimple.php"><input name="btnmodificarperfil" id="btnmodificarperfil" type="button" value="Modificar Perfil Usuario"></a><br>
                            <a href="../Controlador/dologout.php"><input name="btncerrar" id="btncerrar" type="button" value="Cerrar Sesión"></a>  </p> </div>  
                    <h1 align="center"><strong><em>Modificar Stock Vino</em></strong></h1>
                    <br>
                </div>   

                <div class="panel-body">
                    <form class="form-horizontal" id="form1" name="form1" method="post" action="../Controlador/control_inventario2.php">



                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label col-md-2">Nombre:</label>
                                    <label class="control-label col-md-offset-3">
                                        <input class="form-control" name="txtnombrevino" type="text" id="txtnombrevino" readonly value="<?php echo $fila["nombre_vino"]; ?>" />    
                                    </label>
                                </strong> 
                            </div>
                        </div>   

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label col-md-2">Cantidad actual:</label>
                                    <label class="control-label col-md-offset-3">
                                        <input class="form-control" name="txtcantidadactualvino" type="text" id="txtcantidadvino" readonly value="<?php echo $fila["cantidad_vino"]; ?>"/>    
                                    </label>
                                </strong> 
                            </div>
                        </div>  

                        <div class="panel-footer">                
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <strong> 
                                        <label class="control-label col-md-2">Agregar cantidad:</label>
                                        <label class="control-label col-md-offset-3">
                                            <input class="form-control" name="txtagregarvino" type="text" id="txtagregarvino" />  
                                            <input class="btn-primary form-control" name="btnagregarcantidad" type="submit" id="btnagregarcantidad" value="Agregar" onclick="return validarStockA()" />    
                                        </label>
                                    </strong> 
                                </div>
                            </div>  
                        </div> 

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <strong> 
                                    <label class="control-label col-md-2">Disminuir cantidad:</label>
                                    <label class="control-label col-md-offset-3">
                                        <input class="form-control" name="txtdisminuirvino" type="text" id="txtdisminuirvino" />    
                                        <input class="btn-primary form-control" name="btndisminuircantidad" type="submit" id="btndisminuircantidad" value="Disminuir" onclick="return validarStockD()" />
                                    </label>
                                </strong> 
                            </div>
                        </div>    


                        <div class="panel-footer">
                            <div class="col-lg-offset-4">
                                <a href="botoninicio.php"><input name="btninicio" id="btninicio" type="button" value="Inicio"></a>
                                <a href="listarstockvino.php"><input name="btnatras" id="btnatras" type="button" value="Volver"></a>   
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
