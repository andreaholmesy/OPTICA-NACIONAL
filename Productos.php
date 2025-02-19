<?php
  session_start(); //Comenzar una sesión.

  if(!empty($_SESSION['active'])){
    header('location: Compra.php');
  }else{
    if(!empty($_POST)){
      require_once "DB_conexion.php";
      //Datos del cliente enviados por el formulario de login:
      $cédula_login = mysqli_real_escape_string($conexion, $_POST['cédulaLogin']);
      $clave_login  = mysqli_real_escape_string($conexion, $_POST['contraseñaLogin']);

      //Recuperar datos del cliente:
      $consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE cédula_cliente = '$cédula_login'");
      //Cerrar conexión con la base de datos:
      mysqli_close($conexion);
      //Número de resultados:
      $consulta_result = mysqli_num_rows($consulta);

      //Si existen resultados, se guardan los datos de sesión y se redirige a la página de compras.
      if($consulta_result > 0){
        $datos = mysqli_fetch_array($consulta);

        if(password_verify($clave_login, $datos['clave_cliente'])){//Verificar la contraseña encriptada.
          $_SESSION['active'] = true;
          $_SESSION['id_cliente'] = $datos['id_cliente'];
          $_SESSION['cédula_cliente'] = $datos['cédula_cliente'];
          $_SESSION['nombre_cliente'] = $datos['nombre_cliente'];
          $_SESSION['teléfono_cliente'] = $datos['teléfono_cliente'];
          $_SESSION['correo_cliente'] = $datos['correo_cliente'];
          $_SESSION['dirección_cliente'] = $datos['dirección_cliente'];

          header('location: Compra.php');
        }else{//Si la contraseña es incorrecta, se muestra un mensaje de error:
          echo '
            <script>
              alert("La contraseña ingresada es incorrecta.");
            </script>
          ';
          session_destroy();//Destruir/cerrar la sesión.
        }
      }else{//Si no existe ningún registro, se muestra un mensaje de error:
        echo '
          <script>
            alert("Cliente no encontrado. Por favor, realice el registro.");
          </script>
        ';
        session_destroy();//Destruir/cerrar la sesión.
      }
    }
  }
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
      integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Productos</title>
</head>

