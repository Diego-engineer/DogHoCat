<?php


    class control{

        private $Fecha;

        private $Veterinario;

        private $Paciente;

        private $Tipo;

        private $Raza;

        private $Edad;

        private $Sexo;

        private $Historial;

        private $Condicion;

        private $Tratamiento;
        
        private $Comentario;

        private $Corporal;

        private $Muscular;

        private $Peso;

        private $Mantener;


        public function __construct(){

            $this ->Fecha = "";
            $this ->Veterinario = "";
            $this ->Paciente = "";
            $this ->Tipo = "";
            $this ->Raza = "";
            $this ->Edad = "";
            $this ->Sexo = "";
            $this ->Historial = "";
            $this ->Condicion = "";
            $this ->Tratamiento = "";
            $this ->Comentario = "";
            $this ->Corporal = "";
            $this ->Muscular = "";
            $this ->Peso = "";
            $this ->Mantener = "";
        }


        public function Control($Fecha, $Veterinario, $Paciente, $Tipo, $Raza, $Edad, $Sexo, $Historial, $Condicion, $Tratamiento, $Comentario, $Corporal, $Muscular, $Peso, $Mantener) {

            $this -> Fecha = $Fecha;
            $this -> Veterinario = $Veterinario;
            $this -> Paciente = $Paciente;
            $this -> Tipo = $Tipo;
            $this -> Raza = $Raza;
            $this -> Edad = $Edad;
            $this -> Sexo = $Sexo;
            $this -> Historial = $Historial;
            $this -> Condicion = $Condicion;
            $this -> Tratamiento = $Tratamiento;
            $this -> Comentario = $Comentario;
            $this -> Corporal = $Corporal;
            $this -> Muscular = $Muscular;
            $this -> Peso = $Peso;
            $this -> Mantener = $Mantener;
        }

        function getFecha(){
            return $this -> Fecha;
        }

        function getVeterinario(){
            return $this ->Veterinario;
        }

        function getPaciente(){
            return $this ->Paciente;
        }

        function getTipo(){
            return $this ->Tipo;
        }

        function getRaza(){
            return $this ->Raza;
        }

        function getEdad(){
            return $this ->Edad;
        }

        function getSexo(){
            return $this ->Sexo;
        }

        function getHistorial(){
            return $this ->Historial;
        }

        function getCondicion(){
            return $this -> Condicion;
        }
        
        function getTratamiento(){
            return $this -> Tratamiento;
        }

        function getComentario(){
            return $this -> Comentario;
        }

        function getCorporal(){
            return $this -> Corporal;
        }

        function getMuscular(){
            return $this -> Muscular;
        }

        function getPeso(){
            return $this -> Peso;
        }

        function getMantener(){
            return $this -> Mantener;
        }

    }

?>