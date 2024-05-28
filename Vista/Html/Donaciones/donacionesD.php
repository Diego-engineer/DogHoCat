<?php
session_start();
$documento = isset($_SESSION['Documento']) ? $_SESSION['Documento'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/for.css">
    <title>Donacion</title>
</head>
<body>
    <div class="container">
        <img src="/ProyectoPHP/Vista/Imagenes/icono.jpg" alt="" style="  width: 10%;  float: right; "> <br> <br>
        <h1> Donacion </h1>
                
        <form action="../../../Controlador/ControlDon1.php" method="POST">
            <label>Documento </label>
            <input type="number" id="Documento" name="Documento" value="<?php echo htmlspecialchars($documento); ?>"><br><br>

            <label>Tipo de donacion: </label>
            <div id="Dinero">
                <select name="Dinero" id="Dinero">
                    <option disabled selected>Seleccione el metodo de pago</option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Transferencia">Transferencia</option>
                    <option value="Cheque">Cheque</option>
                </select>
            </div><br><br>
            <div id="Valor" name="Valor">    
                <label for="Valor">Valor :  </label>
                <input type="number" id="Valor" name="Valor"><br><br>
            </div>
            <option>Lugar</option>
            <select name="Lugar" id="Lugar">
                <Option value="Bogota D.C.">Bogota D.C.</Option>
            </select> <br><br>

            <label>Fecha:</label>
            <input type="date" id="Fecha" name="Fecha"><br><br>

            <input type="submit" value="Realiazar Donacion"><br><br>

            <a href="/Vista/Html/Inicio/inicio.html" style="padding: 10px; background-color: gainsboro; color: black; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px; padding: 8px; margin-bottom: 10px; max-width: 100%;">Volver</a>
        </form>
    </div>
</body>
</html>
