<?php

    class Insumos{

        private $Categoria;
        private $Insumo;
        private $Proveedor;
        private $Codigo;
        private $Precio;


        public function __construct(){

            $this ->Categoria ="";
            $this ->Insumo ="";
            $this ->Proveedor="";
            $this ->Codigo="";
            $this ->Precio="";
        }


        public function Insumos($Categoria, $Insumo, $Proveedor, $Codigo,$Precio){
            $this-> Categoria = $Categoria;
            $this-> Insumo = $Insumo;
            $this->Proveedor = $Proveedor;
            $this-> Codigo = $Codigo;
            $this -> Precio = $Precio;
        }

        function getCategoria(){
            return $this->Categoria;
        }

        function getInsumo(){
            return $this->Insumo;
        }

        function getProveedor(){
            return $this ->Proveedor;
        }

        function getCodigo (){
            return $this->Codigo;
        }

        function getPrecio (){
            return $this->Precio;
        }
    }
?>



 