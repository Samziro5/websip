<!-- <?php

    session_start();

    //if (!isset($_SESSION['usuario'])) {
     //   header('Location: admin.php');
    //    exit();
    //}

?> -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Raiz</title>     
        
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
     
    <header class="header-raiz">
        <section class="titulo-conectado">
            <h6>Usuario Conectado &nbsp;  </h6>                    
            <h6>Bienvenido. &nbsp; <?php echo htmlspecialchars($_SESSION['usuario']); ?></h6><br>
            <h6>Has iniciado sesión correctamente.</h6>
        </section>
        <section> 
            <div class="container-header"> 
                <div class="row-header"> <img src="Imagenes/fondofooter.webp" class="img-header">
                    
                    <div class="column-header1"> 
                        <img src="Imagenes/ANUBISv3.png" class="logoAnubis-header"><!--Logo aNUBIS  -->                       
                        
                    </div>
                
                    <div class="column-header2">
                        <div class="caja">
                          <!-- Botones de Nvegacion -->
                            <nav>
                                <ul>
                                    <li><a href="index.php">Principal</a></li>
                                    <!-- <li><a href="Infracciones.html">Infracciones/Soporte</a></li> -->
                                </ul>
                            </nav>
                        </div>
                         
                </div>
            </div>       
        
        </section>   
    </header>    
    <section>
        <div class="container-raiz">
                <div class="row-raiz">
                        <div class="column-raiz">
                            <img src="/Imagenes/en_construccion.png" class="img-constr">
                        </div>
                </div>
        </div>

    </section>
    

    
        <a href="logout.php">Cerrar sesión</a>    
        
    </body>

    <footer>
        <div class="container-footer"><img src="Imagenes/fondofooter.webp" class="fondofooter">
                <div class="row-footer">
                    <div class="column-footer1"><img src="Imagenes/ANUBISv2.png" class="img-anubis-footer"></div>    
                    <div class="column-footer2"><p class="copyright-footer">&copy Copyright SIP-SCT- 2024</p></div>
                    
                </div>
        </div>
        
    </footer>



</html>