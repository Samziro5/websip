

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
                    
                    
                    
                    <div class=column-login>
                        <label for="usuario">Usuario</label>
                        <input type="txt" id="usuario" name="usuario" required>
                    </div>
                    <div class=column-login>
                        <label for="contraseña">Contraseña</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class=column-login-acceder>
                       <button type="submit" id=acceder  name="acceder">Acceder </button> 
                    </div>

                 
                </form>
             
            </div>
           
        </section>
        
            
                

            </div>
        </div> 

        
    </body>
    <footer>
    
        
    </footer>
</html>
