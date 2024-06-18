<?php
    require_once "../../../Modelo/ConexionBD.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['paciente"'])) {
        $paciente_id = $_POST['paciente"'];

        $conexion = new ConexionBD();
        $conexion->abrir();

        $sql = "SELECT Tipo_Animal, Raza, Edad, Sexo FROM tbl_animales WHERE Id_Animal = $paciente_id";
        $stmt = $conexion->getConexion()->prepare($sql);
        $stmt->bind_param("i", $paciente_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $animal = $result->fetch_assoc();
            echo json_encode($animal);
        } else {
            echo json_encode(["error" => "No se encontró ningún animal con ese ID"]);
        }

        $stmt->close();
        $conexion->cerrar();
    }
?>
