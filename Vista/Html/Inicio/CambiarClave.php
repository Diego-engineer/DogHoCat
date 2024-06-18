<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/login.css">
    <title>Cambiar Contraseña</title>
</head>
<body>
    <center>
        <section>
            <form action="actualizar_contraseña.php" method="POST">
                <img src="../../Imagenes/icono.jpg" alt="" style="width: 10%; float: right;"><br>
                <center><h3>Cambiar Contraseña</h3></center>
                <label>Nueva Contraseña:</label>
                <input type="password" id="NuevaContraseña" name="NuevaContraseña" placeholder="Nueva Contraseña" required><br><br>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
                <input type="submit" value="Cambiar Contraseña">
            </form>
        </section>
    </center>
</body>
</html>
