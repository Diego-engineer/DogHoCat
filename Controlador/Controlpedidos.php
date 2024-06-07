<?php
include '../Modelo/ConexionBD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = new ConexionBD();

    if ($conexion->abrir() == 0) {
        echo "Error al conectar a la base de datos";
        exit();
    }

    $codigoInsumo = $_POST['codigoInsumo'];
    $cantidad = $_POST['cantidad'];
    $observaciones = $_POST['observaciones'];
    $total = $_POST['total'];

    // Configurar la zona horaria a UTC-5 (Bogotá)
    date_default_timezone_set('America/Bogota');

    // Generar la fecha actual en el formato correcto
    $fecha = date('Y-m-d H:i:s');

    $sql = "INSERT INTO tbl_pedidos (Codigo_insumo, Cantidad, Observaciones, Total, Fecha) VALUES ('$codigoInsumo', '$cantidad', '$observaciones', '$total', '$fecha')";
    $conexion->consulta($sql);
    $res = $conexion->obtenerFilasAfectadas();

    if ($res > 0) {
        echo '<script>alert("Usuario Creado y registrado, pulsa aceptar para ir al Login."); window.location.href = "../Vista/Html/Inicio/Login.html";</script>';
    } else {
        echo "Error al enviar el formulario";
    }
}
?>
