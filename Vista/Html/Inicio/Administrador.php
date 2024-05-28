<?php
session_start();

if (!isset($_SESSION["Rol"])) {
    header("location: ../Inicio/Login.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/admin.css">
    <title>Bienvenidos</title>
   
</head>
<body>
     
    <header>
        <a href="CerrarSesion.php" style="display: inline-block; padding: 13px 55px; border: 1px solid black; border-radius: 25px; color: black; text-decoration: none; float: right; "> Cerrar Sesion </a>
        <h1>¡ Bienvenidos a Dogocat la fundacion digital de adopcion de animales !</h1>
        <h2>Nuestro Deber es Por Ellos</h2> 
        
    </header>

    <section>
        <nav id="navega">
            <ul class="menu"> 
                    <li><a href="../../Html/Inicio/registroUsuarios.html">  Registrar Usuario</a></li> 
                    <li><a href="../Inicio/Usuarios.php">Ver Usuarios</a></li>
                    <li><a href="../../Html/Mascotas/registroMascotas.html">Registrar Animal</a></li>
                    <li> <a href="../Inventario/RegistrarInsumo.php">Registrar Insumo</a></li>
                    <li> <a href="../Inventario/Insumos.php">Pedir Insumo</a></li>
                    <li> <a href="../Inventario/Insumos.php">Realizar pedidos</a></li>
                    <li> <a href="../Inventario/pedidosR.php">Pedidos realizados</a></li>
                    <li> <a href="../Inventario/RegistroProveedor.html">Registrar Proveedor</a></li>
                    <li> <a href="../Inventario/Proveedores.php">Ver Proveedores</a></li>
                    <li><a href="../../Html/Mascotas/tablamasc.php">Ver Animales</a></li>
                    <li><a href="../../Html/Donaciones/donacionInsumos.php">Ver Donaciones de Insumos</a></li>
                    <li><a href="../../Html/Donaciones/donacionDinero.php">Ver Donaciones de Dinero</a></li>
                    
                        

                    
            </ul>

       </nav>
       
    </section> <br>
    <center> <img src="https://t2.ea.ltmcdn.com/es/posts/8/1/2/adoptar_mascotas_por_internet_1218_orig.jpg" style="height: 650px;" alt=""> </center>
   



</body>
</html>

