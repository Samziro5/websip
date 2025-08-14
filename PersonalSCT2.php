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

          $sql = "SELECT PLACA, GRADO, NOMBRE, ZONA_VIAL, FOTO, CURP, FUNCIONES_ADMIN_OPERATIVO FROM `$tabla` WHERE PLACA = ?";
          $stmt = $conn->prepare($sql);
  if (!$stmt) {
      echo "Error preparando sentencia: " . $conn->error;
      continue;
  }
  $stmt->bind_param("s", $placa);
  $stmt->execute();
  $stmt->store_result(); // 👈 importante
  $stmt->bind_result($placa_encontrada, $grado, $nombre, $zona_vial, $foto, $curp, $funciones);

  if ($stmt->fetch()) {
      $stmt->close();
      return [
          'PLACA' => $placa_encontrada,
          'GRADO' => $grado,
          'NOMBRE' => $nombre,
          'ZONA_VIAL' => $zona_vial,
          'FOTO'=> $foto,
          'CURP' => $curp,
          'FUNCIONES_ADMIN_OPERATIVO' => $funciones,
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
  <body>
    <!-- Formulario -->


        <div class="formulario-personal">
            <section class="card bg-light shadow p-4 card-custom">
                <form class="form-buscar" method="POST" action="">
                    <div class="row align-items-center mb-4 gx-2">
                        <div class="col-auto">
                            <label for="buscarPlaca" class="form-label mb-0">Ingresa la Placa:</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="placa" class="form-control" id="placa" required value="<?= htmlspecialchars($placa_buscada) ?>" placeholder="Ej. 123456">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="resultado"></div>
                        <?php if ($resultado): ?>
                            <div class="text-center text-success mb-3">¡Información encontrada!</div>
                            <div class="text-center mb-4">
                                <?php
                                    $fotoNombre = htmlspecialchars($resultado['FOTO']);
                                    $fotoRuta = "/Imagenes/IMG_PERSONAL/" . $fotoNombre;
                                    $archivoExiste = file_exists($_SERVER['DOCUMENT_ROOT'] . $fotoRuta);
                                    $srcImagen = $archivoExiste ? $fotoRuta : "/Imagenes/IMG_PERSONAL/";
                                    $altTexto = !empty($resultado['PLACA']) ? "Foto de " . htmlspecialchars($resultado['PLACA']) : "Foto del personal";
                                ?>
                                <div style="width:220px; height:230px; border:5px solid #c7ac00ff; margin:auto; border-radius:5px; display:flex; align-items:center; justify-content:center;">
                                    <img class="imagen-personal" src="<?= $srcImagen ?>" alt="<?= $altTexto ?>">
                                </div>
                            </div>

                            <!-- Aquí empieza el bloque con ROW y dos COL-6 -->
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="placa" class="form-label">Placa:</label>
                                    <input type="text" id="placa" class="form-control" value="<?= htmlspecialchars($resultado['PLACA']) ?>" disabled>
                                </div>
                                <div class="col-6">
                                    <label for="grado" class="form-label">Grado:</label>
                                    <input type="text" id="grado" class="form-control" value="<?= htmlspecialchars($resultado['GRADO']) ?>" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="nombre" class="form-label">Nombre:</label>
                                    <input type="text" id="nombre" class="form-control" value="<?= htmlspecialchars($resultado['NOMBRE']) ?>" disabled>
                                </div>
                                <div class="col-6">
                                    <label for="zona" class="form-label">Zona Vial:</label>
                                    <input type="text" id="zona" class="form-control" value="<?= htmlspecialchars($resultado['ZONA_VIAL']) ?>" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="curp" class="form-label">CURP:</label>
                                    <input type="text" id="curp" class="form-control" value="<?= htmlspecialchars($resultado['CURP']) ?>" disabled>
                                </div>
                                <div class="col-6">
                                    <label for="funciones" class="form-label">Funciones:</label>
                                    <input type="text" id="funciones" class="form-control" value="<?= htmlspecialchars($resultado['FUNCIONES_ADMIN_OPERATIVO']) ?>" disabled>
                                </div>
                            </div>

                        <?php elseif ($mensaje_alerta): ?>
                            <p class="error-message"><?= $mensaje_alerta ?></p>
                        <?php elseif (!empty($placa_buscada)): ?>
                            <p class="no-results-message">
                                No se encontró información para la placa: <strong><?= htmlspecialchars($placa_buscada) ?></strong>
                            </p>
                        <?php endif; ?>
                    </div>
                </form>
            </section>
        </div>

    </body>

    <footer>
        <div class="row-footer">
            <div class="column-footer0"><img src="Imagenes/fondofooter.webp" class="fondofooter"></div>
            <div class="column-footer1"><img src="Imagenes/ANUBISv2.png" class="img-anubis-footer"></div>    
            <div class="column-footer2"><p class="copyright-footer">&copy Copyright SIP-SCT- 2024</p></div>
        </div>
    </footer>
    
</html>
<!-- 
CODIGO LETY
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Consulta de Información</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      /* Este es el color de fondo, se lo quitas por que tu ya lo tienes */
      background: linear-gradient(to right, #004aad, #ffde59);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .card-custom {
      width: 100%;
      max-width: 700px;
    }

    .photo-frame {
      width: 150px;
      height: 180px;
      border: 2px dashed #6c757d;
      border-radius: 5px;
      margin: auto;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f8f9fa;
    }

    .photo-frame img {
      max-width: 100%;
      max-height: 100%;
      border-radius: 5px;
    }

    .form-label {
      font-weight: 500;
    }
  </style>
</head>
<body>

    <div class="card bg-light shadow p-4 card-custom">  /// section
        <form>                                          // CONTAINER
            <div class="row align-items-center mb-4 gx-2"> // row
                <div class="col-auto">                      //COL
                <label for="buscarPlaca" class="form-label mb-0">Ingresa la Placa:</label>
                </div>
                <div class="col">
                <input type="text" class="form-control" id="buscarPlaca" placeholder="Ej. 123456">
                </div>
                <div class="col-auto">
                <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </div>

            <h5 class="text-center text-success mb-3">¡Información encontrada!</h5>

            <div class="text-center mb-4">
                <div style="width:150px; height:180px; border:2px solid #6c757d; margin:auto; border-radius:5px; display:flex; align-items:center; justify-content:center;">
                    <img src="https://via.placeholder.com/150x180" alt="Foto del oficial" class="photo" style="max-width:100%; max-height:100%;">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Placa:</label>
                    <input type="text" class="form-control" id="placa" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Zona Vial:</label>
                    <input type="text" class="form-control" id="zona" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">CURP:</label>
                    <input type="text" class="form-control" id="curp" readonly>
                </div>
            </div>

            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Grado:</label>
                    <input type="text" class="form-control" id="grado" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Funciones:</label>
                    <input type="text" class="form-control" id="funciones" readonly>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
            
           
     -->
