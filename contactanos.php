<?php
include "DB_conexion.php";
if(!empty($_POST)){
$nombre     = mysqli_real_escape_string($conexion, $_POST['nombre']);
$email      = mysqli_real_escape_string($conexion, $_POST['email']);
$numero     = mysqli_real_escape_string($conexion, $_POST['numero']);
$asunto     = mysqli_real_escape_string($conexion, $_POST['asunto']);
$mensaje    = mysqli_real_escape_string($conexion, $_POST['mensaje']);

$query_insert = mysqli_query($conexion, "INSERT INTO contactanos(nombre, email, numero,
asunto, mensaje) 
VALUES('$nombre', '$email', '$numero', '$asunto','$mensaje')");

if($query_insert == false){
    echo "Error";
}else{//Si mo ocurrió algún error, se muestra un mensaje y se espera 0.5 sg para redirigir a "Nosotros.php":
  mysqli_close($conexion);
  echo '
    <script>
      alert("Mensaje enviado!");
    </script>
  ';
  echo
  '<script>
    setTimeout(() => {
      window.location = "Nosotros.php";
    }, 500);
  </script>';
}
}
?>