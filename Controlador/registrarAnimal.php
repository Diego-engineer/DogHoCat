<?php
require_once "../Modelo/ConexionBD.php";

class registrarAnimal {
    public function regAnimal(mascotas $regAnimal) {
        try {
            $conexion = new ConexionBD();
            $conexion->abrir();
            
            $Tipo_Animal = $regAnimal -> getTipo();
            $Nombre = $regAnimal -> getNombre();
            $Edad = $regAnimal -> getEdad();
            $Raza = $regAnimal -> getRaza();
            $Tamaño = $regAnimal -> getTamaño();
            $Color = $regAnimal -> getColor();
            $Sexo = $regAnimal -> getSexo();

            $Foto = $_FILES['Foto'];
            $nombre_foto = $Foto['name'];
            $type        = $Foto['type'];
            $url_temp    = $Foto['tmp_name'];

            $imgMascota = 'img_mascota.png';

            if ($nombre_foto != '')
            {
                $destino = '../../../Vista/Html/Mascotas/Fotos/';
                $img_nombre = 'img_'.md5(date('d-m-Y H:m:s'));
                $imgMascota = $img_nombre.'.jpg';
                $src = $destino.$imgMascota;
            }

            $sql = "INSERT INTO tbl_animales VALUES('', '$Tipo_Animal', '$Nombre', '$Edad', '$Raza', '$Tamaño', '$Color', '$Sexo','$imgMascota')";

            if ($conexion->consulta($sql)) 
            {
                if ($nombre_foto != '')
                {
                    move_uploaded_file($url_temp, $src);
                }
                echo '<script>alert("Animal registrado correctamente."); window.location.href = "../Vista/Html/Inicio/Administrador.php";</script>';
            } else {
                return "Error al registrar Animal";
            }
        } catch (Exception $ex) {
            return "Error: " . $ex->getMessage();
        }
    }
}
?>
