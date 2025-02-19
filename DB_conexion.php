<?php
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $data_base = 'optica_nacional';

  $conexion = @mysqli_connect($host, $user, $password, $data_base);

  if(!$conexion){
    echo "Error de conexion.";
  }

 ?>
