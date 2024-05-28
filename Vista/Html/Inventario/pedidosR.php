<?php
    include '../../../Modelo/conexionBD.php';

    $conexion = new conexionBD();
    $conexion->abrir();

    $sql = "SELECT p.Cantidad, p.Observaciones, i.Nombre_Insumo
            FROM tbl_pedidos AS p
            INNER JOIN tbl_registrar_insumos AS i ON p.Codigo_Insumo = i.Codigo_Insumo";
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
            <th>Nombre Insumo</th>
            <th>Cantidad</th>
            <th>Observaciones</th>
        </tr>

        <?php while ($fila = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $fila['Nombre_Insumo']; ?></td>
                <td><?php echo $fila['Cantidad']; ?></td>
                <td><?php echo $fila['Observaciones']; ?></td>
            </tr>
        <?php } ?>
    </table> <br><br><br>
    <center><a href="../Inicio/Administrador.php" style="display: inline-block; padding: 13px 55px; border: 1px solid black; border-radius: 25px; color: black; text-decoration: none;"> Atras </a></center>
</body>
</html>
