<?php
    include '../../../Modelo/conexionBD.php';

    

    if (isset($_GET['eliminar'])) {
        $idEliminar = $_GET['eliminar'];
        $conexion = new conexionBD();
        $conexion->abrir();

        $sql = "DELETE FROM tbl_usuarios WHERE Id_usuario = $idEliminar";
        $conexion->consulta($sql);

        if ($conexion->obtenerFilasAfectadas() > 0) {
            echo "Usuario eliminado correctamente.";
        } else {
            echo "Error al eliminar el usuario.";
        }
    }

    $sql = "SELECT * FROM tbl_usuarios";
    $conexion->consulta($sql);
    $result = $conexion->obtenerResult();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar y eliminar usuarios</title>
    <link rel="stylesheet" href="../../Estilos/Tablas.css">
</head>
<body>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Ciudad</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>

        <?php while ($fila = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $fila['Id_usuario']; ?></td>
                <td><?php echo $fila['Documento']; ?></td>
                <td><?php echo $fila['Nombres']; ?></td>
                <td><?php echo $fila['Apellidos']; ?></td>
                <td><?php echo $fila['Ciudad']; ?></td>
                <td><?php echo $fila['Correo']; ?></td>
                <td><?php echo $fila['Telefono']; ?></td>
                <td><?php echo $fila['Rol']; ?></td>
                <td><?php echo $fila['Contraseña']; ?></td>
                
                <td>
                    <a href="editar.php?id=<?php echo $fila['Id_usuario']; ?>">Editar</a>
                    <a href="?eliminar=<?php echo $fila['Id_usuario']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </table> <br><br><br>
    <center><a href="Reportes.php" style="display: inline-block; padding: 13px 55px; border: 1px solid black; border-radius: 25px; color: black; text-decoration: none;"> Generar Reporte </a></center> <br>
    <center><a href="Administrador.php" style="display: inline-block; padding: 13px 55px; border: 1px solid black; border-radius: 25px; color: black; text-decoration: none;"> Atras </a></center>

        <form action="../../../Controlador/buscarUsuario.php" method="POST">
            <input type="text" id="buscarId" name="buscarId">
            <input type="submit" value="Buscar">
        </form>
</body>
</html>
