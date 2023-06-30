
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>INICIO</title>
  <link rel="icon" href="View/Pagina/img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="View/Pagina/vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="View/Pagina/css/style.css">
  <script src="View/Pagina/js/facebookapi.js"></script>
</head>

<body class="bg-shape">
  <?php
  include 'View/header/headerPagina.php';
  ?>
  <!--================Hero Banner Area Start =================-->
  <section class="hero-banner magic-ball">
    <div class="container">

      <div class="row align-items-center text-center text-md-left">
        <div class="col-md-6 col-lg-5 mb-5 mb-md-0">
          <h1>Viajes de calidad con Business Travel</h1>
          <p>"Descubre un mundo de experiencias con Business Travel. Encuentra los destinos más fascinantes, los hoteles más exclusivos y las mejores ofertas para tus viajes de negocios. ¡Viaja con estilo y comodidad con nosotros!" </p>
          <a class="button button-hero mt-4" href="#">Ver las Ofertas</a>
        </div>
        <div class="col-md-6 col-lg-7 col-xl-6 offset-xl-1">
          <img class="img-fluid" src="View/Pagina/img/home/hero-img.png" alt="">
        </div>
      </div>
    </div>
  </section>
  <!--================Hero Banner Area End =================-->


  <!--================Service Area Start =================-->
  <section class="section-margin generic-margin">
    <div class="container">
      <div class="section-intro text-center pb-90px">
        <img class="section-intro-img" src="View/Pagina/img/home/section-icon.png" alt="">
        <h2>Nuestros servicios más populares</h2>
        <p>"Descubre nuestros servicios más populares. Ofrecemos una amplia selección de experiencias de viaje inolvidables que se adaptan a tus gustos y necesidades. Desde destinos exóticos hasta escapadas urbanas, encuentra los servicios más buscados y crea recuerdos inolvidables con nosotros."</p>
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="service-card text-center">
            <div class="service-card-img">
              <img class="img-fluid" src="View/Pagina/img/home/service1.png" alt="">
            </div>
            <div class="service-card-body">
              <br><br><br><br><br><br>
              <h3>Reserva de Hotel</h3>
              <p>¡Encuentra los mejores hoteles para tu próxima aventura aquí!
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="service-card text-center">
            <div class="service-card-img">
              <img class="img-fluid" src="View/Pagina/img/home/service2.png" alt="">
            </div>
            <div class="service-card-body">
              <br><br><br><br><br><br>
              <h3>Reserva de Vuelos</h3>
              <p>¡Descubre los vuelos perfectos para tu próxima aventura aquí!
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="service-card text-center">
            <div class="service-card-img">
              <img class="img-fluid" src="View/Pagina/img/home/service3.png" alt="">
            </div>
            <div class="service-card-body">
              <br><br><br><br><br><br><br>
              <h3>Reserva en Destino</h3>
              <p>"Reserva tu destino soñado con nosotros".
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================Service Area End =================-->
  <!--================About Area Start =================-->
  <section class="bg-gray section-padding magic-ball magic-ball-about">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-6">
          <div class="about-img">
            <img class="img-fluid" src="View/Pagina/img/home/regalos-para-viajeros.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-5 col-md-6 align-self-center about-content">
          <h2>Explora la belleza <br class="d-none d-xl-block"> infinita de <br class="d-none d-xl-block"> of the
            nuestro Perú</h2>
          <p>Explora los destinos más emblemáticos del Perú. Desde la enigmática ciudad de Machu Picchu hasta la majestuosidad de la ciudad blanca de Arequipa, pasando por la misteriosa belleza de la ciudad de Cusco y la vibrante metrópolis de Lima. Sumérgete en la cultura, historia y naturaleza de destinos como el Cañón del Colca, el Lago Titicaca, la Amazonía peruana y las líneas de Nazca. Con nuestros paquetes turísticos, podrás descubrir la diversidad y riqueza de todo nuestro hermoso Perú."</p>

        </div>
      </div>
    </div>
  </section>
  <!--================About Area End =================-->
  <!--================Blog section Start =================-->
  <section class="section-padding bg-gray">
    <div class="container">
      <div class="section-intro text-center pb-90px">
        <img class="section-intro-img" src="View/Pagina/img/home/section-icon.png" alt="">
        <h2>NUESTRAS ULTIMAS PUBLICACIONES EN FACEBOOK</h2>
      </div>
      <div id="card-container" class="row"></div>

  </section>
  
  <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  chat-icon="https:&#x2F;&#x2F;encrypted-tbn0.gstatic.com&#x2F;images?q=tbn:ANd9GcSfh5kDV55gRWX1BkTRE-4ebyditNq2kd1Izw&ampusqp=CAU"
  intent="WELCOME"
  chat-title="businesstravelagency"
  agent-id="de6a8fd6-d0e8-4ff7-810e-2b5c4112a2f5"
  language-code="es"
></df-messenger>

  
  <?php
  include 'View/header/footerPagina.php';
  ?>

</body>

</html>