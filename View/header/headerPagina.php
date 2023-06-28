<link rel="stylesheet" href="View/Pagina/css/styleperfil.css">

<header class="header_area">
  <div class="main_menu">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container box_1620">

        <a class="navbar-brand logo_h" href="MainController.php?action=main-index">
          <img height="91px" src="View/Pagina/img/LogoEmpresa.png" alt="">
          
          <b>Business Travel</b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
          <ul class="nav navbar-nav menu_nav justify-content-end">
            <li class="nav-item"><a class="nav-link" href="MainController.php?action=main-index">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="MainController.php?action=page-nosotros">Nosotros</a></li>
            <li class="nav-item"><a class="nav-link" href="MainController.php?action=page-paquetes">Paquetes</a></li>
            <li class="nav-item"><a class="nav-link" href="MainController.php?action=page-ofertas">Ofertas</a></li>
            <li class="nav-item"><a class="nav-link" href="MainController.php?action=page-contactanos">Contactanos</a></li>
            <?php 
            if(isset($_SESSION['rol'])){
            ?>
            <li class="nav-item"><a class="nav-link" href="MainController.php?action=page-pedido">Pedido</a></li>
            <?php 
            }
            ?>
          
          </ul>

          <?php
          if (!isset($_SESSION['rol'])) {
          ?>
            <div class="text-center py-2">
              <a class="button ml-lg-4" href="MainController.php?action=login-user">Login</a>
            </div>
          <?php
          } else {

          ?>
            <div class="menu-container">
              <div class="menu-content">
                <img src="View/Pagina/img/perfiluser.svg" alt="Usuario" class="menu-image">
                <span class="menu-name" id="menu-name"><?php echo $_SESSION['nombre']; ?></span>
                <a class="button-s ml-lg-4" href="MainController.php?action=login-logout">Salir</a>
              </div>
            </div>





          <?php
          }
          ?>

        </div>
      </div>
    </nav>
  </div>
</header>