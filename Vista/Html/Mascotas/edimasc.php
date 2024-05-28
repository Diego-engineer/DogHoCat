<!DOCTYPE html>
<html>
<head>
    <title>Editar Mascota</title>
    <link rel="stylesheet" href="../../Estilos/editar.css">
</head>
<body>
    <h1>Editar Mascota</h1>
    <?php
    include '../../../Modelo/ConexionBD.php'; // Incluye el archivo donde está la clase conexionBD

    $conexion = new ConexionBD(); // Crea una instancia de la clase

    if ($conexion->abrir()) {
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id_Animal = $_GET['id'];
            
            // Realiza la consulta para obtener los datos del usuario a editar
            $sql = "SELECT * FROM tbl_animales WHERE Id_Animal = $id_Animal";
            $conexion->consulta($sql);
            $mascota = $conexion->obtenerResult()->fetch_assoc();
            
            if(!$mascota){
                echo "La mascota no existe.";
            } else {
                // Formulario para editar los datos del usuario
                ?>
                <form method="POST" action="../../../Controlador/tablamasc.php">
                    <input type="hidden" name="id" value="<?php echo $mascota['Id_Animal']; ?>">
                    Tipo de Animal <input type="text" name="tipo" value="<?php echo $mascota['Tipo_Animal']; ?>"><br>
                    Nombre : <input type="text" name="nombre" value="<?php echo $mascota['Nombre']; ?>"><br>
                    Edad : <input type="text" name="edad" value="<?php echo $mascota['Edad']; ?>"><br>
                    Raza : <input type="text" name="raza" value="<?php echo $mascota['Raza']; ?>"><br>
                    Tamaño : <input type="text" name="tamaño" value="<?php echo $mascota['Tamaño']; ?>"><br>
                    Color : <input type="text" name="color" value="<?php echo $mascota['Color']; ?>"><br>
                    Sexo : <input type="text" name="sexo" value="<?php echo $mascota['Sexo']; ?>"><br>
                    Foto : <input type="text" name="foto" value="<?php echo $mascota['Foto']; ?>"><br>
                    <input type="submit" value="Guardar cambios">
                </form>
                <?php
            }
        } else {
            echo "ID de mascota no proporcionado.";
        }
    } else {
        echo "Error en la conexión a la base de datos.";
    }
    ?>
</body>
</html>

