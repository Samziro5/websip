<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conexión a la base de datos
    $servername = 'db5017197569.hosting-data.io';
    $username = 'dbu1936784';
    $password = 'Onceenanit0512';
    $dbname = 'dbs13811204';

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener los valores del formulario
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Consulta para verificar el usuario y la contraseña
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuario encontrado
        $usuario = $result->fetch_assoc();  // Obtener los datos del usuario
        $_SESSION['usuario'] = $usuario;  // Guardar el nombre de usuario en la sesión
        $_SESSION['Nivel'] = $usuario['Nivel'];  // Guardar el nivel del usuario en la sesión

        // Redireccionar según el nivel del usuario
        if ($_SESSION['Nivel'] == 1) {
            // Redirigir a la página para usuarios regulares
            header('Location: admin.php');
        } elseif ($_SESSION['Nivel'] == 2) {
            // Redirigir a la página para administradores
            header('Location: cliente.php');
        } elseif ($_SESSION['Nivel'] == 3) {
            // Redirigir a la página para administradores
            header('Location: responsable.php');
        } else {
            // Redirigir a una página predeterminada en caso de nivel desconocido
            $error = "Usuario o contraseña incorrectos1.";
        }
        exit();
    } else {
        // Usuario o contraseña incorrectos
        $error = "Usuario o contraseña incorrectos2.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <div class="container">
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form action="login.php" method="POST">
            <input type="text" name="usuario" placeholder="Usuario" required><br>
            <input type="password" name="contraseña" placeholder="Contraseña" required><br>
            <button type="submit" class="btn">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
