<!--  
    //<php//

        // Conexión a la base de datos
        $conexion= new mysqli("db5017197569.hosting-data.io","dbu1936784","Onceenanit0512","dbs13811204");
        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Consulta Total de Vehiculos
        
        $sql = "SELECT 
        ZONAVIAL,
        Infracciones_Vehiculos
        FROM (
            SELECT 
                ZONAVIAL,
                COUNT(*) AS Infracciones_Vehiculos
            FROM 
                sabana09 
            WHERE 
                TIPODEVEHICULO != 'MOTOCICLETA'  -- Excluir motocicletas
            GROUP BY 
                ZONAVIAL
            WITH ROLLUP
            ) AS totalvehiculos";

    $result = $conexion->query($sql);

    // Inicializar la variable para el valor del total general
    $valorvehiculos = 0; // Valor por defecto
    $valormotos=0;

    // Verificar si la consulta fue exitosa
    if ($result) {
        // Recorrer todos los resultados
        while ($row = $result->fetch_assoc()) {
            // Verificar si ZONAVIAL es NULL (esto indica un total general)
            if (is_null($row['ZONAVIAL'])) {
                $valorvehiculos = $row['Infracciones_Vehiculos']; // Asignar el total general a la variable
            } else {
                // Aquí puedes manejar los resultados individuales si es necesario
                // echo "ZONAVIAL: " . $row["ZONAVIAL"] . " - Infracciones: " . $row["Infracciones_Vehiculos"] . "<br>";
            }
        }
    } else {
        echo "Error en la consulta: " . $conexion->error;
    }

    // Cerrar la conexión


    // Consulta Total Motos
    $sql = "SELECT 
        ZONAVIAL,
        Infracciones_Vehiculos
        FROM (
            SELECT 
                ZONAVIAL,
                COUNT(*) AS Infracciones_Vehiculos
            FROM 
                sabana09 
            WHERE 
                TIPODEVEHICULO = 'MOTOCICLETA'  -- Excluir motocicletas
            GROUP BY 
                ZONAVIAL
            WITH ROLLUP
        ) AS totalmotos";

    $result = $conexion->query($sql);
    // Verificar si la consulta fue exitosa
    if ($result) {
        // Recorrer todos los resultados
        while ($row = $result->fetch_assoc()) {
            // Verificar si ZONAVIAL es NULL (esto indica un total general)
            if (is_null($row['ZONAVIAL'])) {
                $valormotos = $row['Infracciones_Vehiculos']; // Asignar el total general a la variable
            } else {
                // Aquí puedes manejar los resultados individuales si es necesario
                // echo "ZONAVIAL: " . $row["ZONAVIAL"] . " - Infracciones: " . $row["Infracciones_Vehiculos"] . "<br>";
            }
        }
    } else {
        echo "Error en la consulta: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();    


    //?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>     
    
    <link rel="stylesheet" href="rest.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="virtual-select.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

     <!--     Bootstrap     -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<header>
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
                                        <li><a href="index.html">Principal</a></li>
                                        <li><a href="Infracciones.html">Infracciones/Soporte</a></li>
                                        
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>  


                    </div>
                        
        </div>       
</header>
  
    <div class="container-tablero">
    
        <div class="row-tablero">
                <form action="#" method="post" class="form-tablero">
                    <div class="column-tabla-1"><h5> INFRACCIONES GENERALES</h5>
                        <div class="row-column-tabla-1">
                            <label for ="vehiculos">Vehículos</label>
                            <input type="text" value="<?php echo htmlspecialchars($valorvehiculos);?>" id="totalvehiculos" name="totalvehiculos"/>  
                        </div>
                        <br><br>
                        <div class="row-column-tabla-1">
                            <label for ="vehiculos">Motos</label>
                            <input type="text" value="<?php echo htmlspecialchars($valormotos);?>" id="totalmotos" name="totalmotos"/>              
                        </div>
                    </div>    
                        
                    
                    <div class="column-tabla-2"><h5>DEPOSITOS GENERALES </h5>
                            <div class="row-column-tabla-1">
                                <label for ="vehiculos">Vehículos</label>
                                <input type="text" id=vehiculos name="vehiculos">                  
                            </div>
                            <br><br>
                            <div class="row-column-tabla-1">
                                <label for ="vehiculos">Motos</label>
                                <input type="text" id=vehiculos name="vehiculos">                  
                            </div>                                
                    </div>
                    
                    <div class="column-tabla-3"><h5>GRÁFICAS</h5>
                        <div class="row-column-tabla-3">
                          <img src="Imagenes/graficapbi.png" class="graficaspbi">                                                                            
                            
                        </div>
                    
                    </div>
                    <div class="column-tabla-4"><h5>ZONAS VIALES</h5>
                        <section class="botoncito">
                            <div class="div-label">
                
                                <select id="multipleSelect" multiple name="native-select" placeholder="Seleccione Zonas Viales" data-search="true" data-silent-initial-value-set="true">
                                    <option value="1">Zona 1 Norte</option>
                                    <option value="2">Zona 2 Centro</option>
                                    <option value="3">Zona 3 Oriente</option>
                                    <option value="3">Zona 4 Sur</option>
                                    <option value="3">Zona 5 Poniente</option>
                                    <option value="3">Zona 6 Infracciones</option>
                                    <option value="3">Zona 7 Grúas</option>
                                    <option value="3">Zona 8 Parquímetros</option>

                                </select>

                            </div>
                            <script type="text/javascript" src="js/virtual-select.min.js"></script>
                            <script type="text/javascript">
                                VirtualSelect.init({
                                    ele: '#multipleSelect'

                                });
                            </script>
    




                    </section>
                   
                
                    </div>

                </form>  
        </div>  
    </div>          
    
   

            <!-- Bootstrap -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
              integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
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