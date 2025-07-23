
            <!-- // $servername = "db5017197569.hosting-data.io";
            // $username = "dbu1936784";
            // $password = "Onceenanit0512";
-->
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// --- Configuración de conexión ---
$host = 'db5017197569.hosting-data.io';
$usuario = 'dbu1936784';
$contrasena = 'Onceenanit0512';
$bd = 'dbs13811204';

$conexion = new mysqli($host, $usuario, $contrasena, $bd);

if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
 
}

// --- Función segura para buscar por placa ---
function buscar_por_placa($conn, $placa) {
    $tablas = ["DGOT", "SCT", "ZV1", "ZV2", "ZV3", "ZV4", "ZV5", "DIDM", "DCEVP", "DGIT", "DIVIT", "DSV", "DSOT", "DGANT", "DIDF", "DCIPI", "DCD", "SPI"];
    foreach ($tablas as $tabla) {
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $tabla)) continue;

        $sql = "SELECT PLACA, GRADO, NOMBRE, ZONA_VIAL, FOTO FROM `$tabla` WHERE PLACA = ?";
        $stmt = $conn->prepare($sql);
if (!$stmt) {
    echo "Error preparando sentencia: " . $conn->error;
    continue;
}
$stmt->bind_param("s", $placa);
$stmt->execute();
$stmt->store_result(); // 👈 importante
$stmt->bind_result($placa_encontrada, $grado, $nombre, $zona_vial, $foto);

if ($stmt->fetch()) {
    $stmt->close();
    return [
        'PLACA' => $placa_encontrada,
        'GRADO' => $grado,
        'NOMBRE' => $nombre,
        'ZONA_VIAL' => $zona_vial,
        'FOTO'=> $foto,
    ];
}

        $stmt->close();
    }
    return null;
}

// --- Procesar búsqueda ---
$mensaje_alerta = '';
$resultado = null;
$placa_buscada = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['placa'])) {
    $placa_buscada = trim($_POST['placa']);

    if (!preg_match('/^[A-Z0-9]{5,7}$/i', $placa_buscada)) {
        $mensaje_alerta = "Formato de placa inválido.";
    } else {
        $resultado = buscar_por_placa($conexion, $placa_buscada);
    }
}

$conexion->close();
?>

<!-- Formulario -->
<form method="POST" action="">
    <label for="placa">Ingresa la Placa:</label>
    <input type="text" name="placa" id="placa" required 
           value="<?= htmlspecialchars($placa_buscada) ?>" placeholder="Ej: ABC123">
    <button type="submit">Buscar</button>
</form>

<!-- Resultados -->
<div class="resultado">
<?php if ($resultado): ?>
    <div class="success-message">¡Información encontrada!</div>

   <!-- Mostrar imagen -->
    <?php
        $fotoNombre = htmlspecialchars($resultado['FOTO']);  // nombre del archivo, por ejemplo "85208.jpg"
        $fotoRuta = "/Imagenes/IMG_PERSONAL/" . $fotoNombre;

        // Verifica si el archivo existe en el servidor
        $archivoExiste = file_exists($_SERVER['DOCUMENT_ROOT'] . $fotoRuta);
        $srcImagen = $archivoExiste ? $fotoRuta : "/Imagenes/IMG_PERSONAL/";

        $altTexto = !empty($resultado['PLACA']) ? "Foto de " . htmlspecialchars($resultado['PLACA']) : "Foto del personal";
    ?>

    <div class="imagen-resultado">
        <img src="<?= $srcImagen ?>" alt="<?= $altTexto ?>" style="max-width:400px;">
    </div>

    <!-- Datos -->
    <label for="placa">Placa:</label>
    <input type="text" id="placa" value="<?= htmlspecialchars($resultado['PLACA']) ?>" disabled>

    <label for="grado">Grado:</label>
    <input type="text" id="grado" value="<?= htmlspecialchars($resultado['GRADO']) ?>" disabled>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" value="<?= htmlspecialchars($resultado['NOMBRE']) ?>" disabled>

    <label for="zona">Zona Vial:</label>
    <input type="text" id="zona" value="<?= htmlspecialchars($resultado['ZONA_VIAL']) ?>" disabled>
<?php elseif ($mensaje_alerta): ?>
    <p class="error-message"><?= $mensaje_alerta ?></p>
<?php elseif (!empty($placa_buscada)): ?>
    <p class="no-results-message">
        No se encontró información para la placa: 
        <strong><?= htmlspecialchars($placa_buscada) ?></strong>
    </p>
<?php endif; ?>