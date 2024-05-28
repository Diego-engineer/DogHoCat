<?php
    include '../../../Modelo/conexionBD.php';

    

    if (isset($_GET['eliminar'])) {
        $idEliminar = $_GET['eliminar'];
        $conexion = new conexionBD();
        $conexion->abrir();

        $sql = "DELETE FROM tbl_inventarios  WHERE Id_registro = $idEliminar";
        $conexion->consulta($sql);

        if ($conexion->obtenerFilasAfectadas() > 0) {
            echo "Inventario eliminado correctamente.";
        } else {
            echo "Error al eliminar el inventario.";
        }
    }

    // Obtener y mostrar los usuarios existentes
    $conexion = new conexionBD();
    $conexion->abrir();

    $sql = "SELECT * FROM tbl_inventarios";
    $conexion->consulta($sql);
    $result = $conexion->obtenerResult();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar y eliminar Inventarios</title>
    <link rel="stylesheet" href="../../Estilos/Tablas.css">
</head>
<body>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Mascota</th>
            <th>Insumo</th>
            <th>Fecha de entrada</th>
            <th>Cantidad de entrada</th>
            <th>Cantidad de salida </th>
            <th>Disponibilidad del Animal</th>
        </tr>

        <?php while ($fila = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $fila['Id_Animal']; ?></td>
                <td><?php echo $fila['Tipo_Animal']; ?></td>
                <td><?php echo $fila['Nombre']; ?></td>
                <td><?php echo $fila['Edad']; ?></td>
                <td><?php echo $fila['Raza']; ?></td>
                <td><?php echo $fila['Tamaño']; ?></td>
                <td><?php echo $fila['Color']; ?></td>
                <td><?php echo $fila['Sexo']; ?></td>
                <td><?php echo $fila['Foto']; ?></td>
                
                <td>
                    <a href="edimasc.php?id=<?php echo $fila['Id_Animal']; ?>">Editar</a>
                    <a href="?eliminar=<?php echo $fila['Id_Animal']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>