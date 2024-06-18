<?php
// Mostrar todos los errores (solo para depuración, no usar en producción)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar si se recibió el ID del formulario
    if (isset($_POST["id_formulario"])) {
        $idFormulario = intval($_POST["id_formulario"]);

        // Aquí deberías realizar la lógica para marcar el animal como adoptado en la base de datos
        require_once "../../../Modelo/conexionBD.php";

        $conexion = new conexionBD();
        if ($conexion->abrir() === 0) {
            die("Error de conexión a la base de datos.");
        }

        // Actualizar el estado del animal a 'ADOPTADO'
        $sqlActualizarAdoptado = "UPDATE tbl_animales SET Estado = 'ADOPTADO' WHERE Id_Animal IN (SELECT id_animal FROM tbl_formulario WHERE id_formulario = $idFormulario)";
        $conexion->consulta($sqlActualizarAdoptado);

        // Verificar si la actualización fue exitosa
        if ($conexion->obtenerFilasAfectadas() > 0) {
            // Eliminar la solicitud de adopción
            $sqlEliminarSolicitud = "DELETE FROM tbl_formulario WHERE id_formulario = $idFormulario";
            $conexion->consulta($sqlEliminarSolicitud);

            // Verificar si la eliminación fue exitosa
            if ($conexion->obtenerFilasAfectadas() > 0) {
                // Mostrar mensaje de éxito y redirigir
                echo '<script>alert("La Solicitud fue aceptada y eliminada."); window.location.href = "../Mascotas/VerAdopciones.php";</script>';
                exit();
            } else {
                // Mostrar mensaje de error al eliminar la solicitud
                echo '<script>alert("Error al eliminar la solicitud de adopción."); window.location.href = "DetalleAdopcion.php?id=' . $idFormulario . '&status=error";</script>';
                exit();
            }
        } else {
            // Mostrar mensaje de error al actualizar el estado del animal
            echo '<script>alert("Error al actualizar el estado del animal."); window.location.href = "DetalleAdopcion.php?id=' . $idFormulario . '&status=error";</script>';
            exit();
        }
    } else {
        // Si no se recibió el ID del formulario, devolver un mensaje de error
        header("Location: DetalleAdopcion.php?status=missing_id");
        exit();
    }
} else {
    // Si la solicitud no es POST, devolver un mensaje de error
    http_response_code(405);
    echo json_encode(array("message" => "Método no permitido."));
    exit();
}
?>
