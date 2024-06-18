<?php
session_start();

if (!isset($_SESSION["Rol"])) {
    header("location: ../Inicio/Login.html");
    exit(); // Asegúrate de que el script se detenga después de redirigir.
}

// Permitir acceso solo a usuarios con rol 2 o 3
$rol = $_SESSION["Rol"];
if ($rol != 2 && $rol != 3) {
    header("location: ../Inicio/Login.html");
    exit(); // Asegúrate de que el script se detenga después de redirigir.
}

require_once "../../../Modelo/ConexionBD.php";

$conexion = new ConexionBD();
$conexion->abrir();

$sql = "SELECT * FROM tbl_formulario";
$conexion->consulta($sql);
$adopciones = $conexion->obtenerResult();

// Verificar si la consulta ha devuelto resultados
if (!$adopciones) {
    die("Error en la consulta: " . $conexion->obtenerError()); // Muestra un mensaje de error y termina el script.
}

// Verificación adicional: comprobar si hay filas
if ($adopciones->num_rows === 0) {
    echo '<script>alert("No se encontraron formularios de adopción"); window.location.href = "../../../Vista/Html/Inicio/Administrador.php";</script>';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/adopciones.css">
    <title>Solicitudes de Adopción</title>
</head>
<body>
    <header>
     
        <h1>Solicitudes de Adopción</h1>
    </header>

    <section>
        <ul>
            <?php while ($fila = $adopciones->fetch_assoc()) { ?>
                <li><a href="DetalleAdopcion.php?id=<?php echo $fila['id_formulario']; ?>"><?php echo $fila['nombre']; ?></a></li>
            <?php } ?>
        </ul>
    </section>

    <a href="../Inicio/Administrador.php" class="back-btn">Volver</a>
</body>
</html>
