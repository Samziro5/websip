
<?php
$host_name = 'db5017197569.hosting-data.io';
$user_name = 'dbu1936784';
$password = 'Onceenanit0512';
$database = 'dbs13811204';

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION['usuario'] = $usuario;

$link = mysqli_connect($host_name, $user_name, $password, $database);

if (!$link) {
    die("Error de conexión: " . mysqli_connect_error());
}

$stmt = $link->prepare("SELECT * FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $filas = $resultado->fetch_array();
    if (password_verify($contraseña, $filas['contraseña'])) {
        if ($filas['Id'] == 1) {
            header("Location: admin.php");
            exit();
        } elseif ($filas['Id'] == 2) {
            header("Location: cliente.php");
            exit();
        }
    } else {
        echo '<h1 class="bad">Error en la Autentificación</h1>';
    }
} else {
    echo '<h1 class="bad">Error en la Autentificación</h1>';
}

$stmt->close();
mysqli_close($link);
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
                        <form action="validar.php" method="post" class="form-login">

                        <div class=column-login-img><img src="Imagenes/anubis.png" class="img-login"></div>
                        
                        <?
                        include "controlador_login.php";
                        include "conexion.php";

                        
                        ?>
                        
                        <div class=column-login>
                            <label for="usuario">Usuario</label>
                            <input type="txt" id="usuario" name="usuario" required>
                        </div>
                        <div class=column-login>
                            <label for="password">Contraseña</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class=column-login-acceder>
                        <button type="submit" id=acceder  name="acceder">Acceder </button> 
                        </div>

                 
                        </form>
             
                    </div>
            </div>
        </section>
        
    </body>
  
</html>
