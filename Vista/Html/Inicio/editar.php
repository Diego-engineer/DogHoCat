<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../../Estilos/editar.css">
</head>
<body>
    <h1>Editar Usuario</h1>
    <?php
    include '../../../Modelo/ConexionBD.php'; // Incluye el archivo donde está la clase conexionBD

    $conexion = new ConexionBD(); // Crea una instancia de la clase

    if ($conexion->abrir()) {
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id_usuario = $_GET['id'];
            
            // Realiza la consulta para obtener los datos del usuario a editar
            $sql = "SELECT * FROM tbl_usuarios WHERE Id_usuario = $id_usuario";
            $conexion->consulta($sql);
            $usuario = $conexion->obtenerResult()->fetch_assoc();
            
            if(!$usuario){
                echo "El usuario no existe.";
            } else {
                // Formulario para editar los datos del usuario
                ?>
                <form method="POST" action="../../../Controlador/actualizar.php">
                    <input type="hidden" name="id" value="<?php echo $usuario['Id_usuario']; ?>">
                    Documento: <input type="text" name="documento" value="<?php echo $usuario['Documento']; ?>"><br>
                    Nombres: <input type="text" name="nombres" value="<?php echo $usuario['Nombres']; ?>"><br>
                    Apellidos: <input type="text" name="apellidos" value="<?php echo $usuario['Apellidos']; ?>"><br>
                    Ciudad: <input type="text" name="ciudad" value="<?php echo $usuario['Ciudad']; ?>"><br>
                    Dirección: <input type="text" name="direccion" value="<?php echo $usuario['Direccion']; ?>"><br>
                    Correo: <input type="email" name="correo" value="<?php echo $usuario['Correo']; ?>"><br>
                    Teléfono: <input type="text" name="telefono" value="<?php echo $usuario['Telefono']; ?>"><br>
                    Rol: <input type="text" name="rol" value="<?php echo $usuario['Rol']; ?>"><br>
                    <input type="submit" value="Guardar cambios">
                </form>
                <?php
            }
        } else {
            echo "ID de usuario no proporcionado.";
        }
    } else {
        echo "Error en la conexión a la base de datos.";
    }
    ?>
</body>
</html>



