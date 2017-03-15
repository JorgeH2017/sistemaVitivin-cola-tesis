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

require_once ("../Clases/Usuario.php");

$idusuario2 = base64_decode(filter_input(INPUT_GET, 'idusuario'));
$_SESSION["idusuario2"] = $idusuario2;
$objUsuario = new Usuario();
$res = $objUsuario->seleccionarCorreo($idusuario2);
$fila = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="../Vista/Javascript/validarUsuario.js"></script>
    </head>
    <body>
        <div>
            Nombre de usuario: <?= $_SESSION["usuario"]; ?>
            <p>
                <a href="modificarusuariosimple.php"><input name="btnmodificarperfil" id="btnmodificarperfil" type="button" value="Modificar Perfil Usuario"></a><br>
                <a href="../Controlador/dologout.php"><input name="btncerrar" id="btncerrar" type="button" value="Cerrar Sesión"></a>  </p> </div>  
        <h1>Modificar Correo</h1>
        <br>
        <form method="post" action="../Controlador/control_usuario3.php" onsubmit="return validarCorreo2()">
            <label>Correo electr&oacute;nico:</label>
            <input name="txtcorreousuario" type="email" id="txtcorreousuario" readonly value="<?php echo $fila["correo_usuario"] ?>"/>
            <br>
            Correo nuevo:
            <input name="txtnuevocorreo" type="email" id="txtnuevocorreo" value=""/>
            <input type="submit" id="btnCorreo" name="btnCorreo" value="Modificar" onsubmit="return validarCorreo2()">    

            <div>
                <a href="botoninicio.php"><input name="btninicio" id="btninicio" type="button" value="Inicio"></a>
                <a href="listarusuario.php">
                    <input name="btnatras" id="btnatras" type="button" value="Volver"></a>
            </div>
        </form>
    </body>
</html>
