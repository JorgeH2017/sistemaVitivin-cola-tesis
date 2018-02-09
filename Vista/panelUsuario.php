<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location:../index.php");
} elseif ($_SESSION["TipUsuario"] == 1) {
    header("Location:../Vista/panelAdmin.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <title>Documento sin t&iacute;tulo</title>
        <link href="estilos.css" rel="stylesheet" type="text/css" />
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>
        <style type="text/css">
            <!--
            .Estilo3 {
                font-size: 60px;
                font-weight: bold;
            }
            #contenedorpaneladmin {
                font-family: Arial, Helvetica, sans-serif;
            }
            .Estilo4 {color: #999999}
            .Estilo5 {font-size: 14px}
            .Estilo6 {
                font-size: 14px;
                font-weight: bold;
            }
            -->
        </style>
    </head>
    <body>
        <div id="contenedorpaneladmin">

            <div align="right">
                Nombre de usuario: <?= $_SESSION["usuario"]; ?>
                <p align="right">
                    <a href="modificarusuariosimple.php"><input name="btnmodificarperfil" id="btnmodificarperfil" type="button" value="Modificar Perfil Usuario"></a><br>
                    <a href="../Controlador/dologout.php"><input name="btncerrar" id="btncerrar" type="button" value="Cerrar Sesión"></a>  </p> </div>  

            <div align="center" class="Estilo3" id="titulosistema">Sistema Vitivinícola 
            </div>

            <div id="header">
                <ul class="menu">
                    <li class="Estilo4"><a href="" class="menu Estilo5"><strong> Gestión Administrativa</strong></a>
                        <ul>
                            <li><a href="ingresarsocio.php"> Ingresar Socio</a></li>
                            <li><a href="listarsocio.php"> Listar Socio</a></li>
                            <li><a href="ingresarpuestotrabajador.php">Ingresar Puesto de Trabajo</a></li>
                            <li><a href="ingresartrabajador.php"> Ingresar Trabajador</a></li>
                            <li><a href="listartrabajador.php"> Listar Trabajador</a></li>
                            <li><a href="subirdocumento.php"> Subir Documento</a></li>
                            <li><a href="descargardocumento.php"> Descargar Documento</a></li>	   	
                        </ul>
                    </li>

                    <li><a href="" class="Estilo5"><strong> Gestión Comercial</strong></a>
                        <ul>
                            <li><a href="crearplanmarketing.php"> Ingresar Plan de Marketing</a></li>
                            <li><a href="listarplanmarketing.php"> Listar Planes de Marketing</a></li>
                            <li><a href="ingresarcliente.php"> Ingresar Cliente</a></li>
                            <li><a href="listarcliente.php"> Listar Clientes</a></li>
                            <li><a href="ingresarventas.php"> Ingresar Venta</a></li>
                            <li><a href="visualizarventas.php"> Visualizar Ventas</a></li>
                        </ul>
                    </li>

                    <li><a href="" class="Estilo5"><strong> Gestión de Compras</strong></a>
                        <ul>
                            <li><a href="ingresarproveedor.php"> Ingresar Proveedor</a></li>
                            <li><a href="listarproveedor.php"> Listar Proveedor</a></li>
                            <li><a href="ingresartipoproducto.php"> Ingresar Tipo de Producto</a></li>
                            <li><a href="ingresarcompras.php"> Ingresar Compra de Producto</a></li>
                            <li><a href="listarproductos.php"> Listar Compra de Productos</a></li>
                        </ul>
                    </li>

                    <li><a href="" class="Estilo6"> Gestión de Inventario</a>
                        <ul>
                            <li><a href="ingresarvinos.php"> Ingresar Inventario</a></li>
                            <li><a href="listarstockvino.php"> Listar Inventario</a></li>
                        </ul>				
                    </li> 

                    <li><a href="" class="Estilo6"><strong> Gestión de Calidad</strong></a>
                        <ul>
                            <li><a href="crearplandecalidad.php"> Ingresar Plan de Calidad</a></li>
                            <li><a href="listarplancalidad.php"> Listar Planes de Calidad</a></li>
                        </ul>
                    </li>

                    <li><a href="" class="Estilo5"><strong> Gestión Usuarios</strong></a>
                        <ul>
                            <li><a href="registrarusuario.php"> Registrar Usuario</a></li>
                            <li><a href="listarusuario.php">Listar Usuarios</a></li>
                            <li><a href="panelreportes.php">Reportes</a></li>
                        </ul>				
                    </li> 
                </ul> 
            </div>

        </div>
    </body>
</html>
