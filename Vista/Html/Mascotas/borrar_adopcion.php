<?php
// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Decodificar los datos JSON recibidos
    $data = json_decode(file_get_contents("php://input"), true);

    // Verificar si se recibió el ID del formulario
    if (isset($data["id"])) {
        $idFormulario = intval($data["id"]);

        // Aquí deberías realizar la lógica para borrar los datos de la adopción y la solicitud
        // Por ejemplo, podrías ejecutar una consulta SQL para borrar los registros de las tablas correspondientes
        require_once "../../../Modelo/conexionBD.php";

        $conexion = new conexionBD();
        if ($conexion->abrir() === 0) {
            die("Error de conexión a la base de datos.");
        }

        $sqlDeleteFormulario = "DELETE FROM tbl_formulario WHERE id_formulario = $idFormulario";
        $sqlDeleteSolicitud = "DELETE FROM tbl_solicitud WHERE id_formulario = $idFormulario";

        $conexion->consulta($sqlDeleteFormulario);
        $conexion->consulta($sqlDeleteSolicitud);

        $conexion->cerrar();

        // Si el borrado se realizó correctamente, devolver una respuesta exitosa
        http_response_code(200);
        echo json_encode(array("message" => "Borrado exitoso."));
    } else {
        // Si no se recibió el ID del formulario, devolver un mensaje de error
        http_response_code(400);
        echo json_encode(array("message" => "Falta el ID del formulario."));
    }
} else {
    // Si la solicitud no es POST, devolver un mensaje de error
    http_response_code(405);
    echo json_encode(array("message" => "Método no permitido."));
}
?>
