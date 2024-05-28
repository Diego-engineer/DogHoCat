<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_formulario_adopcion.css">
    <title>Formulario de Adopción</title>
    <link rel="stylesheet" href="../../Estilos/for.css">

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
        <h1>Formulario de Adopción</h1>
        <br>
        <div id="formulario-adopcion">
            <form action="../../../Controlador/ControlFormulario.php" method="POST">
                <label>Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" maxlength="80" value="<?php echo $usuario['Nombres'].' '.$usuario['Apellidos']; ?>" required>

                <label>Correo Electronico:</label>
                <input type="text" id="correo" name="correo" maxlength="80" value="<?php echo $usuario['Correo']; ?>" required>

                <label>Numero Telefonico:</label>
                <input type="text" id="telefono" name="telefono" maxlength="80" value="<?php echo $usuario['Telefono']; ?>" required>

                <label>Direccion:</label>
                <input type="text" id="direccion" name="direccion" maxlength="80" value="<?php echo $usuario['Direccion']; ?>" required>
                <label>Cual es su estado Mental actualmente?:</label>
                <select id="mental" name="mental">
                    <option disabled selected>Seleccione como ha estado mentalmete</option>
                    <option value="Muy Bien"> Muy Bien</option>
                    <option value="Normal">Normal</option>
                    <option value="Puedo estar mejor">Puedo estar mejor</option>
                    <option value="Mal">Mal</option>
                </select>

                <label>Cual es su motivo para adoptar a nuestro peludo?</label>
                <textarea id="motivo" name="motivo" maxlength="2000" required></textarea>

                <label>Cuanto dinero esta generando al mes? :</label>
                <select id="dinero" name="dinero">
                    <option disabled selected>Seleccione cuanto genera al mes</option>
                    <option value="Mas del minimo">Mas del minimo</option>
                    <option value="El minimo">El minimo</option>
                    <option value="Soy trabajodor independiente">Soy trabajodor independiente</option>
                    <option value="No trabajo">No trabajo</option>
                </select>

                <label>Cuentenos brevemente como es su experiencia con mascotas :</label>
                <textarea id="experiencia" name="experiencia" maxlength="2000" required></textarea>

                <label> usted a adoptado antes ?:</label>
                <select id="antes" name="antes">
                    <option disabled selected>Seleccione alguna opcion</option>
                    <option value="SI">SI</option>
                    <option value="NO">No</option>
                </select>

                <label> cuenta con casa propia o paga arriendo :</label>
                <select id="casa" name="casa">
                    <option disabled selected>Seleccione alguna opcion</option>
                    <option value="Casa propia">Casa propia</option>
                    <option value="Pago arriendo">Pago arriendo</option>
                </select>

                <label>Cuenta con patio?</label>
                <select id="patio" name="patio">
                    <option disabled selected>Seleccione alguna opcion</option>
                    <option value="SI">SI</option>
                    <option value="NO">No</option>
                </select>

                <label>Si cuenta con niños en el hogar cuantos años tienen?</label>
                <select id="niños" name="niños">
                    <option disabled selected>Seleccione alguna de las edades</option>
                    <option value="Mas de 18 años">Mas de 18 años</option>
                    <option value="Entre los 12-17 años">Entre los 12-17 años</option>
                    <option value="Entre los 2-5 años">Entre los 2-5 años</option>
                    <option value="Entre 2 meses al año">Entre 2 meses al año</option>
                </select>

                <label>Todos los miembros de la familia estan deacuerdo con esta decision? </label>
                <select id="deacuerdo" name="deacuerdo">
                    <option disabled selected>Seleccione alguna opcion</option>
                    <option value="SI">SI</option>
                    <option value="NO">No</option>
                </select>

                <label>Danos una breve descripcion de lo que le enseñarias a tu nuevo amigo </label>
                <textarea id="enseñanza" name="enseñanza" maxlength="2000" required></textarea>

                <label>El nuevo amigo tendra libertad en toda la casa?</label>
                <select id="libertad" name="libertad">
                    <option disabled selected>Seleccione alguna opcion</option>
                    <option value="SI">SI</option>
                    <option value="NO">No</option>
                </select>

                <label>Donde y en que condiciones dormira el nuevo amigo?</label>
                <select id="condiciones" name="condiciones">
                    <option disabled selected>Seleccione alguna opcion</option>
                    <option value="Solo en su cama">Solo en su cama</option>
                    <option value="En el piso">En el piso</option>
                    <option value="En el patio">En el patio</option>
                    <option value="Va a tener su casa en el patio">Va a tener su casa en el patio</option>
                    <option value="Literalmente en donde el quiera dormir">Literalmente en donde el quiera dormir</option>
                </select>

                <label>Donde se quedara su nuevo amigo cuando usted no este en casa?</label>
                <select id="quedara" name="quedara">
                    <option disabled selected>Seleccione alguna opcion</option>
                    <option value="Con un amigo">Con un amigo</option>
                    <option value="Con un familiar">Con un familiar</option>
                    <option value="Lo vamos a llevar con nosotros">Lo vamos a llevar con nosotros</option>
                    <option value="e contratamos a un cuidador">Le contratamos a un cuidador</option>
                    <option value="Solo, porque lo vamos a educar correctamente">Solo, porque lo vamos a educar correctamente</option>
                </select>

                <label>Encerrara a su nuevo amigo ?</label>
                <select id="encerrar" name="encerrar">
                    <option disabled selected>Seleccione alguna opcion</option>
                    <option value="Claramente">Claramente</option>
                    <option value="Solo cuando se porte mal">Solo cuando se porte mal</option>
                    <option value="Solo cuado nos vayamos de viaje">Solo cuado nos vayamos de viaje</option>
                    <option value="Obviamnete no">Obviamnete no</option>
                </select>


                <input type="submit" value="ENVIAR"></button>
                <button><a href="../Inicio/Usuario.php" style="padding: 10px;
                    background-color: gainsboro;
                    color: black;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    margin-top: 10px;
                    padding: 8px;
                    margin-bottom: 10px;
                    max-width: 100%;"> Volver </a> </button>
            </form>
        </div>
    </div>
</body>
</html>
