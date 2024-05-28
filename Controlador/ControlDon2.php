<?php

    require_once "Donacion.php";
    require_once "registrarDonacion.php";
    
    if (isset($_POST["Documento"])&& isset($_POST["Insumos"])&& isset($_POST["Descripcion"])&& isset($_POST["Lugar"])&& isset($_POST["Fecha"])) {
        try {
            $Documento = $_POST["Documento"];
            $Insumos = $_POST["Insumos"];
            $Descripcion = $_POST["Descripcion"];
            $Lugar = $_POST["Lugar"];
            $Fecha = $_POST["Fecha"];
            $donacion = new donaciones();
            $donacion->Donacion2($Documento, $Insumos, $Descripcion, $Lugar, $Fecha);
            $regDonaciones = new registrarDonacion2();
            $regDonaciones->regDonacion2($donacion);
        } catch (Exception $ex) {
            echo 'Erros'.$ex;
        }
    }else{
        echo("Llenar todos los campos");
    }
?>