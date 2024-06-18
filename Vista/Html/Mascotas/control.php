<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/for.css">
    <title>Formulario de referencia</title>
    <?php
    require_once "../../../Modelo/ConexionBD.php";
    session_start();
    if (!isset($_SESSION["Rol"])) {
        header("location: ../Inicio/Login.html");
    }
    $documento = $_SESSION["documento"];
    $conexion = new ConexionBD();
    $conexion->abrir(); 
    $sql = "SELECT * FROM tbl_usuarios WHERE Documento = '$documento'";
    $conexion->consulta($sql);
    $usuario = $conexion->obtenerResult()->fetch_assoc();
    $fecha_actual = date('Y/m/d');
    ?>
</head>
<body>
    <div class="container">
        <h1>Formulario de referencia</h1>
        <form action="../../../Controlador/ControlVeterinario.php" method="POST">
            <label>Fecha</label>
            <input type="text" id="fecha" name="fecha" value="<?php echo $fecha_actual; ?>" readonly>

            <label>ID veterianrio</label>
            <input type="text" id="veterinario" name="veterinario" value="<?php echo $usuario['Documento']; ?>" readonly>

            <label>ID del paciente</label>
            <input type="text" id="paciente" name="paciente" value="<?php echo $_GET['id']; ?>" readonly>

            <label>Tipo</label>
            <input type="text" id="tipo" name="tipo" value="<?php echo $_GET['tipo']; ?>" readonly>

            <label>Raza</label>
            <input type="text" id="raza" name="raza" value="<?php echo $_GET['raza']; ?>" readonly>

            <label>Edad:</label>
            <input type="text" id="edad" name="edad" value="<?php echo $_GET['edad']; ?>" readonly>

            <label>Sexo:</label>
            <input type="text" id="sexo" name="sexo" value="<?php echo $_GET['sexo']; ?>" readonly>
            
            <label>Breve historia clínica</label>
            <textarea id="historial" name="historial" placeholder="Ingrese la breve historia clínica"></textarea>

            <label>Condición actual</label>
            <textarea id="condicion" name="condicion" placeholder="Ingrese la condición actual"></textarea>

            <label>Tratamientos médicos actuales</label>
            <textarea id="tratamientos" name="tratamientos" placeholder="Ingrese los tratamientos médicos actuales"></textarea>

            <label>Otros comentarios</label>
            <textarea id="comentarios" name="comentarios" placeholder="Ingrese otros comentarios"></textarea>

            <label>Condición Corporal <small>Puntúe según la escala adjunta la nota de Condición Corporal del paciente</small>
              <select name="corporal" id="corporal">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
              </select>
            </label>

            <label>Condición Muscular <small>Puntúe la escala adjunta la nota de Condición Muscular del paciente</small>
              <select name="muscular" id="muscular">
                <option value="Masa muscular normal">Masa muscular normal</option>
                <option value="Atrofia muscular moderada">Atrofia muscular moderada</option>
                <option value="Atrofia muscular leve">Atrofia muscular leve</option>
                <option value="Atrofia muscular grave">Atrofia muscular grave</option>
              </select>
            </label>

            <label>Peso actual</label>
            <input type="number" id="peso" name="peso" placeholder="Ingrese el peso actual">

            <label>Peso en el que suele mantenerse</label>
            <input type="number" id="mantener" name="mantener" placeholder="Ingrese el peso en el que suele mantenerse">

            <div class="button-container">
                <input type="submit" value="Enviar">
            </div>
            <a href="Veterinario.php" style="padding: 10px;
                    background-color: gainsboro;
                    color: black;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    margin-top: 10px;
                    padding: 8px;
                    margin-bottom: 10px;
                    text-align: center;
                    text-decoration: none;
                    max-width: 100%;"> Volver </a>
        </form>
    </div>
</body>
</html>