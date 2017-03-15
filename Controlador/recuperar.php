<?php

require_once("../Clases/Usuario.php");

if (isset($_POST["btnrecuperar"]) && $_POST["btnrecuperar"] == "Recuperar") {
    if (empty($_POST["mail"]) || $_POST["mail"] == "" || $_POST["mail"] == null || preg_match("/^\s+$/", $_POST["mail"])) {
        echo "Debes escribir un correo";
    } else {

        $mail = $_POST["mail"];

        $objUsuario = new usuario();
        $res = $objUsuario->comprobarCorreo($mail);
        $existe = mysqli_num_rows($res);
        if ($existe == 0) {
            echo "<script language='javascript'>alert('El correo ingresado no existe');window.location='../Vista/recuperarcontrasena.php'</script>";
        } else {

            $mailCifrado = htmlentities($_POST["mail"]);
            $row = mysqli_fetch_array($res);
            $hash = password_hash($row["nombre_usuario"], PASSWORD_BCRYPT);

            $headers .= "From:Recuperar password <info@webmaster.com>\r\n";
            $message = "Para recuperar tu contraseña dar click en la url de abajo.
		http://www.tuweb.com/pass.php?id=" . $hash . "&mail=" . $mailCifrado . "";

            if (mail($mail, "Recuperar password", $message, $headers)) {
                echo "<script language='javascript'>alert('Se te envio un link a tu correo de usuario para cambiar la contraseña');window.location='../Vista/recuperarcontrasena.php'</script>";
            }
        }
    }
}

