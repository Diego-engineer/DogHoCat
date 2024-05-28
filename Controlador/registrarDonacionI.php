<?php
require_once "../Modelo/ConexionBD.php";

class registrarDonacion1{
    public function regDonacion1 (donaciones $regDonacion) {
        try {
            $conexion = new ConexionBD();
            $conexion->abrir(); 
            $Documento = $regDonacion -> getDocumento();
            $Dinero = $regDonacion-> getDinero();
            $Valor = $regDonacion-> getValor();
            $Lugar = $regDonacion-> getLugar();
            $Fecha = $regDonacion-> getFecha();
            $sql = "INSERT INTO tbl_dinero VALUES('','$Documento','$Dinero','$Valor','$Lugar','$Fecha')";
            $conexion->consulta($sql);
            $res = $conexion->obtenerFilasAfectadas();
            if ($res > 0) {
                echo '<script>alert("Gracias Por Su Donacion, Nos Ayudas a Crecer Cada Vez Mas."); window.location.href = "../Vista/Html/Inicio/inicio.html";</script>';
            } else {
                return "Error al registrar la donacion";
            }
        } catch (Exception $ex) {
            return "Error: " . $ex->getMessage();
        }
    }
}

class registrarDonacion2{
    public function regDonacion2 (donaciones $regDonacion) {
        try {
            $conexion = new ConexionBD();
            $conexion->abrir(); 
            $Documento = $regDonacion -> getDocumento();
            $Insumos = $regDonacion->getInsumos();
            $Descripcion = $regDonacion-> getDescripcion();
            $Lugar = $regDonacion-> getLugar();
            $Fecha = $regDonacion-> getFecha();
            $sql = "INSERT INTO tbl_insumos VALUES('','$Documento','$Insumos','$Descripcion','$Lugar','$Fecha')";
            $conexion->consulta($sql);
            $res = $conexion->obtenerFilasAfectadas();
            if ($res > 0) {
                echo '<script>alert("Gracias Por Su Donacion, Nos Ayudas a Crecer Cada Vez Mas."); window.location.href = "../Vista/Html/Inicio/inicio.html";</script>';
            } else {
                return "Error al registrar la donacion";
            }
        } catch (Exception $ex) {
            return "Error: " . $ex->getMessage();
        }
    }
}
?>