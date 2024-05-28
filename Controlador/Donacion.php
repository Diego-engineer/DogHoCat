<?php

    class donaciones{

        private $Documento;

        private $Dinero;

        Private $Insumos;

        private $Descripcion;
        private $Valor;
        private $Lugar;
        private $Fecha;


        public function __construct(){

            $this ->Documento = "";
            $this->Dinero= "";
            $this->Insumos="";
            $this->Descripcion = "";
            $this->Valor = "";
            $this->Lugar = "";
            $this->Fecha = "";
        }

        public function Donacion1($Documento, $Dinero, $Valor, $Lugar, $Fecha){
            $this ->Documento = $Documento;
            $this ->Dinero= $Dinero;
            $this ->Valor = $Valor;
            $this ->Lugar = $Lugar;
            $this -> Fecha = $Fecha;
        }

        public function Donacion2($Documento, $Insumos, $Descripcion, $Lugar, $Fecha){
            $this ->Documento = $Documento;
            $this ->Insumos = $Insumos;
            $this ->Descripcion = $Descripcion;
            $this ->Lugar = $Lugar;
            $this -> Fecha = $Fecha;

        }
        function getDocumento(){
            return $this->Documento;
        }
        function getDinero(){
            return $this->Dinero;
        }
        function getInsumos(){
            return $this->Insumos;
        }
        function getDescripcion(){
            return $this->Descripcion;
        }
        function getValor(){
            return $this->Valor;
        }
        function getLugar(){
            return $this->Lugar;
        }
        function getFecha(){
            return $this->Fecha;
        }
    }
?>