<body>

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
                <a class="fas fa-user usuario" id="usuario"></a>
            </nav>
        </nav>
    </header>

    <!-- Formulario: Login. -->
    <form class="form-login" id="form-login" method="post">
      <!-- Cédula. -->
      <label for="cédulaLogin">Cédula: </label>
      <input type="text" required name="cédulaLogin" id="cédulaLogin" class="form-inputs input-login"
      maxlength="10">
      <!-- Contraseña. -->
      <label for="contraseñaLogin">Contraseña: </label>
      <input type="password" required name="contraseñaLogin" id="contraseñaLogin" class="form-inputs input-login">
      <!-- Botón. -->
      <input type="submit" name="btnIngresar" id="btnIngresar" value="Ingresar">
    </form>

    <!-- Información. -->
    <div class="informacion" id="informacion">
      <div class="cerrar" id="cerrar-informacion">
        <img class="imgCerrar" id="imgCerrarInfo" src="img/cerrar.png" alt="cerrar" style="visibility: hidden;">
        
      </div>
      <p id="p-informacion">
        Si eres un cliente registrado, da click al ícono de usuario que se muestra en el menú.
        En caso de ser un nuevo cliente, <b>¡regístrate dando click al botón!</b>
      </p>
      <span class="btn-registrarCliente" id="btn-registrarCliente">Registrarse</span>
    </div>

    <!-- Formulario: Registrar cliente. -->
    <form class="form-comprar" id="form-comprar" action="registro.php" method="post">
      <div class="cerrar" id="cerrar">
        <img class="imgCerrar" id="imgCerrarForm" src="img/cerrar.png" alt="cerrar">
      </div>
      <!--<h2>Para comprar un artículo regístrate o ingresa como cliente: </h2> -->
      <!-- Cédula. -->
      <label for="cédula">Cédula: </label>
      <input type="text" required name="cédula" id="cédula" class="form-inputs"
      maxlength="10">
      <!-- Nombre. -->
      <label for="nombre">Nombre: </label>
      <input type="text" required name="nombre" id="nombre" class="form-inputs">
      <!-- Teléfono. -->
      <label for="teléfono">Teléfono: </label>
      <input type="text" name="teléfono" id="teléfono" class="form-inputs">
      <!-- Correo. -->
      <label for="correo">Correo: </label>
      <input type="email" required name="correo" id="correo" class="form-inputs">
      <!-- Dirección. -->
      <label for="dirección">Dirección: </label>
      <input type="text" name="dirección" id="dirección" class="form-inputs">
      <!-- Contraseña. -->
      <label for="contraseña">Contraseña: </label>
      <input type="password" required name="contraseña" id="contraseña" class="form-inputs">
      <!-- Botón. -->
      <input type="submit" name="btnComprar" id="btnComprar" value="Enviar">
    </form>

    <main>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 my-4 mx-auto text-center">
            <h1 class="display-4 mt-4">Lista de Productos</h1>
            <p class="lead">Selecciona uno de nuestros Productos para agregarlos al carrito</p>
        </div>

        <div class="container" id="lista-Productos">

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Carolina Herrera</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/catalogo 1.png" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">$ <span class="">195.00</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Ancho del Lente: 51 mm</li>
                            <li>Puente: 16 mm</li>
                            <li>Longitud: 140 mm</li>
                        </ul>

                        <span class="btn btn-block btn-primary agregar-carrito">Comprar</span>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Gucci </h4>
                    </div>
                    <div class="card-body">
                        <img src="img/catalogo 2.png" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">$ <span class="">100.00</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Ancho del Lente: 45 mm</li>
                            <li>Puente: 18 mm</li>
                            <li>Longitud: 135 mm</li>
                        </ul>
                        <span class="btn btn-block btn-primary agregar-carrito">Comprar</span>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Puma</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/catalogo 3.png" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">$ <span class="">150.00</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Ancho del Lente: 60 mm</li>
                            <li>Puente: 20 mm</li>
                            <li>Longitud: 150 mm</li>
                        </ul>
                        <span class="btn btn-block btn-primary agregar-carrito" data-id="3">Comprar</span>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Anna Hickman</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/catalogo 4.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">$<span class="">240.00</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Ancho del Lente: 25 mm</li>
                            <li>Puente: 12 mm</li>
                            <li>Longitud: 120 mm</li>
                        </ul>
                        <a href="#" class="btn btn-block btn-primary agregar-carrito" data-id="4">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Cartier</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/catalogo 5.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">$<span class="">369.00</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Ancho del Lente: 25 mm</li>
                            <li>Puente: 12 mm</li>
                            <li>Longitud: 120 mm</li>
                        </ul>
                        <a href="#" class="btn btn-block btn-primary agregar-carrito" data-id="5">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Guess</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/catalogo 6.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">$ <span class="">259.00</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Ancho del Lente: 28 mm</li>
                            <li>Puente: 18 mm</li>
                            <li>Longitud: 140 mm</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="6">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Tommy Hilfiger</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/catalogo 7.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">$ <span class="">140.00</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Ancho del Lente: 24 mm</li>
                            <li>Puente: 16 mm</li>
                            <li>Longitud: 145 mm</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="7">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Rayban</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/catalogo 9.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">$ <span class="">120.00</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Ancho del Lente: 27 mm</li>
                            <li>Puente: 19 mm</li>
                            <li>Longitud: 130 mm</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="8">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Flyway</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/catalogo 10.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">$ <span class="">287.00</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Ancho del Lente: 25 mm</li>
                            <li>Puente: 13 mm</li>
                            <li>Longitud: 140 mm</li>
                        </ul>
                        <span class="btn btn-block btn-primary agregar-carrito" data-id="9">Comprar</span>
                    </div>
                </div>

            </div>


        </div>
    </main>

    <script src="assets/prueba.js"></script>

</body>
</html>
