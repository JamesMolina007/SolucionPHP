<?php

require_once('Conexion.php');
require_once('Videojuegos.php');
$conexion = new Conexion();
$videojuegos = new Videojuegos($conexion->obtenerConexion());

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$registrosPorPagina = 10;
$offset = ($pagina - 1) * $registrosPorPagina;
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

$totalVideojuegos = count($videojuegos->obtenerVideojuegos($busqueda));
$totalPaginas = ceil($totalVideojuegos / $registrosPorPagina);
$videojuegosPaginados = array_slice($videojuegos->obtenerVideojuegos($busqueda), $offset, $registrosPorPagina);

$tabla = '<thead>
            <tr>
                <th><input type="checkbox" id="check-all" /></th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Dificultad</th>
                <th>Año de Lanzamiento</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>';
foreach ($videojuegosPaginados as $videojuego) {
    $tabla .= '<tr>
                <td><input type="checkbox" class="check-item" id="check-' . $videojuego['id'] . '" data-id="' . $videojuego['id'] . '" /></td>
                <td>' . $videojuego['id'] . '</td>
                <td>' . $videojuego['nombre'] . '</td>
                <td>' . $videojuego['categoria'] . '</td>
                <td>' . $videojuego['dificultad'] . '</td>
                <td>' . $videojuego['anio_lanzamiento'] . '</td>
                <td>' . $videojuego['precio'] . '</td>
                <td>
                    <button class="btn btn-success btn-sm btn-editar" data-id="' . $videojuego['id'] . '"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger btn-sm btn-eliminar" data-id="' . $videojuego['id'] . '"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>';
}
$tabla .= '</tbody>';
                
$response = [
    'tabla' => $tabla,
    'totalPaginas' => $totalPaginas
];

header('Content-Type: application/json');
echo json_encode($response);
?>
