<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location:../Vista/index.html");
}
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
        <h1>Panel de Reportes</h1>

        <a href="../Controlador/reporteCliente.php" target="_blank">
            <input class="btn-success form-control" name="btnreportecliente" type="button" id="btnreportecliente" value="Reporte Clientes" class="botones"/>
        </a><br>

        <a href="../Controlador/reporteCompra.php" target="_blank">
            <input class="btn-success form-control" name="btnreportecompra" type="button" id="btnreportecompra" value="Reporte Compras" class="botones"/>
        </a><br>

        <a href="../Controlador/reporteInventario.php" target="_blank">
            <input class="btn-success form-control" name="btnreporteinventario" type="button" id="btnreporteinventario" value="Reporte Inventario" class="botones"/>
        </a><br>

        <a href="../Controlador/reporteProveedor.php" target="_blank">
            <input class="btn-success form-control" name="btnreporteproveedor" type="button" id="btnreporteproveedor" value="Reporte Proveedores" class="botones"/>
        </a><br>

        <a href="../Controlador/reporteSocio.php" target="_blank">
            <input class="btn-success form-control" name="btnreportesocio" type="button" id="btnreportesocio" value="Reporte Socios" class="botones"/>
        </a><br>

        <a href="../Controlador/reporteTrabajador.php" target="_blank">
            <input class="btn-success form-control" name="btnreportetrabajador" type="button" id="btnreportetrabajador" value="Reporte Trabajadores" class="botones"/>
        </a><br>

        <a href="../Controlador/reporteVenta.php" target="_blank">
            <input class="btn-success form-control" name="btnreporteventa" type="button" id="btnreporteventa" value="Reporte Ventas" class="botones"/>
        </a><br>

        <a href="../Controlador/reporteCalidad.php" target="_blank">
            <input class="btn-success form-control" name="btnreportecalidad" type="button" id="btnreportecalidad" value="Reporte Planes de Calidad" class="botones"/>
        </a><br>

        <a href="../Controlador/reporteMarketing.php" target="_blank">
            <input class="btn-success form-control" name="btnreportemarketing" type="button" id="btnreportemarketing" value="Reporte Planes de Marketing" class="botones"/>
        </a>

        <div>
            <a href="botoninicio.php"><input name="btninicio" id="btninicio" type="button" value="Inicio"></a>
        </div>
    </body>
</html>
