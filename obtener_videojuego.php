<?php

include 'conexion.php';
include 'videojuegos.php';
$conexion = new Conexion();
$videojuegos = new Videojuegos($conexion->obtenerConexion());

$id = isset($_GET['id']) ? $_GET['id'] : '';
$videojuego = $videojuegos->obtenerVideojuego($id);

$nombre = $videojuego['nombre'];
$categoria = $videojuego['categoria'];
$dificultad = $videojuego['dificultad'];
$anioLanzamiento = $videojuego['anio_lanzamiento'];
$precio = $videojuego['precio'];

$response = [
    'id' => $id,
    'nombre' => $nombre,
    'categoria' => $categoria,
    'dificultad' => $dificultad,
    'anioLanzamiento' => $anioLanzamiento,
    'precio' => $precio
];
header('Content-Type: application/json');
echo json_encode($response);
?>