<?php
  session_start(); // Iniciar sesión.
  include "DB_conexion.php"; // Conexión con la base de datos.

  if (!empty($_POST)) { // Si no está vacío el POST [...]:
    //[...] Se guardan en las siguientes variables los datos enviados por el formulario:
    $id_cliente = $_SESSION['id_cliente'];
    $num_referencia = isset($_POST['num_referencia']) ? $_POST['num_referencia'] : '';
    $metodo_pago = isset($_POST['método_pago']) ? $_POST['método_pago'] : '';
    $monto_transferencia = isset($_POST['monto_transferencia']) ? $_POST['monto_transferencia'] : '';
    $fecha_actual = isset($_POST['fecha_transferencia']) ? $_POST['fecha_transferencia'] : '';
    

    // Verificar si se ha cargado un archivo
    if (isset($_FILES['comprobante']) && $_FILES['comprobante']['error'] == 0) {
        // Verificar que el archivo se haya subido correctamente
        $comprobante_pago = addslashes(file_get_contents($_FILES['comprobante']['tmp_name']));
    } else {
        // Si no se cargó un archivo, enviar un mensaje de error y redirigir
        echo '
            <script>
              alert("Por favor, cargue un archivo de comprobante de pago.");
              window.location = "Compra.php";
            </script>
        ';
        exit; // Detener la ejecución del script
    }

    // Guardar datos de la transferencia en la base de datos:
    $query_pago = mysqli_query($conexion, "INSERT INTO transferencia(id_cliente, num_referencia, método_pago,
        monto_transferencia, comprobante_pago, fecha_transferencia)
      VALUES('$id_cliente', '$num_referencia', '$metodo_pago', '$monto_transferencia',
        '$comprobante_pago', '$fecha_actual')");

    if ($query_pago == false) { // Si ocurrió algún error al guardar los datos, se redirige a la página de "Compra":
      echo '
        <script>
          alert("Ha ocurrido un error al momento de almacenar los datos.");
          window.location = "Compra.php";
        </script>
      ';
    } else { // Si no ocurrió ningún error, se muestra un mensaje y se espera 0.5 sg para redirigir a "Compra.php":
      mysqli_close($conexion);
      echo '
        <script>
          alert("¡Gracias por su compra! Nos comunicaremos con usted al confirmar su pago");
        </script>
      ';
      echo '
        <script>
          setTimeout(() => {
            window.location = "Compra.php";
          }, 500);
        </script>
      ';
    }
  } else {
    mysqli_close($conexion); // Cerrar conexión con la base de datos.
    header('Location: Compra.php'); // Redirigir a la página de "Compra".
  }
?>
