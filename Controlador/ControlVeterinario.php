<?php 

    require_once "Veterinario.php";
    require_once "registrarControl.php";

    if (isset($_POST["fecha"]) && isset($_POST["veterinario"]) && isset($_POST["paciente"]) && isset($_POST["tipo"]) && isset($_POST["raza"]) && isset($_POST["edad"]) && isset($_POST["sexo"]) && isset($_POST["historial"]) && isset ($_POST["condicion"]) && isset($_POST["tratamientos"]) && isset($_POST["comentarios"]) && isset($_POST["corporal"]) && isset($_POST["muscular"]) && isset($_POST["peso"]) && isset($_POST["mantener"])) {
        try {

            $Fecha = $_POST["fecha"];
            $Veterinario = $_POST["veterinario"];
            $Paciente = $_POST["paciente"];
            $Tipo = $_POST["tipo"];
            $Raza = $_POST["raza"];
            $Edad = $_POST["edad"];
            $Sexo = $_POST["sexo"];
            $Historial = $_POST["historial"];
            $Condicion = $_POST["condicion"];
            $Tratamiento = $_POST["tratamientos"];
            $Comentario = $_POST["comentarios"];
            $Corporal = $_POST["corporal"];
            $Muscular = $_POST["muscular"];
            $Peso = $_POST["peso"];
            $Mantener = $_POST["mantener"];

            $control = new control();
            $control -> Control($Fecha, $Veterinario, $Paciente, $Tipo, $Raza, $Edad, $Sexo, $Historial, $Condicion, $Tratamiento, $Comentario, $Corporal, $Muscular, $Peso, $Mantener);
            $regControl = new registrarControles();
            $regControl->regControl($control);
        } catch (Exception $ex) {
            echo 'Error: ' . $ex->getMessage();
        }
    } else {
        echo "Llenar todos los campos";
    }
    

?>