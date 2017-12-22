<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Formulario Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="Vista/estilos2.css">
        <link href="Vista/Bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <style type="text/css">
            <!--
            .Estilo1 {
                font-size: 36px;
                font-weight: bold;
                font-style: italic;
            }
            a{
                display:flex;
                -moz-display:flex;
                -ms-display:flex;
                -webkit-display:flex;
                justify-content:center;
                -moz-justify-content:center;
                -webkit-justify-content:center;
                -ms-justify-content:center;
            }
            -->
        </style>
    </head>
    <body>
        <form id="form" name="form" method="POST" action="Controlador/dologin.php" onsubmit="return validarLogin()">
            <h1 class="Estilo1">Sistema Vitivinícola</h1>
            <h2>Iniciar Sesión</h2>
            <br>
            <input  type="text" name="txtusuario" id="txtusuario" placeholder="&#128272; Usuario" autocomplete="off">
            <br>
            <input type="password" name="txtpass" id="txtpass" placeholder="&#128272; Contraseña" autocomplete="off">
            <br>
            <input type="submit" name="btnlogin" id="btnlogin" value="Ingresar">
            <br>
            <a href="../Vista/recuperarcontrasena.php">Haz olvidado la contraseña?</a>

        </form>
        <script src="Vista/Bootstrap/js/jquery-3.2.1.js"></script>
        <script src="Vista/Bootstrap/js/bootstrap.min.js"></script>

    </body>
</html>
