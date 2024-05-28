<!DOCTYPE html>
<html>
<head>
    <title>Editar Proveedor</title>
    <link rel="stylesheet" href="../../Estilos/editar.css">
</head>
<body>
    <h1>Editar Proveedor</h1>
    <?php
    include '../../../Modelo/ConexionBD.php'; // Incluye el archivo donde está la clase conexionBD

    $conexion = new ConexionBD(); // Crea una instancia de la clase

    if ($conexion->abrir()) {
        if(isset($_GET['Nit']) && !empty($_GET['Nit'])){
            $Nit_proveedor = $_GET['Nit'];
            
            // Realiza la consulta para obtener los datos del usuario a editar
            $sql = "SELECT * FROM tbl_proveedores WHERE Nit = $Nit_proveedor";
            $conexion->consulta($sql);
            $proveedor = $conexion->obtenerResult()->fetch_assoc();
            
            if(!$proveedor){
                echo "El proveedor no existe.";
            } else {
                // Formulario para editar los datos del usuario
                ?>
                <form method="POST" action="../../../Controlador/actualizarP.php">
                    <input type="hidden" name="Nit" value="<?php echo $proveedor['Nit']; ?>">
                    Nombre: <input type="text" name="Nombre" value="<?php echo $proveedor['Nombre']; ?>"><br>
                    Dirección: <input type="text" name="Direccion" value="<?php echo $proveedor['Direccion']; ?>"><br>
                    Telefono: <input type="text" name="Telefono" value="<?php echo $proveedor['Telefono']; ?>"><br>
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



