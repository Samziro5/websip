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
      <section class="seccion-btn-group">
            <form>
            
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                
                
                        <input type="radio" class="btn-check" name="group" id="btnradio1" autocomplete="off" checked>
                        <label class="btn btn-outline-primary" for="btnradio1" onclick="showSection('infracciones')">Total General de Infracciones a Vehículos</label>
                        
                        <input type="radio" class="btn-check" name="group" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio2" onclick="showSection('motocicletas')">Total General de Infracciones a Motocicletas</label>

                        <input type="radio" class="btn-check" name="group" id="btnradio3" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio3" onclick="showSection('depositos')">Total General Depositos</label>

                        <input type="radio" class="btn-check" name="group" id="btnradio4" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio4" onclick="showSection('fotos-civicas')">Tota General Fotos Civicas</label>
                    </div>
                    
            </form>
        </section>
        <section id="infracciones" class="info-section">
                <?php include 'Infracciones/infracciones.php';?>
        </section>
        <section id="motocicletas" class="info-section"style="display:none;">
                <?php include 'Inf_motos/inf_motos.php';?>
        </section>
        <section id="depositos" class="info-section" style="display:none;">
                <?php include 'Inf_depositos/inf_depositos.php';?>
        </section>
        <section id="fotos-civicas" class="info-section" style="display:none;">
            <?php include 'Inf_civicas/inf_fotoscivicas.php';?>
        </section>
     
<script>
  function showSection(sectionId) {
    // Oculta todas las secciones
    const sections = document.querySelectorAll('.info-section');
    sections.forEach(sec => sec.style.display = 'none');

    // Muestra la sección seleccionada
    document.getElementById(sectionId).style.display = 'block';
  }

  function showSubSection(subId) {
    // Oculta todas las subsecciones
    const subSections = document.querySelectorAll('.sub-section');
    subSections.forEach(sub => sub.style.display = 'none');

    // Muestra la subsección seleccionada
    document.getElementById(subId).style.display = 'block';
  }
</script>
   
</body>

<footer>
                <div class="row-footer">
                    <div class="column-footer0"><img src="Imagenes/fondofooter.webp" class="fondofooter"></div>
                    <div class="column-footer1"><img src="Imagenes/ANUBISv2.png" class="img-anubis-footer"></div>    
                    <div class="column-footer2"><p class="copyright-footer">&copy Copyright SIP-SCT- 2024</p></div>
                </div>
</footer>
</html>
