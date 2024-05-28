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
    
       <h2>¡ Bienvenidos a Dogocat la fundacion digital de adopcion de animales !</h2>
       <a href="/Vista/Html/Inicio/inicio.html" style="display: inline-block; padding: 13px 55px; border: 1px solid black; border-radius: 25px; color: black; text-decoration: none; float: right; "> Cerrar Sesion </a>
       <h2> Estamos emocionados de tenerte aqui, porque cada vista a nuestra plataforma significa una oportunidad <br> para cambiar la vida de un adorable amigo de cuatro patas </h2>
    </header>
    <section>
        <nav id="navega">
            <ul class="menu">
                <li><a href="../Mascotas/tablamasc.php">Ver Mascotas</a></li>
                <li><a href="../Mascotas/control.html">Realizar Control</a></li>
               
            </ul>
        </nav>
    </section>
</head>
<body>
    <br>
    
        <center> <img src="https://t2.ea.ltmcdn.com/es/posts/8/1/2/adoptar_mascotas_por_internet_1218_orig.jpg" style="height: 650px;" alt=""> </center>
      
    
</body>
</html>