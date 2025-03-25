<?php
session_start();

// //Verificar si el usuario está autenticado /*!== true)*/
if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) { 
//Redirigir al usuario a la página de inicio de sesión
header("Location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>EEres un Joto Chucho </h1>
</body>
</html>