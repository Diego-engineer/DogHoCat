<?php
require_once "Formulario.php";
require_once "registrarFormulario.php";

if (!empty($_POST["nombre"]) && !empty($_POST["correo"]) && !empty($_POST["telefono"]) && !empty($_POST["direccion"]) && !empty($_POST["mental"]) && !empty($_POST["motivo"]) && !empty($_POST  ["dinero"]) && !empty($_POST["experiencia"]) && !empty($_POST["antes"]) && !empty($_POST["casa"]) && !empty($_POST["patio"]) && !empty($_POST["niños"]) && !empty($_POST["deacuerdo"]) && !empty($_POST["enseñanza"]) && !empty($_POST["libertad"]) && !empty($_POST["condiciones"]) && !empty($_POST["quedara"]) && !empty($_POST["encerrar"])){

    try {
        
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $mental = $_POST["mental"];
        $motivo = $_POST["motivo"];
        $dinero = $_POST["dinero"];
        $experiencia = $_POST["experiencia"];
        $antes = $_POST["antes"];
        $casa = $_POST["casa"];
        $patio = $_POST["patio"];
        $niños = $_POST["niños"];
        $deacuerdo = $_POST["deacuerdo"];
        $enseñanza = $_POST["enseñanza"];
        $libertad = $_POST["libertad"];
        $condiciones = $_POST["condiciones"];
        $quedara = $_POST["quedara"];
        $encerrar = $_POST["encerrar"];

        $formulario = new formulario;
        $formulario->Formulario($nombre, $correo, $telefono, $direccion, $mental, $motivo, $dinero, $experiencia, $antes, $casa, $patio, $niños, $deacuerdo, $enseñanza, $libertad, $condiciones, $quedara, $encerrar);
        $regFormulario = new registrarFormulario();
        $regFormulario->regFormulario($formulario);

    } catch (Exception $ex) {
        echo 'Error: ' .$ex->getMessage();
    }

}else{
    echo "Llenar el formulario en su totalidad";
}