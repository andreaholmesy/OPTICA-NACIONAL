<?php
include "DB_conexion.php";
    if(!empty($_POST)){
      if(!empty($_POST['cita_adulto'])){
        $cita_adulto = mysqli_real_escape_string($conexion, $_POST['cita_adulto']);
       }else{$cita_adulto= "No";
      }
       if(!empty($_POST['cita_niños'])){
        $cita_niños = mysqli_real_escape_string($conexion, $_POST['cita_niños']);
       }else{$cita_niños= "No";
       }

    $fecha_hora       = mysqli_real_escape_string($conexion, $_POST['fecha_hora']);
    $nombre_cliente   = mysqli_real_escape_string($conexion, $_POST['nombre_cliente']);
    $apellido_cliente = mysqli_real_escape_string($conexion, $_POST['apellido_cliente']);
    $telefono_cliente = mysqli_real_escape_string($conexion, $_POST['telefono_cliente']);
    $info_personal    = mysqli_real_escape_string($conexion, $_POST['info_personal']);

      $query_insert = mysqli_query($conexion, "INSERT INTO agendarcita(cita_adulto, cita_niños, fecha_hora,
      nombre_cliente, apellido_cliente, telefono_cliente, info_personal) 
      VALUES('$cita_adulto', '$cita_niños', '$fecha_hora', '$nombre_cliente',
      '$apellido_cliente', '$telefono_cliente', '$info_personal')");

    if($query_insert == false){
          echo "Error";
      }else{//Si mo ocurrió algún error, se muestra un mensaje y se espera 0.5 sg para redirigir a "agendar.php":
        mysqli_close($conexion);
        echo '
          <script>
            alert("Cita agendada!");
          </script>
        ';
        echo
          '<script>
            setTimeout(() => {
              window.location = "agendar.php";
            }, 500);
          </script>';
      }
  
    }
      
?>