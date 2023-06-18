<?php

include 'conexion.php';
include 'videojuegos.php';
$conexion = new Conexion();
$videojuegos = new Videojuegos($conexion->obtenerConexion());

$id = isset($_POST['id']) ? $_POST['id'] : '';

$resultado = $videojuegos->eliminarVideojuego(intval($id));

$response = [
    'resultado' => $resultado
];

header('Content-Type: application/json');
echo json_encode($response);

?>