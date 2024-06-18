<?php
require ('../../../Modelo/conexionBD.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["NuevaContraseña"]) && isset($_POST["id"])) {
    $nuevaContraseña = $_POST["NuevaContraseña"];
    $idUsuario = $_POST["id"];

    $conexion = new conexionBD();
    $conexion->abrir();


    $sql = "UPDATE tbl_usuarios SET Contraseña = '$nuevaContraseña' WHERE Id_usuario = '$idUsuario'";
    $conexion->consulta($sql);

    if ($conexion->obtenerFilasAfectadas() > 0) {
        echo '<script>alert("La contraseña se actualizo con exito. Pulsa aceptar para volver al login"); window.location.href = "Login.html";</script>';
    } else {
        echo 'Hubo un error al actualizar la contraseña.';
    }
} else {
    header("Location: CambiarClave.php");
}
?>
