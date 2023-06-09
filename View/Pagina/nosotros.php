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

  <!--================Hero Banner SM Area Start =================-->
  <section class="hero-banner-sm magic-ball magic-ball-banner" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 0px -80px" data-top-bottom="background-position: 0 100px">
    <div class="container">
      <div class="hero-banner-sm-content">
        <h1>About Us</h1>
        <p>Air seed winged lights saw kind whales in sixth best a dont seas dron image so fish all tree on</p>
      </div>
    </div>
  </section>

  <section class="section-padding magic-ball magic-ball-sm magic-ball-about">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-6 mb-4 mb-md-0">
          <div class="about-img">
            <img class="img-fluid" src="img/home/about-img.png" alt="">
          </div>
        </div>
        <div class="col-lg-5 col-md-6 align-self-center about-content">
          <h2>Exploration is <br class="d-none d-xl-block"> really the essence <br class="d-none d-xl-block"> of the
            human spirit</h2>
          <p>Make she'd moved divided air. Whose tree that replenish tone hath own upon them it multiply was blessed is
            lights make gathering so day dominion so creeping air was made.</p>
          <a class="button" href="#">Learn More</a>
        </div>
      </div>
    </div>
  </section>

  <section class="section-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-xl-5 align-self-center mb-5 mb-lg-0">
          <div class="search-content">
            <h2>Search suitable <br class="d-none d-xl-block"> and affordable plan <br class="d-none d-xl-block"> for
              your tour</h2>
            <p>Make she'd moved divided air. Whose tree that replenish tone hath own upon them it multiply was blessed
              is lights make gathering so day dominion so creeping</p>
            <a class="button" href="MainController.php?action=login-user">Mas informacion</a>
          </div>
        </div>
        <div class="col-lg-6 col-xl-6 offset-xl-1">
          <div class="search-wrapper">
            <h3>Search Package</h3>
            <form class="search-form" action="#">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Recipient's username">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="ti-search"></i></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <select name="category" id="category">
                  <option value="disabled" disabled selected>Category</option>
                  <option value="8 AM">8 AM</option>
                  <option value="12 PM">12 PM</option>
                </select>
              </div>
              <div class="form-group">
                <select name="tourDucation" id="tourDuration">
                  <option value="disabled" disabled selected>Tour duration</option>
                  <option value="8 AM">8 AM</option>
                  <option value="12 PM">12 PM</option>
                </select>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="date" class="form-control">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="ti-notepad"></i></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <select name="priceRange" id="priceRange">
                  <option value="disabled" disabled selected>Price range</option>
                  <option value="8 AM">8 AM</option>
                  <option value="12 PM">12 PM</option>
                </select>
              </div>
              <div class="form-group">
                <button class="button border-0 mt-3" type="submit">Search Package</button>
              </div>
            </form>
          </div>
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