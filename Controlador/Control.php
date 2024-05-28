<?php
require_once "Usuario.php";
require_once "registrarUsuario.php";

if (!empty($_POST["Documento"]) && !empty($_POST["Nombres"]) && !empty($_POST["Apellidos"]) && !empty($_POST["Ciudad"]) && !empty($_POST["Direc"]) && !empty($_POST["Correo"]) && !empty($_POST["Telefono"]) && !empty($_POST["Rol"]) && !empty($_POST["Contra"])) {
    try {
        $Documento = $_POST["Documento"];
        $Nombres = $_POST["Nombres"];
        $Apellidos = $_POST["Apellidos"];
        $Ciudad = $_POST["Ciudad"];
        $Direccion = $_POST["Direc"];
        $Correo = $_POST["Correo"];
        $Telefono = $_POST["Telefono"];
        $Rol = $_POST["Rol"];
        $Contraseña = $_POST["Contra"];
        $personal = new usuarios();
        $personal->Usuarios($Documento, $Nombres, $Apellidos, $Ciudad, $Direccion, $Correo, $Telefono, $Rol, $Contraseña);
        $regClientes = new registrarUsuario();
        $regClientes->regUsuario($personal);

    } catch (Exception $ex) {
        echo 'Error: ' . $ex->getMessage();
    }
} else {
    echo "Llenar todos los campos";
}
?>
