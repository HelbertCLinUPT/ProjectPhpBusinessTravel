<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Contact</title>
  <link rel="icon" href="View/Pagina/img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="View/Pagina/vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="View/Pagina/vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="View/Pagina/css/style.css">

</head>

<body>
  <?php
  include 'View/header/headerPagina.php';
  ?>

  <section class="section-margin">

    <?php
    if (isset($_SESSION['rol'])) {
    ?>
      <div class="container">
        <div class="row ">
          <div class="col-md-6 offset-md-3">
            <form method="post" action="MainController.php?action=page-pedido-add&send-email=true">
              <div class="form-group">
                <label for="fecha">Fecha de Solicitud</label>
                <input type="date" class="form-control"  name="fechaSolicitud" required>
              </div>
              
              <input type="hidden" name="id" value=<?php echo $_SESSION['id'] ?>>
              <div class="form-group">
                <label for="destino">Destino</label>
                <input type="text" class="form-control" name="destino" required>
              </div>
              <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
          </div>

        </div>
      </div>
    <?php
    } else {
    ?>
      <script>
        window.location.href = 'MainController.php?action=main-index';
      </script>
    <?php
    }
    ?>


  </section>

  <?php
  include 'View/header/footerPagina.php';
  ?>



</body>

</html>