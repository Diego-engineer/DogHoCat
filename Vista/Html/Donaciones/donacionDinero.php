<?php 
    include '../../../Modelo/conexionBD.php'; 

    $conexion = new conexionBD();
    $conexion->abrir();

    $sql = "SELECT * FROM tbl_dinero";
    $conexion->consulta($sql);
    $result = $conexion->obtenerResult();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Donaciones de Dinero</title>
    <link rel="stylesheet" href="../../Estilos/Tablas.css">
</head>
<body>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Documento</th>
            <th>Dinero</th>
            <th>Valor</th>
            <th>Lugar</th>
            <th>Fecha</th>
        </tr>
        <?php while ($fila = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $fila['id_dinero']; ?></td>
                <td><?php echo $fila['Documento']; ?></td>
                <td><?php echo $fila['Tipo_Donacion']; ?></td>
                <td><?php echo $fila['Valor']; ?></td>
                <td><?php echo $fila['Lugar']; ?></td>
                <td><?php echo $fila['Fecha']; ?></td>
            </tr> 
        <?php } ?> 
    </table> <br>
    <center><a href="../Donaciones/ReporteD.php" style="display: inline-block; padding: 13px 55px; border: 1px solid black; border-radius: 25px; color: black; text-decoration: none;"> Generar Reporte </a></center> <br>
    <center><a href="../Inicio/Administrador.php" style="display: inline-block; padding: 13px 55px; border: 1px solid black; border-radius: 25px; color: black; text-decoration: none;"> Atras </a></center>
</body>
</html>