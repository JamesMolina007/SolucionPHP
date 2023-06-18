<?php

class Conexion {
    private $host = "localhost:3308";
    private $usuario = "James";
    private $contrasena = "erp94128";
    private $nombreBD = "GameStation";
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->contrasena, $this->nombreBD);
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function obtenerConexion() {
        return $this->conexion;
    }
}

?>
