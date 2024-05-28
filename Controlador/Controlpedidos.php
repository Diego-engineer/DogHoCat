<?php
require_once "../Modelo/ConexionBD.php";

class RegistrarPedidoInsumo {
    public function regPedidoInsumo($codigoInsumo, $cantidad, $observaciones) {
        try {
            $conexion = new ConexionBD();
            $conexion->abrir();
            
            $sql = "INSERT INTO tbl_pedidos  VALUES ('$codigoInsumo', '$cantidad', '$observaciones')";
            
            $conexion->consulta($sql);
            $res = $conexion->obtenerFilasAfectadas();
            
            if ($res > 0) {
                echo 'SE HA ENVIADO TU PEDIDO CORRECTAMENTE AL PROVEEDOR.';
            } else {
                echo "Error al registrar pedido de insumo";
            }
        } catch (Exception $ex) {
            return "Error: " . $ex->getMessage();
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["codigoInsumo"]) && isset($_POST["cantidad"]) && isset($_POST["observaciones"])) {
        $regPedido = new RegistrarPedidoInsumo();
        $regPedido->regPedidoInsumo($_POST["codigoInsumo"], $_POST["cantidad"], $_POST["observaciones"]);
    } else {
        echo "Llenar todos los campos";
    }
}
?>
