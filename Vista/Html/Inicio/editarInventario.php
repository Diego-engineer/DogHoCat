<!DOCTYPE html>
<html>
<head>
    <title>Editar Inventario</title>
    <link rel="stylesheet" href="../../Estilos/editar.css">
</head>
<body>
    <h1>Editar Inventario</h1>
    <?php
    include '../../../Modelo/ConexionBD.php'; // Incluye el archivo donde está la clase conexionBD

    $conexion = new ConexionBD(); // Crea una instancia de la clase

    if ($conexion->abrir()) {
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id_usuario = $_GET['id'];
            
            // Realiza la consulta para obtener los datos del usuario a editar
            $sql = "SELECT * FROM tbl_inventarios WHERE Id_registro = $id_registro";
            $conexion->consulta($sql);
            $inventario = $conexion->obtenerResult()->fetch_assoc();
            
            if(!$inventario){
                echo "El inventario no existe.";
            } else {
                // Formulario para editar los datos del usuario
                ?>
                <form method="POST" action="../../../Controlador/actualizar.php">
                    <input type="hidden" name="id" value="<?php echo $inventario['Id_registro']; ?>">
                    Id de la mascota: <input type="text" name="documento" value="<?php echo $inventario['id_mascota']; ?>"><br>
                    Id del insumo: <input type="text" name="insumos" value="<?php echo $inventario['id_insumo']; ?>"><br>
                    Fecha de Entrada: <input type="date" name="entrada" value="<?php echo $inventario['Fecha Entrada']; ?>"><br>
                    Cantidad de Entrada: <input type="text" name="cantidad" value="<?php echo $inventario['Cantidad Entrada']; ?>"><br>
                    Cantidad de Salida: <input type="text" name="salida" value="<?php echo $inventario['Cantidad Salida ']; ?>"><br>
                    Disponibilidad del animal: <input type="email" name="disponibilidad" value="<?php echo $inventario['Disponibilidad del animal']; ?>"><br>
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