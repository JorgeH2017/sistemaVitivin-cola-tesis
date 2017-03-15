<?php

require_once ("../Clases/Documento.php");

$iddocumento = base64_decode(filter_input(INPUT_GET, 'iddocumento'));

if (isset($iddocumento)) {
    $objDocu = new Documento;
    $res = $objDocu->listarDocumentoDesdeId($iddocumento);
    $fila = mysqli_fetch_array($res);

    if ($fila != null) {
        $tipodocumento = $fila["tipo_documento"];
        $nombredocumento = basename($fila["nombre_documento"]);

        $ruta = "../Archivos/" . $nombredocumento;
        if (is_file($ruta)) {
            header("Content-Type:$tipodocumento");
            header('Content-Disposition:attachment;filename="' . $nombredocumento . '"');
            ob_end_clean();
            flush();
            readfile($ruta);
        } else {
            echo "<script language='javascript'>alert('Error al descargar el archivo');window.location='../Vista/descargardocumento.php'</script>";
        }
    }
}