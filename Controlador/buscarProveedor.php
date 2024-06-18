<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de búsqueda</title>
    <link rel="stylesheet" href="../Vista/Estilos/tt.css">
    <body>
      
    </body>
</head>
<body>
    <div class="container">
        <?php
        require_once "../Modelo/ConexionBD.php"; 

        if (isset($_POST['buscarNit'])) {
             $NitBuscar = $_POST['buscarNit'];
             $conexion = new conexionBD(); 
             $conexion->abrir();
             $sql = "SELECT * FROM tbl_proveedores WHERE Nit = $NitBuscar";
             $conexion->consulta($sql);
             $resultadoBusqueda = $conexion->obtenerResult();

            if ($resultadoBusqueda->num_rows > 0) {
                $fila = mysqli_fetch_assoc($resultadoBusqueda);
                echo "<div class='Proveedor-info'>";
                echo "<p>Nit: " . $fila['Nit'] . "</p>";
                echo "<p>Nombre: " . $fila['Nombre'] . "</p>";
                echo "<p>Direccion: " . $fila['Direccion'] . "</p>";
                echo "<p>Telefono: " . $fila['Telefono'] . "</p>";
                echo "</div>";
            } else {
                echo "<p class='no-usuario'>No se encontró ningún usuario con el ID $idBuscar</p>";
            }
         }
        ?>
    </div>
    <center> <a href="../Vista/Html/Inventario/Proveedores.php" style="display: inline-block; padding: 13px 55px; border: 1px solid skyblue; border-radius: 25px; color: skyblue; text-decoration: none;"> Atras </a>  </center>
</body>
</html>
