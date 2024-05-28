<?php

    class usuarios{

        private $Documento;
        private $Nombres;
        private $Apellidos;
        private $Ciudad;
        private $Direccion;
        private $Correo;
        private $Telefono;
        private $Rol;
        private $Contraseña;


        public function __construct(){

            $this->Documento= "";
            $this->Nombres = "";
            $this->Apellidos = "";
            $this->Ciudad = "";
            $this->Direccion = "";
            $this->Correo = "";
            $this->Telefono = "";
            $this->Rol = "";
            $this->Contraseña = "";
        }

        public function Usuarios($Documento, $Nombres, $Apellidos, $Ciudad, $Direccion,$Correo,$Telefono,$Rol,$Contraseña){
            $this->Documento = $Documento;
            $this->Nombres = $Nombres;
            $this->Apellidos= $Apellidos;
            $this->Ciudad = $Ciudad;
            $this->Direccion = $Direccion;
            $this->Correo = $Correo;
            $this->Telefono = $Telefono;
            $this->Rol = $Rol;
            $this->Contraseña = $Contraseña;
        }

        function getDocumento(){
            return $this->Documento;
        }
        function getNombres(){
            return $this->Nombres;
        }
        function getApellidos(){
            return $this->Apellidos;
        }
        function getCiudad(){
            return $this->Ciudad;
        }
        function getDireccion(){
            return $this->Direccion;
        }
        function getCorreo(){
            return $this->Correo;
        }
        function getTelefono(){
            return $this->Telefono;
        }
        function getRol(){
            return $this->Rol;
        }
        function getContraseña(){
            return $this->Contraseña;
        }
    }
?>