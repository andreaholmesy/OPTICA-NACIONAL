<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>NOSOTROS</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <header>

       <input type="checkbox" name="" id="toggler">
       <label for="toggler" class="fas fa-bars"></label>

       <a href="index.html" class="logo">
         <img src="img/logo.jpeg" alt="logo de la compañía" class="logo-img"></a>

         <a href="index.html" class="title">Optica Nacional</a>

         <nav class="navbar">
            <a href="index.html">Home</a>
            <a href="Nosotros.php">Nosotros</a>
            <a href="agendar.php">Agenda una cita</a>
            <a href="Productos.php" >Productos</a>
         </nav>

   </header>

   <!-- header section ends -->

   <!-- about section starts  -->

   <section class="about">

      <div class="heading" style="margin-top: 10rem;">

         <h3>NOSOTROS</h3>

      </div>

      <div class="row">

         <div class="video-container">
            <video src="img/video 2.MP4" loop autoplay muted></video>
            <h3>Salud Visual</h3>
         </div>


         <div class="content">
            <h3>¿Por qué elegirnos?</h3>
            <p>Contamos los equipos especializados para realizar un diagnóstico integral de la salud visual de nuestros
               clientes. Tras la formulación de los lentes podrán elegir modelos ligeros, cómodos y versátiles para no
               renunciar a la moda.
               Puedes realizar el examen de visión en cualquiera de nuestras tiendas.</p>


            <div class="icons-container">


               <div class="icons">
                  <a href="Productos.php"> <i class="fas fa-hand-holding-usd"></i></a>
                  <span> Precios accesibles</span>
               </div>

               <div class="icons">
                  <a href="https://web.whatsapp.com/"> <i class="fas fa-headset"></i></a>
                  <span> Atención 24 horas </span>
               </div>

               <div class="icons">
                  <a href="#map"> <i class="fas fa-map"></i></a>
                  <span> Encuentranos</span>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- about section ends  -->

   <!-- Objetivos section starts  -->

   <section class="objetivos">

      <div class="row">

            <h3>Misión</h3>
            <p>Somos la familia Optica Nacional,
               apasionados con la excelencia y la innovación,
               comprometidos con nuestros clientes y
               su calidad visual</p>

            <h3>Visión</h3>
            <p>Superar las expectativas de nuestros clientes,
               sustentados en la innovación de la Familia Optica
               Nacional, para profundizar el liderazgo en Venezuela
               y consolidarnos en Centroamérica y el Caribe</p>

            <h3>Valores</h3>
            <p>Mejorar tu visión, Trabajo en equipo, Creatividad,
             Honestidad, Eficacia</p>

      </div>

   </section>

   <!-- Objetivos section ends -->

   <!-- reviews section starts  -->

   <section class="reviews" id="reviews">

      <div class="heading">

         <h3>Clientes</h3>

      </div>

      <div class="swiper reviews-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide">
               <img src="img/imagen 8.jpg" alt="">
               <h3>Juan Medina</h3>
               <p>“Un trato exquisito y con gran profesionalidad, gastando el tiempo necesario para responder y aconsejar en todo el proceso de revisión y elección de las gafas”.</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>


            <div class="swiper-slide slide">
               <img src="img/imagen 9.jpg" alt="">
               <h3>Laura Mencia</h3>
               <p>“En cada paso durante el proceso de revisión de mi graduación el personal especializado no escatimó tiempo en explicarme cada prueba que se me realizaba y durante la elección de las gafas tuve una gran variedad de modelos y marcas donde elegir”.</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>

            <div class="swiper-slide slide">
               <img src="img/imagen 10.jpg" alt="">
               <h3>María Rodriguez</h3>
               <p>“Me pareció inmejorable. Trato profesional, atento y cercano. Estoy muy contenta con la atención, con el trato y con el resultado final porque es justo lo que yo tenía en mente".</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>

            <div class="swiper-slide slide">
               <img src="img/imagen 11.jpg" alt="">
               <h3>Marcos Vera</h3>
               <p>"El trato fue perfecto. Atención personalizada adaptándose a mi horario y haciéndome sentir cómodo en todo momento."</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>

         </div>

      </div>

   </section>

   <!-- reviews section ends -->

   <!-- contacto section starts -->
   <section class="contact">

      <div class="row">

         <form action="contactanos.php" method="post">

            <h3>Contactanos</h3>
            <div class="inputBox">
               <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre " class="box"  required>
               <input type="email" id="email" name="email" placeholder="Ingresa tu email" class="box" required>
            </div>

            <div class="inputBox">
               <input type="text" id="numero" name="numero" placeholder="Ingresa tu número" class="box" required>
               <input type="text" id="asunto" name="asunto" placeholder="Ingresa el asunto" class="box" required>
            </div>

            <textarea id="mensaje" name="mensaje" placeholder="Tu mensaje" cols="30" rows="10"></textarea>
            <input type="submit"   value="Enviar Mensaje" class="btn" required>
         </form>

         <iframe id="map" class="map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3926.791525725582!2d-71.31554418501523!3d10.197578392715878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e89d10afd2f19a1%3A0x7168d5f65202e116!2sOptica%20Nacional!5e0!3m2!1ses-419!2sve!4v1679877832854!5m2!1ses-419!2sve"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>

      </div>

   </section>


   <!-- contacto section ends -->

   <!-- footer section starts  -->

   <section class="footer">

      <div class="box-container">

          <div class="box">
              <h3>Secciones</h3>
              <a href="index.html"> <i class="fas fa-angle-right"></i> Home</a>
              <a href="Nosotros.php"> <i class="fas fa-angle-right"></i> Nosotros</a>
              <a href="Productos.php"> <i class="fas fa-angle-right"></i>Productos</a>
              <a href="agendar.php"> <i class="fas fa-angle-right"></i>Agenda una cita</a>
          </div>


          <div class="box">
              <h3>Información de Contacto</h3>
              <a href="https://web.whatsapp.com/"> <i class="fas fa-phone"></i> +58-4146826532 </a>
              <a href="https://web.whatsapp.com/"> <i class="fas fa-phone"></i> +58-4246144257 </a>
              <a href="https://www.google.com/intl/es-419/gmail/about/"> <i class="fas fa-envelope"></i>
                  opticanacional@gmail.com </a>
              <a href="https://goo.gl/maps/6FdYkubsmYvhNF6P7"> <i class="fas fa-map"></i> Av. Bolivar, Cd Ojeda 4019,
                  Zulia </a>
          </div>

          <div class="box">
              <h3>Siguenos</h3>
              <a href="https://www.facebook.com/people/Optica-Nacional/100069703874006/"> <i
                      class="fab fa-facebook-f"></i> Facebook </a>
              <a href="https://twitter.com/opticanacional?lang=es"> <i class="fab fa-twitter"></i> Twitter </a>
              <a href="https://www.instagram.com/tuopticanacional/?hl=es"> <i class="fab fa-instagram"></i> Instagram
              </a>
              <a href="https://drive.google.com/file/d/1UWjx0A3FXCzkuyPreJW3fIFxvMFPD1M8/view?usp=sharing"> <i
                        class="fab fa-android"></i> ¡Descarga nuestra APP! </a>
          </div>

      </div>

      <div class="credit"> Creado por <span>Partidas y Reyes</span> | Todos los derechos reservados</div>

  </section>

   <!-- footer section ends -->







   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

   <!-- custom js file link -->
   <script src="js/script.js"></script>
   
<?php
include("contactanos.php");
?>

</body>

</html>