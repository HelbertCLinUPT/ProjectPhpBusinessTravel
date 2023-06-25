<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Paquetes</title>
  <link rel="icon" href="View/Pagina/img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
  </section>

  <section class="section-margin">
  <div class="container">
    <div class="section-intro text-center pb-80px">
    </div>

    <div class="row">
      <div class="col-md-6">
        <?php if ($paqueteTuristico): ?>
          <h2 class="mb-4">Detalles del paquete turístico</h2>
          <h3 class="mb-3">Nombre del paquete: <?php echo $paqueteTuristico->offsetGet('nombre'); ?></h3>
          <p class="mb-2">Dirección: <?php echo $paqueteTuristico->offsetGet('direccion'); ?></p>
          <p class="mb-2">Duración: <?php echo $paqueteTuristico->offsetGet('duracion'); ?> días</p>
          <p class="mb-2">Precio total: $<?php echo $paqueteTuristico->offsetGet('preciototal'); ?></p>
          <h3 class="mb-3">Servicios incluidos:</h3>
          <ul class="mb-4">
            <?php foreach ($servicios as $servicio): ?>
              <li><?php echo $servicio->offsetGet('servicio'); ?></li>
            <?php endforeach; ?>
          </ul>
          <h3 class="mb-2">Proveedor:</h3>
          <p><?php echo $paqueteTuristico->offsetGet('proveedor'); ?></p>
          <a href="MainController.php?action=page-paquetes" class="btn btn-primary">Volver</a>
        <?php else: ?>
          <p>PaqueteTuristico not found.</p>
        <?php endif; ?>
      </div>
      <div class="col-md-6">
        <?php if ($paqueteTuristico): ?>
          <img src="View/img_paquete/<?php echo $imagen; ?>" alt="Imagen del paquete turístico" class="img-fluid">
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>


  <?php
  include 'View/header/footerPagina.php';
  ?>


</body>

</html>