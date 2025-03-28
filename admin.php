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
        <h6>Bienvenido. &nbsp; <?php echo htmlspecialchars($_SESSION['usuario']); ?>&nbsp;</h6>
        <br>
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
                                <li><a href="logout.php">Cerrar sesión</a></li>
            
   
                                <!-- <li><a href="Infracciones.html">Infracciones/Soporte</a></li> -->
                            </ul>
                        </nav>
                    </div>
                     
            </div>
        </div>       
    
        </section>   
    </header>    
    <section class="seccion-btn-group">
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">

        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
        <label class="btn btn-outline-primary" for="btnradio1" onclick="showSection('infracciones')">Infracciones</label>
   

        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio2" onclick="showSection('motocicletas')">Motocicletas</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio3" onclick="showSection('depositos')">Depositos</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio4" onclick="showSection('fotos-civicas')">Fotos Civicas</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio5" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio5" onclick="showSection('total-general')">Total Generales</label>
        </div>

    </section>
    
        <section id="infracciones" class="info-section">
                <?php include 'prueba1.html';?>
        </section>
        <section id="motocicletas" class="info-section"style="display:none;">
                <?php include 'prueba2.html';?>
        </section>
        <section id="depositos" class="info-section" style="display:none;">
                <?php include 'prueba3.html';?>
        </section>
        <section id="fotos-civicas" class="info-section" style="display:none;">
            <?php include 'prueba4.html';?>
        </section>
        <section id="total-general" class="info-section" style="display:none;">
                <?php include 'prueba5.html';?>
        </section>

    <script>
        function showSection(sectionId) {
        var sections = document.querySelectorAll('.info-section');
        sections.forEach(function(section) {
            section.style.display = 'none';
        });
        var selectedSection = document.getElementById(sectionId);
        if (selectedSection) {
            selectedSection.style.display = 'block';
            }
        }
    </script>
    

   
    
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
<?php
// logout.php
session_start();
session_destroy(); // Destruye la sesión
header("Location: login.php"); // Redirige a la página de inicio de sesión
exit();
?>