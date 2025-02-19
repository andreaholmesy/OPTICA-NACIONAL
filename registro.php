<?php
if(!empty($_POST)){
  require_once "DB_conexion.php"; //conexión a la base de datos.
  //Datos del cliente enviados por el formulario:
  $cédula    = mysqli_real_escape_string($conexion, $_POST['cédula']);
  $nombre    = mysqli_real_escape_string($conexion, $_POST['nombre']);
  $teléfono  = mysqli_real_escape_string($conexion, $_POST['teléfono']);
  $correo    = mysqli_real_escape_string($conexion, $_POST['correo']);
  $dirección = mysqli_real_escape_string($conexion, $_POST['dirección']);
  $clave     = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);//Encriptación de contraseña.

  //Consulta a la base de datos, se confirma si el cliente (y el correo) existe o no:
  $query = mysqli_query($conexion, "SELECT * FROM cliente WHERE cédula_cliente = '$cédula' OR correo_cliente = '$correo'");
  $result = mysqli_fetch_array($query);

  //Si no existe, se guardan los datos en la base de datos:
  if($result == 0){
    $query_insert = mysqli_query($conexion, "INSERT INTO cliente(cédula_cliente,
      nombre_cliente, teléfono_cliente, correo_cliente, dirección_cliente, clave_cliente)
      VALUES('$cédula', '$nombre', '$teléfono', '$correo', '$dirección', '$clave')");

      mysqli_close($conexion);//Cerrar la conexión con la base de datos.

      //Si se almacena correctamente, se redirige a la página "Productos" para realizar el login:
      echo '
        <script>
          alert("¡Registro exitoso! Inicie sesión en el ícono de usuario.");
          window.location = "Productos.php";
        </script>
      ';
      exit();

    //Si falla al guardarse, se muestra un mensaje de error:
    if($query_insert == false){
      echo '
        <script>
          alert("Ha ocurrido un error al momento de almacenar los datos.");
          window.location = "Productos.php";
        </script>
      ';
      exit();
    }
  }else{//Si el cliente (su cédula o su correo) ya existe, se muestra un mensaje de error:
    echo '
      <script>
        alert("¡Error!, cliente o correo ya registrados.");
        window.location = "Productos.php";
        </script>
    ';
    exit();
  }
  //mysqli_close($conexion);
}
 ?>
