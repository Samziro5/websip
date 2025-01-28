<?php
// Conexión a la base de datos
$conexion= new mysqli("localhost","root","","bd_websip");
// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta para contar el número de artículos
$sql = "SELECT COUNT(*) as total FROM sabana_prueba"; // Cambia según tus necesidades
$result = $conexion->query($sql);

// Inicializar la variable para el valor del input
$valor = 0; // Valor por defecto

// Verificar si la consulta fue exitosa
if ($result) {
    $row = $result->fetch_assoc(); // Obtener el resultado
    $valor = $row['total']; // Asignar el total a la variable
} else {
    echo "Error en la consulta: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" class="form-tablero">
        <label for ="ARTICULO">Articulo</label>
        <input type="number" value="<?php echo htmlspecialchars($valor);?>" id="ARTICULO" name="ARTICULO"/>
</form>
    
</body>
</html>
</diV>