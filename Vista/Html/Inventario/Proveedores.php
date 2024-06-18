<?php
    include '../../../Modelo/conexionBD.php';

    

    if (isset($_GET['eliminar'])) {
        $NitEliminar = $_GET['eliminar'];
        $conexion = new conexionBD();
        $conexion->abrir();

        $sql = "DELETE FROM tbl_proveedores WHERE Nit = $NitEliminar";
        $conexion->consulta($sql);

        if ($conexion->obtenerFilasAfectadas() > 0) {
            echo '<script>alert("PROVEEDOR ELIMINADO.");</script>';
        } else {
            echo "Error al eliminar al Proveedor.";
        }
    }

    // Obtener y mostrar los usuarios existentes
    $conexion = new conexionBD();
    $conexion->abrir();

    $sql = "SELECT * FROM tbl_proveedores";
    $conexion->consulta($sql);
    $result = $conexion->obtenerResult();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista De Proveedores</title>
    <link rel="stylesheet" href="../../Estilos/Tablas.css">
</head>
<body>
    <br><br>
<form action="../../../Controlador/buscarProveedor.php" method="POST">
            <input type="text" id="buscarNit" name="buscarNit">
            <input type="submit" value="Buscar">
        </form>
        <br>

    <table border="1">
        <tr>
            <th>Nit</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>

        <?php while ($fila = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $fila['Nit']; ?></td>
                <td><?php echo $fila['Nombre']; ?></td>
                <td><?php echo $fila['Direccion']; ?></td>
                <td><?php echo $fila['Telefono']; ?></td>
                
                <td>
                    <a href="editarP.php?Nit=<?php echo $fila['Nit']; ?>">Editar</a>
                    <a href="?eliminar=<?php echo $fila['Nit']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </table> <br><br><br>
    <center><a href="Reportes.php" style="display: inline-block; padding: 13px 55px; border: 1px solid black; border-radius: 25px; color: black; text-decoration: none;"> Generar Reporte </a></center> <br>
    <center><a href="../Inicio/Administrador.php" style="display: inline-block; padding: 13px 55px; border: 1px solid black; border-radius: 25px; color: black; text-decoration: none;"> Atras </a></center>

        
</body>
</html>
