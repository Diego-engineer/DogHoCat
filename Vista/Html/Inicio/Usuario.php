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
    <header id="titulo">
    <a href="CerrarSesion.php" style="display: inline-block; padding: 13px 55px; border: 1px solid black; border-radius: 25px; color: black; text-decoration: none; float: right;">Cerrar Sesión</a>
       <strong><h1>¡ Bienvenidos a Dogocat la fundacion digital de adopcion de animales !</h1></strong>
       <h2> Estamos emocionados de tenerte aqui <br>porque cada vista a nuestra plataforma significa una oportunidad para cambiar la vida de un adorable amigo de cuatro patas </h2>
    </header>
    <section>
        <nav id="navega">
            <ul class="menu">
              
                
                <li><a href="../../Html/Mascotas/mascoUsuario.php">Ver Mascotas</a></li>
                <li><a href="../../Html/Donaciones/InsumosUsuario.php">Realizar Donacion de Insumos</a></li>
                <li><a href="../../Html/Donaciones/DineroUsuario.php">Realizar Donacion de Dinero    </a></li>
               
            </ul>
        </nav>
    </section>
</head>
<body>
     
        
        <p>  </p>
        <center> <img src="https://t2.ea.ltmcdn.com/es/posts/8/1/2/adoptar_mascotas_por_internet_1218_orig.jpg" style="height: 620px;" alt=""> </center>

</body>
</html>