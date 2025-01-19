<?php

include('db.php');

$USUARIO=$_POST['usuario'];
$PASSWORD=$_POST['password'];

session_start();
$_SESSION['usuario']=$USUARIO;

$conexion=mysqli_connect("localhost","root","","bd_websip");

$consulta="SELECT*FROM personal  where usuario='$USUARIO' and password='$PASSWORD'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if ($filas){
    header("location:infracciones.html");
    
    
}else{
    
    include("login.php");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACIÓN,<br><span> INTENTA NUEVAMENTE</span></h1>
    <?php

}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>