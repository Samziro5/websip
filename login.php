<?php
// Variables de conexión a la base de datos
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
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sip</title>
        <link rel="stylesheet" href="reset.css">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
        

        <!--     Bootstrap     -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <section>
            <div class="container-login">
                    <div class="row-login">
                        <form action="login.php" method="post" class="form-login">

                        <div class=column-login-img><img src="Imagenes/anubis.png" class="img-login"></div>
                        
                            <div class=column-login>
                            <label for="usuario">Usuario</label>
                            <input type="text"  name="usuario" id="usuario"  required>
                        </div>
                        <div class=column-login>
                            <label for="contraseña">Contraseña</label>
                            <input type="password"  name="contraseña" id="contraseña"  required>
                        </div>
                        <div class=column-login-acceder>
                        <button type="submit" id=acceder  name="acceder">Acceder </button> 
                        </div>
                        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>

                 
                        </form>
             
                    </div>
            </div>
        </section>
        
    </body>
  
</html>

