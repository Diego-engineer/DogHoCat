<?php 
require_once "../Modelo/ConexionBD.php";

class RegistrarInsumos {

    public function regInsumos(Insumos $regInsumos) {
        try {
            $conexion = new conexionBD();
            $conexion ->abrir() ;

            $Categoria = $regInsumos -> getCategoria();
            $Insumo = $regInsumos -> getInsumo();
            $Proveedor = $regInsumos -> getProveedor();
            $Codigo = $regInsumos -> getCodigo();
            $Precio = $regInsumos -> getPrecio();

            $sql = "INSERT INTO tbl_registrar_Insumos VALUES ('', '$Categoria','$Insumo','$Proveedor','$Codigo',$Precio)";

            $conexion ->consulta($sql);
            $res = $conexion ->obtenerFilasAfectadas();

            if ($res > 1) {
                return "Registro  de Insumos Exitoso!";
            } else {
                return "Error al ingresar el registro";    
            }
        } catch (Exception $ex) {
            return "Error: " .$ex ->getMessage();
        }
    }
}
?>