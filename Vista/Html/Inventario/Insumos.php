<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/inventario.css">
    <title>Lista de Insumos</title>
    <style>

    </style>
</head>
<body>  

    <?php 
        include '../../../Modelo/conexionBD.php'; 
        $conexion = new conexionBD();

        if ($conexion->abrir() == 0) {
            echo "Error al conectar a la base de datos";
            exit(); 
        }
    ?>

    <div class="table-container">
        <table>
            <tr><th colspan="6"><h1>Lista de Los Insumos Para Pedir</h1></th></tr>
            <tr>
                <th>Categoria</th>
                <th>Nombre</th>
                <th>Proveedor</th>
                <th>Codigo</th>
                <th>Precio</th>
                <th>Acción</th>
            </tr>
            <?php
            $sql= "SELECT i.*, c.Nombre_Categoria AS Categoria 
            FROM tbl_registrar_insumos AS i
            INNER JOIN tbl_categoria_insumos AS c ON c.Id_Categoria = i.Categoria";
            $conexion->consulta($sql);
            $resultado = $conexion->obtenerResult();
                
            while ($mostrar=mysqli_fetch_array($resultado)) {
            ?> 
            <tr>
                <td><?php echo $mostrar['Categoria'] ?></td>
                <td><?php echo $mostrar['Nombre_Insumo'] ?></td>
                <td><?php echo $mostrar['Nombre_Proveedor'] ?></td>
                <td><?php echo $mostrar['Codigo_Insumo'] ?></td>
                <td><?php echo $mostrar['Precio'] ?></td>
                <td><button onclick="openModal('<?php echo $mostrar['Codigo_Insumo'] ?>')">Pedir</button></td>
            </tr>
            <?php   
            }
            ?>
            <a href="../Inicio/Administrador.php" class="volver-button">Volver</a>
        </table>
    </div>

    <!-- Ventana Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content container">
            <span class="close">&times;</span>
            <form id="pedidoForm">
                <h2>Pedido de Insumo</h2>
                <input type="hidden" id="codigoInsumo" name="codigoInsumo">
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" required>
                <br>
                <label for="observaciones">Observaciones:</label>
                <textarea id="observaciones" name="observaciones" required></textarea>
                <br>
                <button type="button" onclick="submitForm()">Enviar</button>
            </form>
        </div>
    </div>

    <script src="pedidos.js"></script>
</body>
</html>