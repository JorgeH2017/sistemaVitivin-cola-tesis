<?php

require_once ("../Clases/Documento.php");

$iddocumento = base64_decode(filter_input(INPUT_GET, 'iddocumento'));

if (isset($_GET["iddocumento"])) {
    $objDocu = new Documento;
    $res = $objDocu->listarDocumentoDesdeId($iddocumento);
    $fila = mysqli_fetch_array($res);
    if ($fila != null) {
        $fullpath = "../Archivos/";
        $nombredocumento = basename($fila["nombre_documento"]);
        $objDocu->eliminarDocumentoDesdeId($iddocumento);
        unlink($fullpath . $nombredocumento);
        echo "<script language='javascript'>alert('El archivo fue eliminado exitosamente');window.location='../Vista/descargardocumento.php'</script>";
    }
}
?>