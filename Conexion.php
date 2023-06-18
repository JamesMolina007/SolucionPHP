<?php

require_once "global.php";
class Conexion {
    private $host = DB_Host.":".DB_Puerto;
    private $usuario = DB_Usuario;
    private $contrasena = DB_Contrasena;
    private $nombreBD = DB_BaseDeDatos;
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
