<?php 
require_once "../Modelo/ConexionBD.php";

class RegistrarVeterinario {

    public function regVeterinario (Veterinario $regVeterinario) {
        try {
            $conexion = new conexionBD();
            $conexion ->abrir();

            $Profesional = $regVeterinario -> getProfesional();
            $mascota = $regVeterinario -> getmascota();
            $Estado = $regVeterinario -> getEstado();
            $Enfermedades = $regVeterinario -> getEnfermedades();
            $Evoluciones = $regVeterinario -> getEvoluciones();
            $Vacunas = $regVeterinario -> getVacunas();
            $Especialidad = $regVeterinario -> getEspecialidad();

            $sql = "INSERT INTO tbl_controles_veterinarios  VALUES ('$Profesional','$mascota','$Estado', '$Enfermedades', '$Evoluciones', '$Vacunas', '$Especialidad')";

            $conexion ->consulta ( $sql);
            $res = $conexion ->obtenerFilasAfectadas();

            if ($res > 0 ) {
                return "Datos de la Mascota Registrado Correctamente, Buen trabajo Soldado !!";
            } else {
                return "Error al Ingresar Datos Soldado !!";
            }
        
        } catch (Exception $ex) {
            return "Error: " . $ex ->getMessage();
        }
    }


}
?>