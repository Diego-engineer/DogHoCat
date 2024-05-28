<?php 
require_once "../Modelo/ConexionBD.php";

class RegistrarProveedor{

    public function regProveedor(Proveedor $regProveedor) {
        try {
            $conexion = new conexionBD();
            $conexion ->abrir() ;

            $Nit = $regProveedor -> getNit();
            $Nombre = $regProveedor -> getNombre();
            $Direccion = $regProveedor -> getDireccion();
            $Telefono = $regProveedor -> getTelefono();

            $sql = "INSERT INTO tbl_proveedores VALUES ('$Nit','$Nombre','$Direccion','$Telefono')";

            $conexion ->consulta($sql);
            $res = $conexion ->obtenerFilasAfectadas();

            if ($res > 1) {
                return "Registro  de Nombres Exitoso!";
            } else {
                return "Error al ingresar el registro";    
            }
        } catch (Exception $ex) {
            return "Error: " .$ex ->getMessage();
        }
    }
}
?>