
<?php
  $host_name = 'db5017197569.hosting-data.io';
  $database = 'dbs13811204';
  $user_name = 'dbu1936784';
  $password = 'Onceenanit0512';

  $link = new mysqli($host_name,$user_name,$password,$database);

  if ($link->connect_error) {
    die('<p>Error al conectar con servidor MySQL: '. $link->connect_error .'</p>');
  } else {
    echo '<p>Se ha establecido la conexión al servidor MySQL con éxito.</p>';
  }
?>