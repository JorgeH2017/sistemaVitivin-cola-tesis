<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location:../Vista/index.html");
} elseif ($_SESSION["TipUsuario"] == 2) {
    header("Location:../Vista/paneladministrativo.php");
} elseif ($_SESSION["TipUsuario"] == 3) {
    header("Location:../Vista/panelcalidad.php");
} elseif ($_SESSION["TipUsuario"] == 5) {
    header("Location:../Vista/panelcompras.php");
} elseif ($_SESSION["TipUsuario"] == 6) {
    header("Location:../Vista/panelinventario.php");
}

require_once("../Clases/Venta.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div align="right">
            Nombre de usuario: <?= $_SESSION["usuario"]; ?>
            <p align="right">
                <a href="modificarusuariosimple.php"><input name="btnmodificarperfil" id="btnmodificarperfil" type="button" value="Modificar Perfil Usuario"></a><br>
                <a href="../Controlador/dologout.php"><input name="btncerrar" id="btncerrar" type="button" value="Cerrar Sesión"></a>  </p> </div>  

        <form>
            <h1>Tabla de Ventas</h1>
            <table>
                <tr>
                    <th>Número de Venta</th>
                    <th>Fecha de Venta</th>
                    <th>Cantidad Vendida</th>
                    <th>Tipo de Venta</th>
                    <th>Monto Total Venta</th>
                    <th>Nombre del Vino</th>
                </tr>

                <?php
                $objVenta = new Venta();
                $res = $objVenta->listarVentas();
                $num = mysqli_num_rows($res);
                if ($num == 0) {
                    echo "<font color='white'>NO HAY VENTAS INGRESADAS</font>";
                } else {
                    while ($fila = mysqli_fetch_array($res)) {
                        ?>

                        <tr>
                            <td><?php echo $fila["id_documentoVenta"]; ?></td>
                            <td><?php echo $fila["fecha_documentoVenta"]; ?></td>   
                            <td><?php echo $fila["cantidad_vinoVenta"]; ?></td>
                            <td><?php echo $fila["tipo_documentoVenta"]; ?></td>
                            <td><?php echo number_format($fila["monto_totalVenta"], 2) ?></td>
                            <td><?php echo $fila["nombre_vino"]; ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>


            <div>

                <a href="botoninicio.php"><input name="btninicio" id="btninicio" type="button" value="Inicio"></a>
            </div>

        </form>
    </body>
</html>
