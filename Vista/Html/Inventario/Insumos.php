<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/inventario.css">
    <title>Lista de Insumos</title>
</head>
<body>  

    <?php 
        include '../../../Modelo/ConexionBD.php'; 
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
                <td><button data-precio="<?php echo $mostrar['Precio'] ?>" onclick="openModal('<?php echo $mostrar['Codigo_Insumo'] ?>')">Pedir</button></td>
            </tr>
            <?php   
            }
            ?>
            
        </table>
    </div>

    <!-- Ventana Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content container">
            <span class="close">&times;</span>
            <form id="pedidoForm" method="POST">
                <h2>Pedido de Insumo</h2>
                <input type="hidden" id="codigoInsumo" name="codigoInsumo">
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" required>
                <br>
                <label for="observaciones">Observaciones:</label>
                <textarea id="observaciones" name="observaciones" required></textarea>
                <br>
                <label for="total">Total:</label>
                <span id="total"></span>
                <br>
                <!-- Campo oculto para almacenar el total -->
                <input type="hidden" id="totalHidden" name="total">
                <br>
                <button type="button" onclick="submitForm()">Enviar</button>
            </form>
        </div>
    </div>

    <script>
        function openModal(codigoInsumo) {
            var modal = document.getElementById("myModal");
            var btn = event.target;
            var span = document.getElementsByClassName("close")[0];
            var codigoInsumoInput = document.getElementById("codigoInsumo");
            var cantidadInput = document.getElementById("cantidad");
            var totalSpan = document.getElementById("total");

            // Obtener el precio del botón
            var precio = parseFloat(btn.getAttribute("data-precio"));

            // Abrir la ventana modal
            modal.style.display = "block";

            // Establecer el código de insumo en el input oculto
            codigoInsumoInput.value = codigoInsumo;

            // Calcular el total y mostrarlo al cambiar la cantidad
            cantidadInput.oninput = function() {
                var cantidad = parseInt(cantidadInput.value);
                var total = precio * cantidad;
                if (!isNaN(total)) {
                    totalSpan.innerText = total.toFixed(0);
                    // Actualizar el campo oculto con el total
                    document.getElementById("totalHidden").value = total.toFixed(0);
                } else {
                    totalSpan.innerText = "";
                    document.getElementById("totalHidden").value = "";
                }
            }

            // Cerrar la ventana modal cuando se haga clic en la 'x'
            span.onclick = function() {
                modal.style.display = "none";
                cantidadInput.value = ""; 
                totalSpan.innerText = ""; 
                document.getElementById("totalHidden").value = "";
            }

            // Cerrar la ventana modal cuando se haga clic fuera de ella
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                    cantidadInput.value = "";
                    totalSpan.innerText = "";
                    document.getElementById("totalHidden").value = "";
                }
            }
        }

        // Enviar el formulario
        function submitForm() {
            var form = document.getElementById("pedidoForm");
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../../../Controlador/controlpedidos.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert(xhr.responseText);
                    modal.style.display = "none";
                } else if (xhr.readyState === 4) {
                    alert("Error al enviar el formulario.");
                }
            };
            xhr.send(formData);
        }
    </script>
     <center><a href="../Inicio/Administrador.php" style="display: inline-block; padding: 13px 55px; border: 1px solid black; border-radius: 25px; color: black; text-decoration: none;"> Atras </a></center> <br>
</body>
</html>
