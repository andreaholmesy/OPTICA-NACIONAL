<?php
  session_start();//Iniciar sesión.
  include "DB_conexion.php";//Conexión con la base de datos.

  if(!empty($_POST)){//Si no está vacío el POST [...]
    //[...] Se guardan en las siguientes variables los datos enviados por el formulario:
    $id_cliente          = $_SESSION['id_cliente'];
    $num_referencia      = $_POST['num-referencia'];
    $metodo_pago         = $_POST['metodo-pago'];
    $monto_transferencia = $_POST['monto-transferencia'];
    $comprobante_pago    = addslashes(file_get_contents($_FILES['comprobante']['tmp_name']));
    $fecha_actual        = $_POST['fecha-transferencia'];

    //Guardar datos de la transferencia en la base de datos:
    $query_pago = mysqli_query($conexion, "INSERT INTO transferencia(id_cliente, num_referencia, método_pago,
        monto_transferencia, comprobante_pago, fecha_transferencia)
      VALUES('$id_cliente', '$num_referencia', '$metodo_pago', '$monto_transferencia',
        '$comprobante_pago', '$fecha_actual')");

    if($query_pago == false){//Si ocurrió algún error al guardar los datos, se redirige a la página de "Compra":
      echo '
        <script>
          alert("Ha ocurrido un error al momento de almacenar los datos.");
          window.location = "Compra.php";
        </script>
      ';
    }else{//Si mo ocurrió algún error, se muestra un mensaje y se espera 0.5 sg para redirigir a "Compra.php":
      mysqli_close($conexion);
      echo '
        <script>
          alert("¡Gracias por su compra! Nos comunicaremos con usted al confirmar su pago");
        </script>
      ';
      echo
        '<script>
          setTimeout(() => {
            window.location = "Compra.php";
          }, 500);
        </script>';
    }

    /*
    $consulta = mysqli_query($conexion, "SELECT * FROM pedido WHERE
        id_cliente = '$id_cliente' AND fecha_pedido = '$fecha_actual' AND estado_pedido = 1");
    //Número de resultados:
    $result = mysqli_num_rows($consulta);
    //Si existen:
    if($result>0){
      while($data = mysqli_fetch_array($query)){

        $ID_pedido    = $data['id_pedido'];
        $ID_cliente   = $data['id_cliente'];
        $fecha_pedido = $data['fecha_pedido'];

        $query_add = mysqli_query($conexion, "INSERT INTO factura(id_cliente, id_pedido, fecha_factura)
          VALUES('$ID_cliente', '$ID_pedido', '$fecha_pedido')");

        if($query_add == false){
          echo '
            <script>
              alert("Ha ocurrido un error al momento de almacenar los datos.");
              window.location = "Compra.php";
            </script>
          ';
        }
      }
    }
    */
  }else{
    mysqli_close($conexion);//Cerrar conexión con la base de datos.
    header('Location: Compra.php');//Redirigir a la página de "Compra".
  }
 ?>
