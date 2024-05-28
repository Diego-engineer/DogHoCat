<?php
session_start();
include '../../../Modelo/conexionBD.php';

if (!isset($_SESSION['Rol'])) {
    header("location: ../Inicio/Login.html");
    exit();
}

$rolUsuario = $_SESSION['Rol'];

if (isset($_GET['eliminar'])) {
    $idEliminar = $_GET['eliminar'];
    $conexion = new conexionBD();
    $conexion->abrir();

    $sql = "DELETE FROM tbl_animales WHERE Id_Animal = $idEliminar";
    $conexion->consulta($sql);

    if ($conexion->obtenerFilasAfectadas() > 0) {
        echo "Mascota eliminada correctamente.";
    } else {
        echo "Error al eliminar la mascota.";
    }
}

// Obtener y mostrar los usuarios existentes
$conexion = new conexionBD();
$conexion->abrir();

// Modificar la consulta SQL para usar JOIN y obtener el nombre del tipo de animal
$sql = "SELECT a.*, t.Nombre_Tipo
        FROM tbl_animales a 
        JOIN tbl_tipo_animales t 
        ON a.Tipo_Animal = t.id_animal";
$conexion->consulta($sql);
$result = $conexion->obtenerResult();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar y eliminar Animales</title>
    <link rel="stylesheet" href="../../Estilos/Tablas.css">
</head>
<body>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tipo Animal</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Raza</th>
            <th>Tamaño</th>
            <th>Color</th>
            <th>Sexo</th>
            <th>Foto</th>
            <th>Acciones</th>
        </tr>

        <?php while ($fila = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $fila['Id_Animal']; ?></td>
                <td><?php echo $fila['Nombre_Tipo']; ?></td>
                <td><?php echo $fila['Nombre']; ?></td>
                <td><?php echo $fila['Edad']; ?></td>
                <td><?php echo $fila['Raza']; ?></td>
                <td><?php echo $fila['Tamaño']; ?></td>
                <td><?php echo $fila['Color']; ?></td>
                <td><?php echo $fila['Sexo']; ?></td>
                <td>
                    <?php 
                    if (isset($fila['Foto'])) {
                        $imagenCodificada = base64_encode($fila['Foto']);
                        echo '<img src="data:image/jpeg;base64,' . $imagenCodificada . '" alt="Imagen de la mascota" width="100">';
                    } else {
                        echo "No disponible";
                    }
                    ?>
                </td>
                <td>
                    <a href="edimasc.php?id=<?php echo $fila['Id_Animal']; ?>">Editar</a>
                    <a href="?eliminar=<?php echo $fila['Id_Animal']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </table> 
    <br><br><br>
    <center><a href="../Mascotas/Reporte.php" style="display: inline-block; padding: 13px 55px; border: 1px solid black; border-radius: 25px; color: black; text-decoration: none;"> Generar Reporte </a></center> <br>
    <?php 
        // Enlace "Atrás" ajustado según el rol del usuario
        if ($rolUsuario == '2') {
            echo '<center><a href="../Inicio/Administrador.php" style="display: inline-block; padding: 13px 55px; border: 1px solid black; border-radius: 25px; color: black; text-decoration: none;"> Atras </a></center>';
        } else if ($rolUsuario == '3') {
            echo '<center><a href="../Mascotas/Veterinario.php" style="display: inline-block; padding: 13px 55px; border: 1px solid black; border-radius: 25px; color: black; text-decoration: none;"> Atras </a></center>';
        }
    ?>
</body>
</html>
