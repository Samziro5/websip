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

    <title>Infracciones</title>     
    
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

    <!--     Bootstrap     -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
    </head>
    <body>
 
    <header >
        
        <section class="seccion-usuario">
            <div class="container-usuario">
                <div class="row-usuario">
                    <div class="column-usuario">
                        <h6>Usuario Conectado&nbsp;</h6>
                        <h6>Bienvenido.&nbsp; <?php echo htmlspecialchars($_SESSION['usuario']); ?>&nbsp;</h6>
                        <h6>Has iniciado sesión correctamente.</h6>
                    </div>
                </div>
            </div>
        </section>
        <section class="nav-section2">
            <section class="container-header3">
                <div class="row-header3"> 
                    <img src="Imagenes/fondofooter.webp" class="img-header">
                    <div class="column-header3"> 
                        <img src="Imagenes/ANUBISv3.png" class="logoAnubis-header"><!--Logo aNUBIS  -->                       
                    </div>
                    <div class="column-header4">
                        <nav>
                            <ul>
                                <li><a href="Menu.php">Menu</a></li>
                                <li><a href="Infracciones_General.php">Infracciones</a></li>
                                <li><a href="remisiones.php">Remisiones</a></li>
                                <li><a href="PersonalSCT2.php">Personal en plantillas</a></li>
                                <li><a href="logout.php">Cerrar sesión</a></li>
                            </ul>
                        </nav>
                    </div>    
                </div>
            </section>
        </section>   
    </header>    
    
    <body>  
        <section class="section-menu-cont">
            <div class="container-inf-menu">
                <div class="row-inf-menu">
                    <div class="column-menu">
        
                        <!-- width="100%" height="750"  -->
                        <div><img src="Imagenes/Formacion1.jpeg" width= "100%" height="550" ></div>

                
                    </div>

            </div>    
        </section>  

    </body>

        <footer>
                <div class="row-footer">
                    <div class="column-footer0"><img src="Imagenes/fondofooter.webp" class="fondofooter"></div>
                    <div class="column-footer1"><img src="Imagenes/ANUBISv2.png" class="img-anubis-footer"></div>    
                    <div class="column-footer2"><p class="copyright-footer">&copy Copyright SIP-SCT- 2024</p></div>
                </div>
        </footer>
</html>