<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="MainController.php?action=admin-index">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-plane"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Business Travel</div>
    </a>
    <li class="nav-item active">
        <a class="nav-link" href="MainController.php?action=admin-index">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <div class="sidebar-heading">
        Administrar
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Categorías</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Servicios:</h6>
                <a class="collapse-item" href="MainController.php?action=paquete-index">Paquete Turistico</a>
                <a class="collapse-item" href="MainController.php?action=servicio-index">Servicio</a>
                <a class="collapse-item" href="MainController.php?action=pedido-index">Pedido</a>
                <a class="collapse-item" href="MainController.php?action=interesado-index">Reservas</a>
                <br>

                <!-- <a class="collapse-item" href="utilities-other.php">Ofertas</a> -->
                <h6 class="collapse-header">Personas:</h6>
                <a class="collapse-item" href="MainController.php?action=usuario-index">Usuario</a>
                <a class="collapse-item" href="MainController.php?action=proveedor-index">Proveedor</a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
    Diseñar
    </div>

    <li class="nav-item">
        <a class="nav-link" href="MainController.php?action=paquete-disenar">
            <i class="fas fa-fw fa-table"></i>
            <span>Generacion de paquetes</span></a>
        <a class="nav-link" href="MainController.php?action=paquete-listar-img">
            <i class="fas fa-fw fa-table"></i>
            <span>Explorar imagenes</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>