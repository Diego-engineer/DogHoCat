<?php
session_start();

if (!isset($_SESSION["Rol"])) {
    header("location: ../Inicio/Login.html");
    exit();
}

$rol = $_SESSION["Rol"];
if ($rol != 2 && $rol != 3) {
    header("location: ../Inicio/Login.html");
    exit();
}

require_once "../../../Modelo/conexionBD.php";

$conexion = new conexionBD();
if ($conexion->abrir() === 0) {
    die("Error de conexión a la base de datos.");
}

$id = intval($_GET['id']);

$sql = "SELECT f.*, a.Nombre AS NombreAnimal 
        FROM tbl_formulario f 
        INNER JOIN tbl_animales a ON f.id_animal = a.Id_Animal 
        WHERE f.id_formulario = $id";
$conexion->consulta($sql);
$result = $conexion->obtenerResult();

if (mysqli_num_rows($result) === 0) {
    die("No se encontraron detalles para esta adopción.");
}

$fila = mysqli_fetch_assoc($result);

$status = isset($_GET['status']) ? $_GET['status'] : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/admin.css">
    <title>Detalle de Adopción</title>
</head>
<body>
    <header>
        <a href="CerrarSesion.php" style="display: inline-block; padding: 13px 55px; border: 1px solid black; border-radius: 25px; color: black; text-decoration: none; float: right;">Cerrar Sesión</a>
        <h1>Detalle de Adopción</h1>
    </header>

    <?php if ($status === 'success'): ?>
        <p style="color: green;">La adopción se ha completado con éxito.</p>
    <?php elseif ($status === 'error'): ?>
        <p style="color: red;">Hubo un error al procesar la adopción. Inténtalo de nuevo.</p>
    <?php elseif ($status === 'missing_id'): ?>
        <p style="color: red;">No se proporcionó un ID de formulario válido.</p>
    <?php endif; ?>

    <section>
        <h2><?php echo $fila['nombre']; ?></h2>
        <p><strong>Animal a adoptar:</strong> <?php echo $fila['NombreAnimal']; ?></p>
        <p><strong>Correo:</strong> <?php echo $fila['correo']; ?></p>
        <p><strong>Teléfono:</strong> <?php echo $fila['telefono']; ?></p>
        <p><strong>Dirección:</strong> <?php echo $fila['direccion']; ?></p>
        <p><strong>Estado Mental:</strong> <?php echo $fila['mental']; ?></p>
        <p><strong>Motivo:</strong> <?php echo $fila['motivo']; ?></p>
        <p><strong>Ingresos:</strong> <?php echo $fila['dinero']; ?></p>
        <p><strong>Experiencia:</strong> <?php echo $fila['experiencia']; ?></p>
        <p><strong>¿Ha adoptado antes?:</strong> <?php echo $fila['antes']; ?></p>
        <p><strong>¿Casa propia o arrendada?:</strong> <?php echo $fila['casa']; ?></p>
        <p><strong>¿Tiene patio?:</strong> <?php echo $fila['patio']; ?></p>
        <p><strong>Niños en casa:</strong> <?php echo $fila['niños']; ?></p>
        <p><strong>¿Todos de acuerdo?:</strong> <?php echo $fila['deacuerdo']; ?></p>
        <p><strong>Enseñanza al nuevo amigo:</strong> <?php echo $fila['enseñanza']; ?></p>
        <p><strong>Libertad en casa:</strong> <?php echo $fila['libertad']; ?></p>
        <p><strong>Condiciones para dormir:</strong> <?php echo $fila['condiciones']; ?></p>
        <p><strong>¿Dónde se quedará cuando no esté?:</strong> <?php echo $fila['quedara']; ?></p>
        <p><strong>¿Encerrará al nuevo amigo?:</strong> <?php echo $fila['encerrar']; ?></p>
    </section>
    <form id="formAceptarRechazar" action="procesar_adopcion.php" method="post">
        <input type="hidden" name="id_formulario" value="<?php echo $id; ?>">
        <button type="submit" name="aceptar">Aceptar</button>
        <button type="button" id="btnRechazar">Rechazar</button>
        <a href="../Mascotas/VerAdopciones.php">VOLVER</a>
    </form>
    <script>
        document.getElementById("btnRechazar").addEventListener("click", function() {
            if (confirm("¿Está seguro de que desea rechazar esta adopción?")) {
                fetch("borrar_adopcion.php", {
                method: "POST",
                body: JSON.stringify({ id: <?php echo $id; ?> }),
                headers: {
                    "Content-Type": "application/json"
                }
            });
            }
        });
    </script>
</body>
</html>
