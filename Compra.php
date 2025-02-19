<?php
  session_start();//Iniciar sesión.
  include "DB_conexion.php"; //Conexión a la base de datos.
  //Función que establece la zona horaria predeterminada utilizada por todas las funciones de fecha/hora:
  date_default_timezone_set('America/Caracas');

  $id_cliente = $_SESSION['id_cliente'];//Variable para almacenar el ID del cliente en sesión.
  $fecha_actual = date("Y-m-d");//Función para guardar la fecha actual.

  if(!empty($_POST)){
    $id_producto = $_POST['ID_producto'];//Variable para almacenar el ID del producto.

    //Seleccionar aquellos pedidos donde la variable "id_producto" corresponda con el ID del producto almacenado en la base de datos, [...]
    //[...] la fecha del pedido corresponda a la fecha en curso, y el ID del cliente corresponda con el cliente en sesión:
    $query = mysqli_query($conexion, "SELECT * FROM pedido WHERE id_producto = '$id_producto' AND fecha_pedido = '$fecha_actual'
      AND id_cliente = '$id_cliente'");
    $result = mysqli_fetch_array($query);

    //Si no hay registro, se agrega el producto al carrito:
    if($result == 0){
      $query_insert = mysqli_query($conexion, "INSERT INTO pedido(id_cliente, id_producto, fecha_pedido)
        VALUES('$id_cliente', '$id_producto', '$fecha_actual')");

      //Si falla al guardarse, se muestra un mensaje de error:
      if($query_insert == false){
        echo '
          <script>
            alert("Error al guardar el pedido.");
          </script>
        ';
        exit();
      }
    }else{//Si ya está registrado el pedido:
      //Opción 1: Pedido eliminado previamente, se actualiza su estado a 1:
      $consulta = mysqli_query($conexion, "SELECT * FROM pedido
        WHERE id_producto = '$id_producto' AND fecha_pedido = '$fecha_actual'
              AND id_cliente = '$id_cliente' AND estado_pedido = 0");

        //Número de resultados:
        $consulta_result = mysqli_num_rows($consulta);

      //Si existe el registro con esas características:
      if($consulta_result > 0){
        $query_add = mysqli_query($conexion, "UPDATE pedido SET estado_pedido = 1
          WHERE id_producto = '$id_producto' AND id_cliente = '$id_cliente' AND fecha_pedido = '$fecha_actual'");
      }else{
      //Opción 2: Pedido ya registrado, se muestra un mensaje de error:
      echo '
        <script>
          alert("Ya está agregado.");
        </script>
      ';
      }
    }
  }
 ?>

 <!DOCTYPE html>
 <html lang="es">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <script src="js/popper.min.js"></script>

     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
         integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

     <link rel="stylesheet" href="css/sweetalert2.min.css">

     <link rel="stylesheet" href="css/style.css">
     <title>Productos</title>
     <style type="text/css">
      .total{
        pointer-events: none;
      }
     </style>
 </head>

 <body>
   <?php
      include "PHP/sesion_activa.php"; //Sesión activa.
   ?>
     <header>
         <input type="checkbox" name="" id="toggler">
         <label for="toggler" class="fas fa-bars"></label>

         <a href="index.html" class="logo">
             <img src="img/logo.jpeg" alt="logo de la compañía" class="logo-img"></a>

         <a href="index.html" style="text-decoration: none;" class="title">Optica Nacional</a>

         <nav class="navbar navbar-expand-md navbar-dark">

             <nav class="nav-item dropdown">

                 <a href="index.html">Home</a>
                 <a href="Nosotros.php">Nosotros</a>
                 <a href="agendar.php">Agenda una cita</a>

                 <a class="fas fa-shopping-cart" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false"></a>

                 <div id="carrito" class="dropdown-menu" aria-labelledby="navbarCollapse">
                     <table id="lista-carrito" class="table">
                         <thead>
                            <tr>
                              <th>Nombre</th>
                              <th>Precio</th>
                              <th>Estado</th>
                            </tr>
                         </thead>
                         <tbody>
                          <?php
                            $total = 0; //Variable para almacenar el precio total de los productos en el carrito.
                            //Seleccionar todos los pedidos cuyo estado sea "1", su fecha corresponda a la fecha actual...
                            //y el cliente corresponda con el cliente en sesión:
                            $query = mysqli_query($conexion, "SELECT p.id_producto, p.marca_producto, p.precio_producto,
                               e.id_producto, e.id_cliente FROM producto p INNER JOIN pedido e ON p.id_producto = e.id_producto
                               WHERE estado_pedido = 1 AND fecha_pedido = '$fecha_actual' AND e.id_cliente = '$id_cliente'
                               ORDER BY id_pedido ASC");
                            $result = mysqli_num_rows($query);
                            if($result>0){//Se confirma si existen registros:
                              while($data = mysqli_fetch_array($query)){
                                $total = $total + $data["precio_producto"];
                           ?>
                           <tr>
                             <td><?php echo $data["marca_producto"]?></td>
                             <td><?php echo number_format($data["precio_producto"], 2)?></td>
                             <td> <a href="eliminar-producto.php?id=<?php echo $data["id_producto"]?>&date=<?php echo $fecha_actual?>"
                               class="eliminar-producto">Eliminar</a> </td>
                           </tr>
                           <?php
                              }
                            }
                            ?>
                         </tbody>
                     </table>

                     <span class="btn btn-block total">Total: $ <?php echo $total?></span>
                     <span id="procesar-pedido" class="btn btn-block procesar-pedido">Procesar Productos</span>
                 </div>
             </nav>
         </nav>
         </div>
         </nav>
         <a href="PHP/sesion_cerrar.php">Salir</a>
     </header>

     <!-- Ventana de información para realizar la transferencia.  -->
     <div class="info-transferencia" id="info-transferencia">
       <!-- Botón para cerrar. -->
       <div class="cerrar" id="CerrarInfo-TR">
         <img class="imgCerrar" id="imgCerrarInfo-TR" src="img/cerrar.png" alt="cerrar">
       </div>
       <!-- Información para realizar el pago: -->
       <p>
       <span id="titulo-info-TR">Datos bancarios para realizar el pago de los productos:</span><br><br>
        <b>Pago móvil:</b><br>
         0412 162 8017<br>
         J-070072016 <br>
         Banco: MERCANTIL<br><br>

         <b>Transferencia:</b><br>
         Cuenta: 0102-0392-91-0009180358 <br>
         Titular: Optica Nacional<br>
         Banco: VENEZUELA<br><br>

         <b>Zelle:</b><br>
         Correo: piedadbv57@gmail.com<br>
         Titular: Piedad de Bermudez<br>
       </p>


       <span class="BtnPago" id="BtnPago">Registrar pago</span>
     </div>

     <!-- Formulario para registrar la transferencia.  -->
     <form class="form-transferencia" id="form-transferencia"
        action="transferencia.php" method="post" enctype="multipart/form-data">
       <!-- Botón para cerrar. -->
       <div class="cerrar" id="CerrarForm-TR">
         <img class="imgCerrar" id="imgCerrarForm-TR" src="img/cerrar.png" alt="cerrar">
       </div>
       <!-- Número de referencia. -->
       <label for="num-referencia" class="label-TR">Número de referencia: </label>
       <input required type="text" name="num-referencia" class="form-inputs" id="num-referencia">
       <!-- Método de pago. -->
       <label for="metodo-pago" class="label-TR">Método de pago: </label>
       <select required name="metodo-pago" id="metodo-pago">
         <option value="pago-movil">Pago móvil.</option>
         <option value="transferencia">Transferencia.</option>
         <option value="zelle">Zelle.</option>
       </select>
       <!-- Monto de la transferencia. -->
       <label for="monto-transferencia" class="label-TR">Monto transferido: </label>
       <input required type="text" name="monto-transferencia" class="form-inputs" id="monto-transferencia">
       <!-- Comprobante de pago. -->
       <span>Comprobante de pago: </span>
       <input type="file" name="comprobante">
       <!-- Fecha. -->
       <input type="hidden" name="fecha-transferencia" value="<?php echo $fecha_actual ?>">
       <!-- Botón. -->
       <input type="submit" name="BtnTransferencia" value="ENVIAR" class="BtnTransferencia" id="BtnTransferencia">
     </form>

     <!-- Catálogo.  -->
     <main>
         <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 my-4 mx-auto text-center">
             <h1 class="display-4 mt-4">Lista de Productos</h1>
             <p class="lead">Selecciona uno de nuestros Productos para agregarlos al carrito</p>
         </div>
         <div class="container" id="lista-Productos">

             <div class="card-deck mb-3 text-center">
               <?php
                $query = mysqli_query($conexion, "SELECT * FROM producto
                  WHERE estado_producto = 1
                  ORDER BY id_producto ASC LIMIT 0, 3");
                $result = mysqli_num_rows($query);
               if($result>0){
                 while($data = mysqli_fetch_array($query)){
               ?>
                 <div class="card mb-4 shadow-sm">
                     <div class="card-header">
                          <!-- Marca  -->
                         <h4 class="my-0 font-weight-bold"><?php echo $data['marca_producto']?></h4>
                     </div>
                     <div class="card-body">
                         <img src="<?php echo $data['imagen_producto']?>" class="card-img-top">
                         <!-- Precio  -->
                         <h1 class="card-title pricing-card-title precio">$ <?php echo number_format($data['precio_producto'], 2)?></h1>

                         <ul class="list-unstyled mt-3 mb-4">
                             <li></li>
                             <!-- Ancho  -->
                             <li>Ancho del lente: <?php echo $data['ancho_lente']?></li>
                             <!-- Puente  -->
                             <li>Puente: <?php echo $data['puente_lente']?></li>
                             <!-- Longitud  -->
                             <li>Longitud: <?php echo $data['longitud_lente']?></li>
                         </ul>

                         <!-- Botón  -->
                         <form class="form-agregarCarrito" method="post">
                           <input type="hidden" name="ID_producto" value="<?php echo $data['id_producto']?>">
                           <input type="submit" name="BtnAgregar" class="btn btn-block btn-primary" value="Agregar al carrito">
                         </form>
                     </div>
                 </div>
               <?php
                    }
                  }
                ?>
             </div>

             <div class="card-deck mb-3 text-center">
               <?php
                $query = mysqli_query($conexion, "SELECT * FROM producto
                  WHERE estado_producto = 1
                  ORDER BY id_producto ASC LIMIT 3, 3");
                $result = mysqli_num_rows($query);
               if($result>0){
                 while($data = mysqli_fetch_array($query)){
               ?>
                 <div class="card mb-4 shadow-sm">
                     <div class="card-header">
                          <!-- Marca  -->
                         <h4 class="my-0 font-weight-bold"><?php echo $data['marca_producto']?></h4>
                     </div>
                     <div class="card-body">
                         <img src="<?php echo $data['imagen_producto']?>" class="card-img-top">
                         <!-- Precio  -->
                         <h1 class="card-title pricing-card-title precio">$ <?php echo number_format($data['precio_producto'], 2)?></h1>

                         <ul class="list-unstyled mt-3 mb-4">
                             <li></li>
                             <!-- Ancho  -->
                             <li>Ancho del lente: <?php echo $data['ancho_lente']?></li>
                             <!-- Puente  -->
                             <li>Puente: <?php echo $data['puente_lente']?></li>
                             <!-- Longitud  -->
                             <li>Longitud: <?php echo $data['longitud_lente']?></li>
                         </ul>

                         <!-- Botón  -->
                         <form class="form-agregarCarrito" method="post">
                           <input type="hidden" name="ID_producto" value="<?php echo $data['id_producto']?>">
                           <input type="submit" name="BtnAgregar" class="btn btn-block btn-primary" value="Agregar al carrito">
                         </form>
                     </div>
                 </div>
               <?php
                    }
                  }
                ?>
             </div>

             <div class="card-deck mb-3 text-center">
               <?php
                  $query = mysqli_query($conexion, "SELECT * FROM producto
                    WHERE estado_producto = 1
                    ORDER BY id_producto ASC LIMIT 6, 3");
                  $result = mysqli_num_rows($query);
                  if($result>0){
                    while($data = mysqli_fetch_array($query)){
               ?>
                 <div class="card mb-4 shadow-sm">
                     <div class="card-header">
                          <!-- Marca  -->
                         <h4 class="my-0 font-weight-bold"><?php echo $data['marca_producto']?></h4>
                     </div>
                     <div class="card-body">
                         <img src="<?php echo $data['imagen_producto']?>" class="card-img-top">
                         <!-- Precio  -->
                         <h1 class="card-title pricing-card-title precio">$ <?php echo number_format($data['precio_producto'], 2)?></h1>

                         <ul class="list-unstyled mt-3 mb-4">
                             <li></li>
                             <!-- Ancho  -->
                             <li>Ancho del lente: <?php echo $data['ancho_lente']?></li>
                             <!-- Puente  -->
                             <li>Puente: <?php echo $data['puente_lente']?></li>
                             <!-- Longitud  -->
                             <li>Longitud: <?php echo $data['longitud_lente']?></li>
                         </ul>

                         <!-- Botón  -->
                         <form class="form-agregarCarrito" method="post">
                           <input type="hidden" name="ID_producto" value="<?php echo $data['id_producto']?>">
                           <input type="submit" name="BtnAgregar" class="btn btn-block btn-primary" value="Agregar al carrito">
                         </form>
                     </div>
                 </div>
               <?php
                    }
                  }
                ?>
             </div>

         </div>
     </main>

     <script src="js/jquery-3.4.1.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/sweetalert2.min.js"></script>
     <script src="assets/transferencia.js"></script>

 </body>
 </html>
