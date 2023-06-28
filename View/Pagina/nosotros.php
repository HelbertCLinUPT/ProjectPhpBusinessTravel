<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Nosotros</title>
  <link rel="icon" href="View/Pagina/img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="View/Pagina/vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="View/Pagina/vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="View/Pagina/css/style.css">
</head>

<body>

  <?php
  include 'View/header/headerPagina.php';
  ?>

<style>
  .carousel-item img {
    width: 70%; /* Tamaño de las imágenes, ajusta según tus necesidades */
    height: 20%;
    margin: 0 auto; /* Centrar horizontalmente las imágenes */
  }
</style>
<br><br><br>
<div class="mt-5"></div> <!-- Espacio utilizando clase de margen superior mt-4 -->
<div class="section-intro text-center pb-30px my-xl-3">
  <h2>Nuestras aventuras</h2>
</div>
<section class="carrusel">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="View/Pagina/img/banner/nosotros2.jpg" class="d-block" alt="Imagen 2">
      </div>
      <div class="carousel-item">
        <img src="View/Pagina/img/banner/nosotros4.jpg" class="d-block" alt="Imagen 4">
      </div>
      <div class="carousel-item">
        <img src="View/Pagina/img/banner/nosotros5.jpg" class="d-block" alt="Imagen 5">
      </div>
      <div class="carousel-item">
        <img src="View/Pagina/img/banner/nosotros6.jpg" class="d-block" alt="Imagen 6">
      </div>
      <div class="carousel-item">
        <img src="View/Pagina/img/banner/nosotros7.jpg" class="d-block" alt="Imagen 7">
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>



<section class="nosotros">
  <div class="container">
    <div style="margin-left: 50px;"  class="row">
      <div class="col-md-6">
        <img src="View/Pagina/img/banner/nosotros.jpg" alt="Imagen Business Travel">
        
      </div>
      <div class="col-md-6">
      <p>Somos Business Travel, una empresa apasionada por brindar experiencias de viaje excepcionales. Nos dedicamos a diseñar y ofrecer los mejores paquetes turísticos, con el objetivo de hacer realidad los sueños de nuestros clientes. Con años de experiencia en la industria, nos enorgullece contar con un equipo de profesionales dedicados y comprometidos en brindar un servicio de calidad. Nos esforzamos por superar las expectativas, ofreciendo destinos fascinantes, atención personalizada y un enfoque en la satisfacción del cliente. Ya sea que desees explorar destinos históricos, disfrutar de hermosas playas o sumergirte en la naturaleza, en Business Travel nos ocupamos de cada detalle para que tu experiencia de viaje sea inolvidable. Confía en nosotros para planificar tus próximas aventuras y descubre el mundo de posibilidades que tenemos para ofrecerte.</p>
      </div>
    </div>
  </div>
</section>




 
  <!--================Search Package section End =================-->


  <?php
   include 'View/header/footerPagina.php';
   ?>
</body>
</html>