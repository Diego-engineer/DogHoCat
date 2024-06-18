<?php
session_start();

// Destruir todas las variables de sesión
session_destroy();

// Redirigir a la página de inicio de sesión u otra página
header("Location: ../Inicio/Login.html");
exit;
?>