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

$sql = "SHOW TABLES LIKE '$tabla'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $sql = "TRUNCATE TABLE $tabla";
    if (mysqli_query($conn, $sql)) {
        echo "La tabla '$tabla' ha sido vaciada correctamente.<br>";
    } else {
        echo "Error al vaciar la tabla '$tabla': " . mysqli_error($conn);
    }
} else {
    $sql = "CREATE TABLE $tabla (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50),
        categoria VARCHAR(50),
        dificultad VARCHAR(20),
        anio_lanzamiento INT(4),
        precio DECIMAL(8,2)
    )";

    if (mysqli_query($conn, $sql)) {
        echo "La tabla '$tabla' ha sido creada correctamente.<br>";
    } else {
        echo "Error al crear la tabla '$tabla': " . mysqli_error($conn);
    }
}


$registros = 300000;
$lotes = ceil($registros / 10000);
$registrosPorLote = 10000;

$categorias = ["Accion", "Aventura", "Estrategia", "Deportes", "RPG", "Disparos", "Rol", "Simulacion", "Otros"];
$dificultades = ["Facil", "Normal", "Dificil", "Extremo"];

$preciosMin = 10;
$preciosMax = 100;

$registrosInsertados = 0;

for ($loteActual = 1; $loteActual <= $lotes; $loteActual++) {
    $valores = "";

    for ($i = 0; $i < $registrosPorLote && $registrosInsertados < $registros; $i++) {
        $nombre = "Videojuego " . ($registrosInsertados + 1);
        $categoria = $categorias[array_rand($categorias)];
        $dificultad = $dificultades[array_rand($dificultades)];
        $anioLanzamiento = rand(1980, 2023);
        $precio = rand($preciosMin * 100, $preciosMax * 100) / 100;

        $valores .= "('$nombre', '$categoria', '$dificultad', $anioLanzamiento, $precio),";
        $registrosInsertados++;
    }
    $valores = rtrim($valores, ",");

    $sql = "INSERT INTO $tabla (nombre, categoria, dificultad, anio_lanzamiento, precio) VALUES $valores";

    if (!mysqli_query($conn, $sql)) {
        echo "Error al insertar los registros del lote $loteActual: " . mysqli_error($conn) . "<br>";
    } else {
        echo "Se han insertado " . mysqli_affected_rows($conn) . " registros en el lote $loteActual <br>";
    }

    if ($loteActual === $lotes) {
        echo "Se han insertado todos los registros en la tabla.<br>";
    }
}

mysqli_close($conn);

?>
