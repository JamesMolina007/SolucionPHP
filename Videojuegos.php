<?php

class Videojuegos {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerVideojuegos($busqueda) {
        $query = "SELECT * FROM videojuegos WHERE nombre LIKE '%$busqueda%' OR categoria LIKE '%$busqueda%' OR dificultad LIKE '%$busqueda%' OR anio_lanzamiento LIKE '%$busqueda%' OR precio LIKE '%$busqueda%'";
        $resultado = $this->conexion->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerVideojuego($id) {
        $query = "SELECT * FROM videojuegos WHERE id=$id";
        $resultado = $this->conexion->query($query);
        return $resultado->fetch_assoc();
    }

    public function agregarVideojuego($nombre, $categoria, $dificultad, $anioLanzamiento, $precio) {
        $query = "INSERT INTO videojuegos (nombre, categoria, dificultad, anio_lanzamiento, precio) VALUES ('$nombre', '$categoria', '$dificultad', '$anioLanzamiento', $precio)";
        return $this->conexion->query($query);
    }

    public function actualizarVideojuego($id, $nombre, $categoria, $dificultad, $anioLanzamiento, $precio) {
        $query = "UPDATE videojuegos SET nombre='$nombre', categoria='$categoria', dificultad='$dificultad', anio_lanzamiento='$anioLanzamiento', precio=$precio WHERE id=$id";
        return $this->conexion->query($query);
    }

    public function eliminarVideojuego($id) {
        $query = "DELETE FROM videojuegos WHERE id=$id";
        return $this->conexion->query($query);
    }
	
	public function eliminarVideojuegos($ids) {
        foreach ($ids as $id) {
            $this->eliminarVideojuego($id);
        }
    }
}
?>