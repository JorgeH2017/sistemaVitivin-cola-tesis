<?php

require_once("../Clases/Usuario.php");

$id = filter_input(INPUT_GET, 'id');
$mail = html_entity_decode($_GET["mail"]);

if (isset($_POST["btnnuevapass"]) && $_POST["btnnuevapass"] == "Guardar") {
    if (empty($_POST["txtpass"]) || $_POST["txtpass"] == "" || $_POST["txtpass"] == null || preg_match("/^\s+$/", $_POST["txtpass"])) {
        echo "Debes escribir una contraseña nueva";
    } else if (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $_POST["txtpass"])) {
        echo "La contraseña nueva no es válida. Es válida si contiene al menos 1 letra mayúscula y 1 minúscula sin tildes , al menos 1 número, al menos 1 caracter. Un largo minimo de 8 y máximo de 20";
    } else if (strlen($_POST["txtpass"]) > 20) {
        echo "La contraseña nueva no debe superar los 20 caracteres";
    } else if (empty($_POST["txtrepass"]) || $_POST["txtrepass"] == "" || $_POST["txtrepass"] == null || preg_match("/^\s+$/", $_POST["txtrepass"])) {
        echo "Debes escribir la contraseña en el campo repetir contraseña";
    } else if ($_POST["txtrepass"] != $_POST["txtpass"]) {
        echo "Las contraseñas son diferentes";
    } else {

        $contrasena = $_POST["txtpass"];
        $repetircontrasena = $_POST["txtrepass"];

        $objUsuario = new usuario();
        $res = $objUsuario->comprobarCorreo($mail);
        $existe = mysqli_num_rows($res);
        if ($existe == 0) {
            echo "<script language='javascript'>alert('El correo ingresado no existe');window.location='../Vista/nuevacontrasena.php'</script>";
        } else {
            $row = mysqli_fetch_array($res);
            $hash = password_hash($row["nombre_usuario"], PASSWORD_BCRYPT);

            if (password_verify($id, $hash)) {
                $passhash = password_hash($contrasena, PASSWORD_BCRYPT);

                $objUsuario->modificarContrasena2($passhash, $mail);
                echo "<script language='javascript'>alert('Contraseña cambiada correctamente');window.location='../Vista/nuevacontrasena.php'</script>";
            }
        }
    }
}

                