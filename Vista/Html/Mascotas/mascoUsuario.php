<?php
require_once "../../../Modelo/ConexionBD.php";
$conexion = new ConexionBD();
$conexion->abrir();

$categoria = isset($_GET['Categoria']) ? $_GET['Categoria'] : 'todos';
$tipo = isset($_GET['Tipo']) ? $_GET['Tipo'] : 'todos';

$sql = "SELECT * FROM tbl_animales";

if ($tipo == 'perro') {
    $sql .= " WHERE Tipo_Animal = '1'";
} elseif ($tipo == 'gato') {
    $sql .= " WHERE Tipo_Animal = '2'";
}

if ($categoria == 'Cachorro') {
    $sql .= $tipo != 'todos' ? " AND" : " WHERE";
    $sql .= " Edad = 'Cachorro'";
} elseif ($categoria == 'Adulto') {
    $sql .= $tipo != 'todos' ? " AND" : " WHERE";
    $sql .= " Edad = 'Adulto'";
} elseif ($categoria == 'Senior') {
    $sql .= $tipo != 'todos' ? " AND" : " WHERE";
    $sql .= " Edad = 'Senior'";
}
$conexion->consulta($sql);
$result = $conexion->obtenerResult();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas Disponibles</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="../../Estilos/estilo.css">
</head>
<body>
    <br><br>
    <nav>
        <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <center>
                <select id="categoria" name="Categoria" onchange="this.form.submit()">
                    <option value="todos" <?php if ($categoria == 'todos') echo 'selected'; ?>>Edad de animales</option>
                    <option value="Cachorro" <?php if ($categoria == 'Cachorro') echo 'selected'; ?>>Cachorros</option>
                    <option value="Adulto" <?php if ($categoria == 'Adulto') echo 'selected'; ?>>Adultos</option>
                    <option value="Senior" <?php if ($categoria == 'Senior') echo 'selected'; ?>>Senior</option>
                </select> 
            </center>
        </form>
    </nav>

    <center>
        <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <select name="Tipo" onchange="this.form.submit()">
                <option value="todos" <?php if ($tipo == 'todos') echo 'selected'; ?>>Tipo de animal</option>
                <option value="perro" <?php if ($tipo == 'perro') echo 'selected'; ?>>Perros</option>
                <option value="gato" <?php if ($tipo == 'gato') echo 'selected'; ?>>Gatos</option>
            </select>
        </form>
    </center>

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            while ($fila = mysqli_fetch_assoc($result)) {
                ?>
                <div class="swiper-slide">
                    <div class="icons">
                        <i class="fa-solid fa-circle-arrow-left"> <a href="../Inicio/Usuario.php">..</a></i>
                        <img src="../../Imagenes/icono.jpg" alt="">
                        <i class="fa-regular fa-heart"></i>
                    </div>

                    <div class="mascota-content">
                        <div class="mascota-txt">
                            <span><?php echo $fila['Nombre']; ?> </span>
                            <h2>EDAD: <br> <?php echo $fila['Edad']; ?></h2>
                            <h2>RAZA: <br><?php echo $fila['Raza']; ?></h2>
                            <h2>TAMAÑO: <br><?php echo $fila['Tamaño']; ?></h2>
                            <h2>COLOR: <br><?php echo $fila['Color']; ?></h2>
                            <h2>SEXO: <br><?php echo $fila['Sexo']; ?></h2>
                            <?php if ($fila['Estado'] == 'ADOPTADO'): ?>
                                <h2 style="color: red;">ADOPTADO</h2>
                            <?php else: ?>
                                <a href="Formulario.php?id_animal= <?php echo $fila['Id_Animal']; ?> " style="display: inline-block; padding: 13px 55px; border: 1px solid skyblue; border-radius: 25px; color: skyblue; text-decoration: none;"> Adoptar </a>
                            <?php endif; ?>
                        </div>

                        <div class="mascota-img">
                            <img src="../../ImagenAnimal/imagenes/<?php echo $fila['Imagen_Img']; ?>" class="img-rounded" width="250" height="250px" />
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <!-- Flechas de navegación -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            loop: true,
            coverflowEffect: {
                depth: 500,
                modifier: 1,
                slideShadows: true,
                rotate: 0,
                stretch: 0
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</body>
</html>
