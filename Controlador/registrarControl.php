<?php 
require_once "../Modelo/ConexionBD.php";

class RegistrarControles {

    public function regControl (Control $regControl) {
        try {

            $conexion = new conexionBD();
            $conexion ->abrir();
            $Fecha = $regControl -> getFecha();
            $Veterinario = $regControl -> getVeterinario();
            $Paciente = $regControl -> getPaciente();
            $Tipo = $regControl -> getTipo();
            $Raza = $regControl -> getRaza();
            $Edad = $regControl -> getEdad();
            $Sexo = $regControl -> getSexo();
            $Historial = $regControl -> getHistorial();
            $Condicion = $regControl -> getCondicion();
            $Tratamiento = $regControl -> getTratamiento();
            $Comentario = $regControl -> getComentario();
            $Corporal = $regControl -> getCorporal();
            $Muscular = $regControl -> getMuscular();
            $Peso = $regControl -> getPeso();
            $Mantener = $regControl -> getMantener();

            $sql = "INSERT INTO tbl_controles VALUES ('$Fecha','$Veterinario','$Paciente','$Tipo', '$Raza', '$Edad', '$Sexo', '$Historial', '$Condicion', '$Tratamiento', '$Comentario', '$Corporal', '$Muscular', '$Peso', '$Mantener')";

            $conexion ->consulta ($sql);
            $res = $conexion ->obtenerFilasAfectadas();

            if ($res > 0) {
                echo '<script>alert("Control Creado y registrado, pulsa aceptar para ir al Inicio."); window.location.href = "../Vista/Html/Mascotas/control.php";</script>';
            } else {
                echo "Error al registrar el Control";
            }
        } catch (Exception $ex) {
            return "Error: " . $ex->getMessage();
        }
    }


}
?>