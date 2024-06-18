<?php
require ('../../../Modelo/conexionBD.php');
require 'PhpMailer/PHPMailer.php';
require 'PhpMailer/SMTP.php';
require 'PhpMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["Correo"])) {
    $correo = $_POST["Correo"];

    $conexion = new conexionBD();
    $conexion->abrir();

    $sql = "SELECT id_usuario FROM tbl_usuarios WHERE correo = '$correo'";
    $conexion->consulta($sql);
    $resultado = $conexion->obtenerResult();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        $idUsuario = $usuario['id_usuario'];

        $token = hash('sha256', $idUsuario . $correo . time());

        $url_recuperacion = "http://localhost/DogHoCat/Vista/Html/Inicio/CambiarClave.php?id=" . $idUsuario;
        $mensaje = "Haz clic en el siguiente enlace para restablecer tu contraseña: $url_recuperacion";

        // Configurar PHPMailer
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp-mail.outlook.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'diegoaam788@outlook.com';
        $mail->Password = '741236985D';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('diegoaam788@outlook.com', 'DogHoCat');
        $mail->addAddress($correo);
        $mail->Subject = 'Recuperación de Contraseña';
        $mail->Body    = $mensaje;

        if (!$mail->send()) {
            echo 'Error al enviar el correo. Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo '<script>alert("Se ha enviado un correo con el enlace de recuperación."); window.location.href = "CambiarClave_f.html";</script>';
        }
    } else {
        echo '<script>alert("No se encontro ninguna cuenta asociada a ese correo"); window.location.href = "CambiarClave_f.html";</script>';
    }
} else {
    header("Location: CambiarClave.php");
}
?>
