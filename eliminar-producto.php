<?php
  session_start(); //Iniciar sesión.
  include "DB_conexion.php"; //Conexión con la base de datos.

  if(empty($_GET['id'])){
    header('Location: Compra.php');
    mysqli_close($conexion);//Cerrar conexión con la base de datos.
  }

  $id_cliente   = $_SESSION['id_cliente'];//Variable para almacenar el ID del cliente en sesión.
  $id_producto  = $_GET['id'];//Variable para almacenar el ID del producto a eliminar.
  $fecha_actual = $_GET['date'];//Variable para almacenar la fecha actual.

  //Actualizar el estado del pedido (a 0) donde el ID del producto, [...]
  //[...] el ID del cliente y la fecha registrada correspondan a los datos enviados.
  $query_delete = mysqli_query($conexion, "UPDATE pedido SET estado_pedido = 0
    WHERE id_producto = '$id_producto' AND id_cliente = '$id_cliente' AND fecha_pedido = '$fecha_actual'");

    mysqli_close($conexion);//Cerrar conexión con la base de datos.

  if($query_delete){//Si se elimina con éxito, se redirige a la página "Compra.php".
    header('Location: Compra.php');
  }else{//Si ocurre algún error, se muestra un mensaje de advertencia, y se redirige a la página "Compra.php".
    echo '
      <script>
        alert("Error al eliminar el producto del carrito.");
      </script>
    ';
    header('Location: Compra.php');
  }

 ?>
