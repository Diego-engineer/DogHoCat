<?php
include '../../../Modelo/ConexionBD.php';

$conexion = new conexionBD();

if ($conexion->abrir()) {

    $sql = "SELECT nit, nombre FROM tbl_proveedores";
    $conexion->consulta($sql);

    $result = $conexion->obtenerResult();
    $proveedores = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $proveedores[] = $row;
        }
    }
} else {
    die("Error de conexión a la base de datos.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Insumos</title>
    <link rel="stylesheet" href="../../Estilos/for.css">
</head>
<body>

<div class="container">
    <h1>Registro de insumos</h1>

    <form action="../../../Controlador/controlInsumos.php" method="POST">
        <div>
            <label>Categoria
                <select name="Categoria" id="Categoria">
                    <option value="1">Comida</option>
                    <option value="2">Accesorios</option>
                    <option value="3">Productos Aseo</option>
                    <option value="4">Productos Vetrinaria</option>
                </select>
            </label>
        </div>
        <div>
            <label>Nombre Insumo
                <input type="text" id="Insumo" name="Insumo">
            </label>
        </div>
        <div>
            <label>Nombre Proveedor
                <select name="Proveedor" id="Proveedor">
                    <?php foreach($proveedores as $proveedor): ?>
                        <option value="<?php echo $proveedor['nit']; ?>"><?php echo $proveedor['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        <div>
            <label>Codigo Insumo
                <input type="number" id="Codigo" name="Codigo">
            </label>
        </div>
        <div>
            <label>Precio
                <input type="number" id="precio" name="precio">
            </label>
        </div>
        <div>
            <input type="submit" value="Registrar">
        </div>
        <button>
            <a href="../Inicio/Administrador.php" style="padding: 10px; background-color: gainsboro; color: black; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px; padding: 8px; margin-bottom: 10px; max-width: 100%;"> Volver </a>
        </button>
    </form>
</div>
</body>
</html>
