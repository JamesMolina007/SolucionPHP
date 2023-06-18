<?php
include 'conexion.php';
include 'videojuegos.php';
$conexion = new Conexion();
$videojuegos = new Videojuegos($conexion->obtenerConexion());

$id = isset($_POST['id']) ? $_POST['id'] : '';
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
$dificultad = isset($_POST['dificultad']) ? $_POST['dificultad'] : '';
$anioLanzamiento = isset($_POST['lanzamiento']) ? $_POST['lanzamiento'] : '';
$precio = isset($_POST['precio']) ? $_POST['precio'] : '';

if ($id == '') {
    $resultado = $videojuegos->agregarVideojuego($nombre, $categoria, $dificultad, intval($anioLanzamiento), floatval($precio));
} else {
    $resultado = $videojuegos->actualizarVideojuego(intval($id), $nombre, $categoria, $dificultad, intval($anioLanzamiento), floatval($precio));
}

$response = [
    'resultado' => $resultado
];
header('Content-Type: application/json');
echo json_encode($response);
?>