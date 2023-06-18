<?php

include 'conexion.php';
include 'videojuegos.php';
$conexion = new Conexion();
$videojuegos = new Videojuegos($conexion->obtenerConexion());

$ids = isset($_POST['ids']) ? $_POST['ids'] : '';

$resultado = $videojuegos->eliminarVideojuegos($ids);

$response = [
    'resultado' => $resultado
];

header('Content-Type: application/json');

echo json_encode($response);

?>