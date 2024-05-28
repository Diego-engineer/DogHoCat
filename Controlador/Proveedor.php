<?php

    class Proveedor{

        private $Nit;
        private $Nombre;
        private $Direccion;
        private $Telefono;


        public function __construct(){

            $this ->Nit ="";
            $this ->Nombre ="";
            $this ->Direccion="";
            $this ->Telefono="";
        }


        public function Proveedor($Nit, $Nombre, $Direccion, $Telefono){
            $this-> Nit = $Nit;
            $this-> Nombre = $Nombre;
            $this->Direccion = $Direccion;
            $this-> Telefono = $Telefono;
        }

        function getNit(){
            return $this->Nit;
        }

        function getNombre(){
            return $this->Nombre;
        }

        function getDireccion(){
            return $this ->Direccion;
        }

        function getTelefono (){
            return $this->Telefono;
        }
    }
?>



 