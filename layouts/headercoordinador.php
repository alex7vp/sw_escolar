<nav class="navbar navbar-expand-lg  text-light bg-light">
  <div class="container-fluid text-light">
    <a class="navbar-brand text-light" href="#"><b>Sistema de Asistencias y Calificaciones - Coordinador</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item text-light">
          <a class="nav-link text-light" href="usuarioscoordinador.php">Usuarios</a>
        </li>  
        <li class="nav-item text-light">
          <a class="nav-link text-light" href="detallematerias.php">Detalle de Materias</a>
        </li> 
        <li class="nav-item text-light">
          <a class="nav-link text-light" href="rmatriculas.php">Matrícula</a>
        </li> 
      </ul>
      <li class="d-flex nav-item dropdown text-light">
        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php
          if (!isset($_SESSION["rol"])) {
            echo "";
          } else {
            echo "  Usuario: " . $_SESSION["nombre"] . "  " . $_SESSION["apellido"];
          }
          ?>
        </a>
        <ul class="dropdown-menu text-light">

          <li><a class="dropdown-item" href="<?php
                                              if (!isset($_SESSION["rol"])) {
                                                echo "index.php";
                                              } else {
                                                echo "salir.php";
                                              }
                                              ?>">
              <?php
              if (!isset($_SESSION["rol"])) {
                echo "Iniciar Session";
              } else {
                echo "Cerrar Session";
              }
              ?>
            </a>
          </li>
        </ul>
      </li>
    </div>
  </div>
</nav>