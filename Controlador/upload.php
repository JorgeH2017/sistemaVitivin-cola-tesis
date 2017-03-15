<?php

session_start();

$idusuario = $_SESSION["id"];
$tipousuario = $_SESSION["TipUsuario"];

require_once("../Clases/Documento.php");

if (isset($_POST["btnsubirarchivo"]) && $_POST["btnsubirarchivo"] == "Subir archivo") {
    foreach ($_FILES["archivo"]["name"] as $i => $name) {

        $name = $_FILES["archivo"]["name"][$i];
        $size = $_FILES["archivo"]["size"][$i];
        $type = $_FILES["archivo"]["type"][$i];
        $tmp = $_FILES["archivo"]["tmp_name"][$i];
        $explode = explode('.', $name);

        $ext = end($explode);

        $path = "../Archivos/";
        $path = $path . basename($explode[0] . '.' . $ext);

        $errors = array();

        if (empty($_FILES["archivo"]["tmp_name"] [$i])) {
            $errors[] = 'Debes seleccionar al menos 1 archivo';
        } else {

            $allowed = array('jpg', 'jpeg', 'gif', 'bmp', 'png', 'txt', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'pps', 'ppsx', 'xls', 'xlsx', 'rar', 'zip');

            $max_size = 52428800; // 50MB

            $objDocu = new Documento();
            $res = $objDocu->existeDocumento($name);
            $fila = mysqli_fetch_array($res);
            if ($fila != '') {
                $errors[] = 'El archivo ' . $name . ' ya existe, debes cambiar el nombre del archivo';
            }
            if (in_array($ext, $allowed) === false) {
                $errors[] = 'El archivo ' . $name . ' tiene una extensión no permitida';
            }
            if ($size > $max_size) {
                $errors[] = 'El archivo ' . $name . ' excede el tamaño de MB soportado';
            }
        }

        if (empty($errors)) {

            /* if (!file_exists('Archivos')) {
              mkdir('Archivos', 0777);
              } */
            if (move_uploaded_file($tmp, $path)) {
                $objDocu = new Documento();
                $objDocu->Documento($name, $size, $type, $idusuario, $tipousuario);
                $objDocu->insertarDocumento();
                echo "<script language='javascript'>alert('Archivos subidos correctamente');window.location='../Vista/subirdocumento.php'</script>";
            } else {
                echo "<script language='javascript'>alert('Error al subir archivos');window.location='../Vista/subirdocumento.php'</script>";
            }
        } else {
            foreach ($errors as $error) {
                echo "<script language='javascript'>alert('$error');window.location='../Vista/subirdocumento.php'</script>";
            }
        }
    }
}



        