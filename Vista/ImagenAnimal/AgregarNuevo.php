<?php
error_reporting(~E_NOTICE); // evitar avisos (notices)

require_once 'Conexion.php';

if(isset($_POST['btnsave']))
{
    // Verificar si los índices existen antes de intentar acceder a ellos
    $Tipo = isset($_POST['Tipo']) ? $_POST['Tipo'] : "";
    $Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : "";
    $Edad = isset($_POST['Edad']) ? $_POST['Edad'] : "";
    $Raza = isset($_POST['Raza']) ? $_POST['Raza'] : "";
    $Tamaño = isset($_POST['Tamaño']) ? $_POST['Tamaño'] : "";
    $Color = isset($_POST['Color']) ? $_POST['Color'] : "";
    $Sexo = isset($_POST['Sexo']) ? $_POST['Sexo'] : "";
    $Estado = isset($_POST['Estado']) ? $_POST['Estado'] : "";
    
    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];
    
    if(empty($Nombre)){
        $errMSG = "Ingrese el nombre.";
    }
    else if(empty($Edad)){
        $errMSG = "Ingrese la edad.";
    }
    else if(empty($Raza)){
        $errMSG = "Ingrese la raza.";
    }
    else if(empty($Tamaño)){
        $errMSG = "Ingrese el tamaño.";
    }
    else if(empty($Color)){
        $errMSG = "Ingrese el color.";
    }
    else if(empty($Sexo)){
        $errMSG = "Ingrese el sexo.";
    }
    else if(empty($imgFile)){
        $errMSG = "Seleccione el archivo de imagen.";
    }
    else
    {
        $upload_dir = 'imagenes/'; // directorio de subida

        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // obtener extensión de la imagen
    
        // extensiones de imagen válidas
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'jfif'); // extensiones válidas
    
        // renombrar la imagen cargada
        $userpic = rand(1000, 1000000) . "." . $imgExt;
            
        // permitir formatos de archivo de imagen válidos
        if(in_array($imgExt, $valid_extensions)){            
            // Verificar tamaño del archivo '1MB'
            if($imgSize < 1000000) {
                move_uploaded_file($tmp_dir, $upload_dir.$userpic);
            }
            else{
                $errMSG = "Su archivo es muy grande.";
            }
        }
        else{
            $errMSG = "Solo archivos JPG, JPEG, PNG & GIF son permitidos.";        
        }
    }
    
    // si no hay errores, continuar ....
    if(!isset($errMSG)) {
      try {
        $stmt = $DB_con->prepare("INSERT INTO tbl_animales VALUES ('', ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindValue(1, $Tipo);
        $stmt->bindValue(2, $Nombre);
        $stmt->bindValue(3, $Edad);
        $stmt->bindValue(4, $Raza);
        $stmt->bindValue(5, $Tamaño);
        $stmt->bindValue(6, $Color);
        $stmt->bindValue(7, $Sexo);
        $stmt->bindValue(8, $Estado);
        $stmt->bindValue(9, $userpic);
  
          if($stmt->execute()) {
              $successMSG = "Nuevo registro insertado correctamente ...";
              header("refresh:3;index.php"); // redireccionar a la página de visualización de imágenes después de 3 segundos.
          } else {
              $errMSG = "Error al insertar ...";
          }
      } catch(PDOException $e) {
          echo $e->getMessage();
      }
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/for.css">
    
    <title>Registro de Mascotas</title>
    <script>
        function mostrarRazas() {
            var tipo = document.getElementById("Tipo").value;
            var razaInput = document.getElementById("Raza");
            var razaSelect = document.getElementById("RazaSelect");
            
            if (tipo === "1") {
                razaInput.style.display = "none";
                razaSelect.style.display = "block";
                razaSelect.innerHTML = `
                    <select name="Raza" id="Raza">
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
</head>
<body>
    <div class="container">
    <img src="../Imagenes/icono.jpg" alt="" style="  width: 10%;  float: right; "> <br> <br>

        <h1>Registro de Mascotas</h1>
        <?php
            if(isset($errMSG) || isset($successMSG)){
                echo '<script>';
                if(isset($errMSG)) {
                    echo 'alert("'.$errMSG.'");';
                }
                else if(isset($successMSG)) {
                    echo 'alert("'.$successMSG.'");';
                }
                echo '</script>';
            }
        ?>
        <div id="registro-mascotas-form">
            <form method="post" enctype="multipart/form-data" class="form-horizontal">
                <label>Tipo de Animal:</label>
                <select name="Tipo" id="Tipo" onchange="mostrarRazas()">
                    <option disabled selected>Seleccione Tipo De Animal</option>
                    <option value="1">Perro</option>
                    <option value="2">Gato</option>
                </select>

                <label>Nombre:</label>
                <input type="text" id="Nombre" name="Nombre">

                <label>Edad:</label>
                <select name="Edad" id="Edad">
                    <option disabled selected>Selecciona la edad del animal</option>
                    <option value="Cachorro">Cachorro</option>
                    <option value="Adulto">Adulto</option>
                    <option value="Senior">Senior</option>
                </select>

                <label>Raza:</label>
                <input type="text" id="Raza" name="Raza">
                <div id="RazaSelect" style="display: none;"></div>

                <label>Tamaño del Animal</label>
                <select name="Tamaño" id="Tamaño">
                    <option disabled selected>Seleccione el Tamaño Del Animal</option>
                    <option value="Pequeño">Pequeño</option>
                    <option value="Mediano">Mediano</option>
                    <option value="Grande">Grande</option>
                </select>

                <label>Color</label>
                <select name="Color" id="Color">
                    <option disabled selected>Seleccione el color de la mascota</option>
                    <option value="Negro">Negro</option>
                    <option value="Blanco">Blanco</option>
                    <option value="Cafe">Cafe</option>
                </select>

                <label>Sexo:</label>
                <select id="Sexo" name="Sexo">
                    <option disabled selected>Seleccione El Sexo del animal</option>
                    <option value="Macho">Macho</option>
                    <option value="Hembra">Hembra</option>
                    <option value="Esterilizado">Esterilizado</option>
                </select>

                <input type="hidden" name="Estado" value="Sin Adoptar">

                <label>Foto:</label>
                <center>
                    <input class="input-group" type="file" name="user_image" accept="image/*" />
                </center>
                <input type="submit" value="Registrar" name="btnsave" class="btn btn-default">
                <a href="../Html/Inicio/Administrador.php" style="padding: 10px;
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
    </div>
</body>
</html>
