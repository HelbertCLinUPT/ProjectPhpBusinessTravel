<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Paquetes</title>
  <link rel="icon" href="View/Pagina/img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="View/Pagina/vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="View/Pagina/vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="View/Pagina/vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="View/Pagina/vendors/linericon/style.css">
  <link rel="stylesheet" href="View/Pagina/vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="View/Pagina/vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="View/Pagina/css/magnific-popup.css">
  <link rel="stylesheet" href="View/Pagina/vendors/flat-icon/font/flaticon.css">
  <link rel="stylesheet" href="View/Pagina/vendors/nice-select/nice-select.css">

  <link rel="stylesheet" href="View/Pagina/css/style.css">
</head>

<body>

  <?php
  include 'View/header/headerPagina.php';
  ?>


  <section class="section-margin">
    <div class="container">
      <div class="section-intro text-center pb-90px">
        <img class="section-intro-img" src="View/Pagina/img/home/section-icon.png" alt="">
        <h2>Nuestros Servicios</h2>
        
      </div>


  </section>

  <section class="section-margin">

    <div class="container">

      <div class="row">

        <?php foreach ($paqueteturisticos as $paquete) : ?>
          <div class="col-md-6">
            <div class="tour-card">

              <img class="card-img rounded-0" src="View/img_paquete/<?php echo $paquete->getImagen(); ?>" alt="">

              <div class="tour-card-overlay">
                <div class="media">
                  <div class="media-body">
                    <h4><?php echo $paquete->getNombre(); ?></h4>
                    <small>Duracion: <?php echo $paquete->getDuracion(); ?> dias</small>
                    <p>Destino: <?php echo $paquete->getDireccion(); ?></p>
                  </div>
                  <div class="media-price">
                    <h4 class="text-primary">$<?php echo $paquete->getPrecioTotal(); ?></h4>
                  </div>
                </div>
                <a href="MainController.php?action=paquete-detalle&id=<?php echo $paquete->getId(); ?>">Ver detalle</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php
  include 'View/header/footerPagina.php';
  ?>


</body>

</html>