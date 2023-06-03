<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Safario Travel - Contact</title>
  <link rel="icon" href="img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="View/Pagina/vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="View/Pagina/vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="View/Pagina/css/style.css">

</head>

<body>
  <?php
  include 'View/header/headerPagina.php';
  ?>


  <!--================Hero Banner SM Area Start =================-->
  <section class="hero-banner-sm magic-ball magic-ball-banner" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 0px -80px" data-top-bottom="background-position: 0 100px">
    <div class="container">
      <div class="hero-banner-sm-content">
        <h1>Contact Us</h1>
        <p>Air seed winged lights saw kind whales in sixth best a dont seas dron image so fish all tree on</p>
      </div>
    </div>
  </section>
  <!--================Hero Banner SM Area End =================-->
  <section class="section-margin">
    <div class="container">
      <div class="row ">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <div id="map" style="height: 480px;"></div>
          <script>
            function initMap() {
              var uluru = {
                lat: -25.363,
                lng: 131.044
              };
              var grayStyles = [{
                  featureType: "all",
                  stylers: [{
                      saturation: -90
                    },
                    {
                      lightness: 50
                    }
                  ]
                },
                {
                  elementType: 'labels.text.fill',
                  stylers: [{
                    color: '#A3A3A3'
                  }]
                }
              ];
              var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                  lat: -31.197,
                  lng: 150.744
                },
                zoom: 9,
                styles: grayStyles,
                scrollwheel: false
              });
            }
          </script>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>
        </div>
        <div class="col-lg-6">
          <h2 class="contact-title">Póngase en contacto</h2>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Buttonwood, California.</h3>
              <p>Rosemead, CA 91770</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3><a href="tel:454545654">00 (440) 9865 562</a></h3>
              <p>Mon to Fri 9am to 6pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><a href="mailto:support@colorlib.com">support@colorlib.com</a></h3>
              <p>Envíenos su consulta en cualquier momento.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  include 'View/header/footerPagina.php';
  ?>
</body>

</html>