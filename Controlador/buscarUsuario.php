<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de búsqueda</title>
    <link rel="stylesheet" href="../../Vista/Estilos/tt.css">
    <body>
      
    </body>
</head>
<body>
    <div class="container">
        <?php
        require_once "../Modelo/ConexionBD.php"; 

        if (isset($_POST['buscarId'])) {
             $idBuscar = $_POST['buscarId'];
             $conexion = new conexionBD(); 
             $conexion->abrir();
             $sql = "SELECT * FROM tbl_usuarios WHERE Id_usuario = $idBuscar";
             $conexion->consulta($sql);
             $resultadoBusqueda = $conexion->obtenerResult();

            if ($resultadoBusqueda->num_rows > 0) {
                $fila = mysqli_fetch_assoc($resultadoBusqueda);
                echo "<div class='usuario-info'>";
                echo "<p>ID: " . $fila['Id_usuario'] . "</p>";
                echo "<p>Documento: " . $fila['Documento'] . "</p>";
                echo "<p>Nombre: " . $fila['Nombres'] . "</p>";
                echo "<p>Apellido: " . $fila['Apellidos'] . "</p>";
                echo "<p>Ciudad: " . $fila['Ciudad'] . "</p>";
                echo "<p>Correo: " . $fila['Direccion'] . "</p>";
                echo "<p>Teléfono: " . $fila['Telefono'] . "</p>";
                echo "<p>Rol: " . $fila['Rol'] . "</p>";
                echo "<p>Contraseña: " . $fila['Contraseña'] . "</p>";
                echo "</div>";
            } else {
                echo "<p class='no-usuario'>No se encontró ningún usuario con el ID $idBuscar</p>";
            }
         }
        ?>
    </div>
    <center> <a href="../Vista/Html/Inicio/Usuarios.php" style="display: inline-block; padding: 13px 55px; border: 1px solid skyblue; border-radius: 25px; color: skyblue; text-decoration: none;"> Atras </a>  </center>
</body>
</html>
