<style>
  body {
    background-image: url("/Restaurante/assets/img/Chef/chef.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
  }
</style>

<div class="d-flex flex-column p-3 text-white bg-primario vh-100 " style="width: 280px;">

<img src="/Restaurante/assets/img/logo (2).png" alt="" width="100" height="100" class="d-inline-block align-text-top" />
<hr>
<ul class="nav nav-pills flex-column mb-auto">
    <li>
        <a href="/Restaurante/views/chef/chef.php" class="nav-link text-white">
            <svg class="bi me-2" width="16" height="16">
                <use xlink:href="#home" />
            </svg>
            Inicio
        </a>
    </li>
    <li>
        <a href="#" class="nav-link text-white dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <svg class="bi me-2" width="16" height="16">
                <use xlink:href="#people-circle" />
            </svg>
            Pedidos
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser1">
            <a class="dropdown-item " href="/Restaurante/views/pedidos/pedidos.php">Ver Pedidos</a>
        </ul>
</ul>
<hr>
<div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">Perfil</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item" href="/Restaurante/logout.php">Cerrar Sesión</a>

        </li>
    </ul>
</div>
</div>