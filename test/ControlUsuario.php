<?php

require_once 'Usuario.php';
require_once 'ComparadorUsuario.php';

function crearUsuarioPrueba() {
    $nuevo = new usuarios();
    $nuevo->Usuarios(1022, 'Diego', 'Alarcon', 'Bogota', 'Calle 45 #12', 'diego@gmail.com', '3028183867', '1', '12345');
    return $nuevo;
}
?>