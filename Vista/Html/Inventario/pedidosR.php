<?php
include '../../../Modelo/conexionBD.php';

$conexion = new conexionBD();
$conexion->abrir();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $codigoInsumo = $_POST['codigoInsumo'];
    $cantidad = $_POST['cantidad'];
    $observaciones = $_POST['observaciones'];

    $sql = "UPDATE tbl_pedidos SET Cantidad = '$cantidad', Observaciones = '$observaciones' WHERE Codigo_Insumo = '$codigoInsumo'";
    $conexion->consulta($sql);
    echo json_encode(['success' => true]);
    exit;
}

$sql = "SELECT p.Codigo_Insumo, p.Cantidad, p.Observaciones, p.Fecha, p.Total, i.Nombre_Insumo
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
            <th>Fecha</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>

        <?php if ($result && mysqli_num_rows($result) > 0) {
            while ($fila = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $fila['Nombre_Insumo']; ?></td>
                    <td><input type="number" value="<?php echo $fila['Cantidad']; ?>" readonly></td>
                    <td><input type="text" value="<?php echo $fila['Observaciones']; ?>" readonly></td>
                    <td><?php echo $fila['Fecha']; ?></td>
                    <td><?php echo $fila['Total']; ?></td>
                    <td>
                        <button onclick="habilitarEdicion(this, '<?php echo $fila['Codigo_Insumo']; ?>')">Actualizar</button>
                    </td>
                </tr>
            <?php }
        } else {
            echo "<tr><td colspan='6'>No se encontraron resultados.</td></tr>";
        } ?>
    </table>
    <br><br><br>
    <center><a href="../Inicio/Administrador.php" style="display: inline-block; padding: 13px 55px; border: 1px solid black; border-radius: 25px; color: black; text-decoration: none;"> Atras </a></center>

    <script>
        function habilitarEdicion(button, codigoInsumo) {
            var row = button.parentNode.parentNode;
            var cantidadInput = row.querySelector("input[type='number']");
            var observacionesInput = row.querySelector("input[type='text']");

            cantidadInput.readOnly = false;
            observacionesInput.readOnly = false;

            button.innerText = "Guardar";
            button.onclick = function() {
                var cantidad = cantidadInput.value;
                var observaciones = observacionesInput.value;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            alert("Actualización exitosa");
                        } else {
                            alert("Error al actualizar");
                        }

                        cantidadInput.readOnly = true;
                        observacionesInput.readOnly = true;
                        button.innerText = "Actualizar";
                        button.onclick = function() {
                            habilitarEdicion(button, codigoInsumo);
                        };
                    }
                };
                xhr.send("update=true&codigoInsumo=" + codigoInsumo + "&cantidad=" + cantidad + "&observaciones=" + observaciones);
            };
        }
    </script>
</body>
</html>
