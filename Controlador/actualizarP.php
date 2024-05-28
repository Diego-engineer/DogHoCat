<?php
require_once "../Modelo/ConexionBD.php";

$conexion = new conexionBD();

if ($conexion->abrir()) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Nit= $_POST['Nit'];
        $nombre = $_POST['Nombre'];
        $direccion = $_POST['Direccion'];
        $telefono = $_POST['Telefono'];

        $sql = "UPDATE tbl_proveedores SET  Nombre='$nombre', Direccion='$direccion', Telefono='$telefono' WHERE Nit=$Nit";
        
        $conexion->consulta($sql);

        if ($conexion->obtenerFilasAfectadas() > 0) {

            echo '<script>alert("DATOS DEL PROVEEDOR ACTUALIZADOS."); window.location.href = "../Vista/Html/Inventario/Proveedores.php";</script>';
        } else {
            echo '<script>alert("ERROR A EDITAR LOS DATOS DEL PROVEEDOR."); window.location.href = "../Vista/Html/Inicio/Administrador.php";</script>';
        }
    } else {
        echo "Solicitud incorrecta.";
    }
} else {
    echo "Error en la conexión a la base de datos.";
}
?>
