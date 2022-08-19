<nav class="navbar navbar-expand-lg  text-light bg-light">
  <div class="container-fluid text-light">
    <a class="navbar-brand text-light" href="#">Sistema Escolar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="/sw_escolar/home.php">Home</a>
        </li>
        <li class="nav-item text-light">
          <a class="nav-link text-light"  href="#">Reportes</a>
        </li>
        <li class="nav-item dropdown text-light">
          <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Configuraciones
          </a>
          <ul class="dropdown-menu text-light">
            <li><a class="dropdown-item" href="provincias.php"> Provincias</a></li>            
            <li><a class="dropdown-item" href="ciudades.php">Ciudades</a></li>
            <li><hr class="dropdown-divider"></li>            
            <li><a class="dropdown-item" href="roles.php">Rol</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="">Areas</a></li>            
            <li><a class="dropdown-item" href="">Materias</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="">Estados de Asistencia</a></li>   
          </ul>
        </li>
        <li class="nav-item text-light">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex text-light" role="search">
        <a href="salir.php" class="btn btn-info">Cerrar Sesión</a>
      </form>
    </div>
  </div>
</nav>