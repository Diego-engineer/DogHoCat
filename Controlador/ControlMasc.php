<?php
require_once "Mascota.php";
require_once "registrarAnimal.php";

if (isset($_POST["Tipo"], $_POST["Nombre"], $_POST["Edad"], $_POST["Raza"], $_POST["Tamaño"], $_POST["Color"], $_POST["Sexo"])) {

    try { 
        $Tipo_Animal = $_POST["Tipo"];
        $Nombre = $_POST["Nombre"];
        $Edad = $_POST["Edad"];
        $Raza = $_POST["Raza"];
        $Tamaño = $_POST["Tamaño"];
        $Color = $_POST["Color"];
        $Sexo = $_POST["Sexo"];

        $mascota = new mascotas();
        $mascota->Mascota($Tipo_Animal, $Nombre, $Edad, $Raza, $Tamaño, $Color, $Sexo);

        $regAnimal = new registrarAnimal();
        $result = $regAnimal->regAnimal($mascota);

        echo $result;
    } catch (Exception $ex) {
        echo 'Error: ' . $ex->getMessage();
    }

} else {
    echo "Llenar todos los campos";
}
?>