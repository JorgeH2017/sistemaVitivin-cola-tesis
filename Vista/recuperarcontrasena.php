<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../Vista/Javascript/validarUsuario.js"></script>
    </head>
    <body>
        <h1>Recuperación de Contraseña</h1>
        <form id="form1" name="form1" method="post" action="../Controlador/recuperar.php" onsubmit="return validarCorreo3()">
            Ingresa el email para recuperar tú contraseña:<br />
            <input type="email" name="mail" id="mail" />
            <br />
            <br />
            <input type="submit" name="btnrecuperar" id="btnrecuperar" value="Recuperar" />
        </form>
    </body>
</html>
