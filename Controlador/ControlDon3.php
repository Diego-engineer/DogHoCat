<?php

    require_once "Donacion.php";
    require_once "registrarDonacionI.php";

    if (($_POST["Documento"])&& !empty($_POST["Dinero"])&& !empty($_POST["Valor"])&& !empty($_POST["Lugar"])&& !empty($_POST["Fecha"])) {
        try {
            $Documento = $_POST["Documento"];
            $Dinero= $_POST["Dinero"];
            $Valor = $_POST["Valor"];
            $Lugar = $_POST["Lugar"];
            $Fecha = $_POST["Fecha"];
            $donacion = new donaciones();
            $donacion->Donacion1($Documento, $Dinero, $Valor, $Lugar, $Fecha);
            $regDonaciones = new registrarDonacion1();
            $regDonaciones->regDonacion1($donacion);

            
        } catch (Exception $ex) {
            echo 'Erros'.$ex;
        }

    }else{
        echo("Llenar todos los campos");
    }

?>

