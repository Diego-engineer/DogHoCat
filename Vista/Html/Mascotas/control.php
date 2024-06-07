

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
    ?>


</head>
<body>
  <div class="container">
    <h1>Formulario de referencia</h1>
    <form action="../../../Controlador/ControlVeterinario.php" method="POST">
      <label>Fecha</label>
      <input type="date" id="fecha" name="fecha" placeholder="Ingrese la fecha">

      <label>ID del veterinario referente</label>
      <input type="text" id="veterinario" name="veterimnario" value="<?php echo $usuario['Documento']; ?>" required>

      <label for="paciente">ID del paciente</label>
      <input type="number" id="paciente" name="paciente" placeholder="Ingrese el nombre del paciente">

      <label>Especie</label>
      <select name="tipo" id="tipo" onchange="mostrarRazas()">
        <option disabled selected>Seleccione la especie del Animal</option>
        <option value="1">Perro</option>
        <option value="2">Gato</option>
      </select>

      <label>Raza</label>
      <input type="text" id="raza" name="raza" placeholder="Ingrese la raza">
      <div id="RazaSelect" style="display: none;"></div>

      <label>Edad:</label>
      <select name="edad" id="edad">
        <option disabled selected>Selecciona la edad del Animal</option>
        <option value="Cachorro">Cachorro</option>
        <option value="Adulto">Adulto</option>
        <option value="Senior">Senior</option>
      </select>

      <label>Sexo:</label>
      <select id="sexo" name="sexo">
        <option disabled selected>Seleccione El Sexo del animal</option>
        <option value="Macho">Macho</option>
        <option value="Hembra">Hembra</option>
      </select>

      <label>Breve historia clínica</label>
      <textarea id="historial" name="historial" placeholder="Ingrese la breve historia clínica"></textarea>

      <label>Condición actual</label>
      <textarea id="condicion" name="condicion" placeholder="Ingrese la condición actual"></textarea>

      <label>Tratamientos médicos actuales</label>
      <textarea id="tratamientos" name="tratamientos" placeholder="Ingrese los tratamientos médicos actuales"></textarea>

      <label>Otros comentarios</label>
      <textarea id="comentarios" name="comentarios" placeholder="Ingrese otros comentarios"></textarea>

      <label>Condición corporal</label>
      <input type="text" id="corporal" name="corporal" placeholder="Ingrese la condición corporal">

      <label>Condición muscular</label>
      <input type="text" id="muscular" name="muscular" placeholder="Ingrese la condición muscular">

      <label>Peso actual</label>
      <input type="number" id="peso" name="peso" placeholder="Ingrese el peso actual">

      <label>Peso en el que suele mantenerse</label>
      <input type="number" id="mantener" name="mantener" placeholder="Ingrese el peso en el que suele mantenerse">

      <div class="button-container">
        <input type="submit" value="Enviar">
      </div>
    </form>
  </div>
  <script>
    // Función para mostrar la lista desplegable de razas correspondiente
    function mostrarRazas() {
        var tipo = document.getElementById("tipo").value;
        var razaInput = document.getElementById("raza");
        var razaSelect = document.getElementById("RazaSelect");
        
        if (tipo === "1") {
            razaInput.style.display = "none";
            razaSelect.style.display = "block";
            razaSelect.innerHTML = `
                <select name="Raza" id="Raza">
                    <option disabled selected>Selecciona la Raza del perro</option>
                    <option value="Labrador">Labrador</option>
                    <option value="Bulldog">Bulldog</option>
                    <option value="Pastor Alemán">Pastor Alemán</option>
                </select>
            `;
        } 
        else if (tipo === "2") {
            razaInput.style.display = "none";
            razaSelect.style.display = "block";
            razaSelect.innerHTML = `
                <select name="Raza" id="Raza">
                    <option disabled selected>Selecciona la Raza del Gato</option>
                    <option value="Siamés">Siamés</option>
                    <option value="Persa">Persa</option>
                    <option value="Maine Coon">Maine Coon</option>
                </select>
            `;
        } 
        else {
            razaInput.style.display = "block";
            razaSelect.style.display = "none";
            razaSelect.innerHTML = '';
        }
    }
  </script>
</body>
</html>
