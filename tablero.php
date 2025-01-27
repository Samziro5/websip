<?php
?>
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
                            <input type="text" id=vehiculos name="vehiculos">  
                         
                            
                        </div>
                        <br><br>
                        <div class="row-column-tabla-1">
                            <label for ="vehiculos">Motos</label>
                            <input type="text" id=vehiculos name="vehiculos">                  
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
                    <div class="row-column-tabla-3"></div>
                    
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