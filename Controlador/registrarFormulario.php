<?php

    require_once "../Modelo/ConexionBD.php";

    class RegistrarFormulario {
        public function regFormulario(Formulario $regFormulario){
            try {
                $conexion = new ConexionBD();
                $conexion->abrir();

                $nombre =$regFormulario->getnombre();
                $correo =$regFormulario->getcorreo();
                $telefono =$regFormulario->gettelefono();
                $direccion =$regFormulario->getdireccion();
                $mental =$regFormulario->getmental();
                $motivo =$regFormulario->getmotivo();
                $dinero =$regFormulario->getdinero();
                $experiencia =$regFormulario->getexperiencia();
                $antes =$regFormulario->getantes();
                $casa =$regFormulario->getcasa();
                $patio =$regFormulario->getpatio();
                $niños =$regFormulario->getniños();
                $deacuerdo =$regFormulario->getdeacuerdo();
                $enseñanza =$regFormulario->getenseñanza();
                $libertad =$regFormulario->getlibertad();
                $condiciones =$regFormulario->getcondiciones();
                $quedara =$regFormulario->getquedara();
                $encerrar =$regFormulario->getencerrar();

                $sql = "INSERT INTO tbl_formulario VALUES( '','$nombre', '$correo', '$telefono', '$direccion', '$mental', '$motivo', '$dinero', '$experiencia', '$antes', '$casa', '$patio', '$niños', '$deacuerdo', '$enseñanza', '$libertad', '$condiciones', '$quedara', '$encerrar')";

                $conexion->consulta($sql);
                $res = $conexion->obtenerFilasAfectadas();

                if ($res > 0) {
                    echo '<script>alert("Tu Solicitud Esta En Proceso, Tendras Pronta Respuesta En Tu Correo.  Gracias Por Elejirnos !!."); window.location.href = "../Vista/Html/Mascotas/MascoUsuario.php";</script>';
                } else {
                    echo "Error al enviar el formulario";
                }

            } catch (Exception $ex) {
                return "Error: " . $ex->getMessage();
            }
        }
    }