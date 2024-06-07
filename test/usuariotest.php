<?php

require_once 'ControlUsuario.php';
require_once 'Usuario.php';

use PHPUnit\Framework\TestCase;

class RegistrarUsuarioTest extends TestCase {
    public function testRegistroUsuario() {
        // Simulamos datos para la prueba
        $_POST['Documento'] = 1022;
        $_POST['Nombres'] = 'Diego';
        $_POST['Apellidos'] = 'Alarcon';
        $_POST['Ciudad'] = 'Bogota';
        $_POST['Direc'] = 'Calle 45 #12';
        $_POST['Correo'] = 'diego@gmail.com';
        $_POST['Telefono'] = '3028183867';
        $_POST['Rol'] = '1';
        $_POST['Contra'] = '12345';

        $nuevo = new usuarios();

        $nuevo->Usuarios($_POST['Documento'], $_POST['Nombres'], $_POST['Apellidos'], $_POST['Ciudad'], $_POST['Direc'], $_POST['Correo'], $_POST['Telefono'], $_POST['Rol'], $_POST['Contra']);

        $UsuarioPrueba = crearUsuarioPrueba();

        $comparador = new ComparadorUsuarios();
        
        $this->assertTrue($comparador->sonIguales($nuevo, $UsuarioPrueba));
    }
}
?>