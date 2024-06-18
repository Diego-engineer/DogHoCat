<?php
class conexionBD {
    private $mySQLI;
    private $sql;
    private $result;
    private $filasAfectadas;
    private $datos;

    public function abrir() {
        $this->mySQLI = mysqli_connect("localhost", "root", "", "dogocat");
        if (mysqli_connect_error()) {
            return 0;
        } else {
            return 1;
        }
    }

    public function consulta($sql) {
        $this->sql = $sql;
        $conec = $this->mySQLI;
        $this->result = mysqli_query($conec, $sql);
        if ($this->result === false) {
            die("Error en la consulta: " . $this->mySQLI->error);
        }
        $this->filasAfectadas = $this->mySQLI->affected_rows;
    }

    public function obtenerResult() {
        return $this->result;
    }

    public function obtenerFilasAfectadas() {
        return $this->filasAfectadas;
    }

    public function confirmarDatos() {
        return $this->datos;
    }

    public function obtenerError() {
        return $this->mySQLI->error;
    }

    // Nuevo método para obtener la instancia de $mySQLI
    public function obtenerConexion() {
        return $this->mySQLI;
    }
}
?>