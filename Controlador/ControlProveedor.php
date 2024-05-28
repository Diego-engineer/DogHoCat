<?php 

    require_once "Proveedor.php";
    require_once "RegistrarProvedor.php";

    if (!empty($_POST["Nit"])&& !empty($_POST["Nombre"])&& !empty($_POST["Direccion"])&& !empty($_POST["Telefono"])) {

        try {

            $Nit = $_POST["Nit"];
            $Nombre = $_POST["Nombre"];
            $Direccion = $_POST["Direccion"];
            $Telefono = $_POST["Telefono"];
            $pr = new Proveedor();
            $pr ->Proveedor($Nit,$Nombre,$Direccion,$Telefono);
            $regProveedor = new registrarProveedor();
            $regProveedor ->regProveedor($pr);
        } catch (Exception $ex) {
            echo 'Erros'.$ex;
        }
        echo("Proveedor registrado con  exito");
        
    } else {
        echo ("Llenar todos los campos");
    }
?>