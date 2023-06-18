<?php
require_once "global.php";

$servername = DB_Host . ":" . DB_Puerto;
$username = DB_Usuario;
$password = DB_Contrasena;
$database = DB_BaseDeDatos;


$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Error al conectar con MySQL: " . mysqli_connect_error());
}

$tabla = "videojuegos";

// Verificar si la tabla existe
$sql = "SHOW TABLES LIKE '$tabla'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // La tabla existe, vaciarla
    $sql = "TRUNCATE TABLE $tabla";
    if (mysqli_query($conn, $sql)) {
        echo "La tabla '$tabla' ha sido vaciada correctamente.";
    } else {
        echo "Error al vaciar la tabla '$tabla': " . mysqli_error($conn);
    }
} else {
    // La tabla no existe, crearla
    $sql = "CREATE TABLE $tabla (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50),
        categoria VARCHAR(50),
        dificultad VARCHAR(20),
        anio_lanzamiento INT(4),
        precio DECIMAL(8,2)
    )";

    if (mysqli_query($conn, $sql)) {
        echo "La tabla '$tabla' ha sido creada correctamente.";
    } else {
        echo "Error al crear la tabla '$tabla': " . mysqli_error($conn);
    }
}

// Generar y llenar 300,000 registros
$registros = 300000;

$categorias = ["Accion", "Aventura", "Estrategia", "Deportes", "RPG", "Disparos", "Rol", "Simulacion", "Otros"];
$dificultades = ["Facil", "Normal", "Dificil", "Extremo"];

$preciosMin = 10;
$preciosMax = 100;

for ($i = 1; $i <= $registros; $i++) {
    $nombre = "Videojuego " . $i;
    $categoria = $categorias[array_rand($categorias)];
    $dificultad = $dificultades[array_rand($dificultades)];
    $anioLanzamiento = rand(1980, 2023);
    $precio = rand($preciosMin * 100, $preciosMax * 100) / 100;

    $sql = "INSERT INTO $tabla (nombre, categoria, dificultad, anio_lanzamiento, precio) VALUES ('$nombre', '$categoria', '$dificultad', $anioLanzamiento, $precio)";

    if (!mysqli_query($conn, $sql)) {
        echo "Error al insertar el registro número $i: " . mysqli_error($conn);
    }
}

echo "Se han insertado $registros registros en la tabla '$tabla'.";

mysqli_close($conn);
?>
