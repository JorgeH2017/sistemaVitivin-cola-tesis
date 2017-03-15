<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../Vista/Javascript/validarUsuario.js"></script>
    </head>
    <body>
        <h1>Modificar Contraseña</h1>
        <form id="form1" name="form1" method="post" action="../Controlador/nuevaPass.php" onsubmit="return validarPass2()">
            Nueva contraseña:<br/>
            <input type="password" name="txtpass" id="txtpass" />
            <br />
            Repetir Contraseña:<br/>
            <input type="password" name="txtrepass" id="txtrepass" />
            <br />
            <input type="submit" name="btnnuevapass" id="btnnuevapass" value="Guardar" />
        </form>
    </body>
</html>
