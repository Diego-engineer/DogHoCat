<?php 

    require_once "Insumos.php";
    require_once "registrarInsumos.php";

    if (!empty($_POST["Categoria"])&& !empty($_POST["Insumo"])&& !empty($_POST["Proveedor"])&& !empty($_POST["Codigo"])&& !empty($_POST["precio"])) {

        try {

            $Categoria = $_POST["Categoria"];
            $Insumo = $_POST["Insumo"];
            $Proveedor = $_POST["Proveedor"];
            $Codigo = $_POST["Codigo"];
            $Precio = $_POST["precio"];
            $in = new insumos();
            $in ->Insumos($Categoria,$Insumo,$Proveedor,$Codigo,$Precio);
            $regInsumos = new registrarInsumos();
            $regInsumos ->regInsumos($in);
         
        } catch (Exception $ex) {
            echo 'Erros'.$ex;
        }

        
    } else {
        echo ("Llenar todos los campos");
    }
?>