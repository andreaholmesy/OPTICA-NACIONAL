<?php
  session_start();
  session_destroy();

  header('location: ../Productos.php'); //Redirigir a la página "Productos".
 ?>
