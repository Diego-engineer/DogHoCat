<?php

    class formulario {

        private $nombre;
        private $correo;
        private $telefono;
        private $direccion;
        private $mental;
        private $motivo;
        private $dinero;
        private $experiencia;
        private $antes;
        private $casa;
        private $patio;
        private $niños;
        private $deacuerdo;
        private $enseñanza;
        private $libertad;
        private $condiciones;
        private $quedara;
        private $encerrar;

        public function __construct(){
            
            $this ->nombre="";
            $this ->correo="";
            $this ->telefono="";
            $this ->direccion="";
            $this ->mental="";
            $this ->motivo="";
            $this ->dinero="";
            $this ->experiencia="";
            $this ->antes="";
            $this ->casa="";
            $this ->patio="";
            $this ->niños="";
            $this ->deacuerdo="";
            $this ->enseñanza="";
            $this ->libertad="";
            $this ->condiciones="";
            $this ->quedara="";
            $this ->encerrar="";
        }

        public function Formulario($nombre, $correo, $telefono, $direccion, $mental, $motivo, $dinero, $experiencia, $antes, $casa, $patio, $niños, $deacuerdo, $enseñanza, $libertad, $condiciones, $quedara, $encerrar){

            $this->nombre=$nombre;
            $this->correo=$correo;
            $this->telefono=$telefono;
            $this->direccion=$direccion;
            $this->mental=$mental;
            $this->motivo=$motivo;
            $this->dinero=$dinero;
            $this->experiencia=$experiencia;
            $this->antes=$antes;
            $this->casa=$casa;
            $this->patio=$patio;
            $this->niños=$niños;
            $this->deacuerdo=$deacuerdo;
            $this->enseñanza=$enseñanza;
            $this->libertad=$libertad;
            $this->condiciones=$condiciones;
            $this->quedara=$quedara;
            $this->encerrar=$encerrar;
        }

        function getnombre(){
            return $this->nombre;
        }

        function getcorreo(){
            return $this->correo;
        }

        function gettelefono(){
            return $this->telefono;
        }

        function getdireccion(){
            return $this->direccion;
        }

        function getmental(){
            return $this->mental;
        }

        function getmotivo(){
            return $this->motivo;
        }

        function getdinero(){
            return $this->dinero;
        }
        
        function getexperiencia(){
            return $this->experiencia;
        }

        function getantes(){
            return $this->antes;
        }

        function getcasa(){
            return $this->casa;
        }

        function getpatio(){
            return $this->patio;
        }

        function getniños(){
            return $this->niños;
        }

        function getdeacuerdo(){
            return $this->deacuerdo;
        }

        function getenseñanza(){
            return $this->enseñanza;
        }

        function getlibertad(){
            return $this->libertad;
        }

        function getcondiciones(){
            return $this->condiciones;
        }

        function getquedara(){
            return $this->quedara;
        }

        function getencerrar(){
            return $this->encerrar;
        }

    }
