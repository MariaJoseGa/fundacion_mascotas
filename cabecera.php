<!DOCTYPE html>
<html>
<nav class="navbar navbar-expand-lg bg-main sticky-top" id="menu">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="img/logo.png" width="150" height="80">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#inicio" aria-controls="inicio" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="inicio">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"><span class="icon-heart-empty"></span> Inicio </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><span class="icon-pencil"></span> Sobre nosotros </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><span class="icon-mail"></span> ¿Cómo contactarnos? </a>
        </li>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
            Registros
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="registroUsuario.php">Registrar Usuario</a></li>
            <li><a class="dropdown-item" href="registroMascota.php">Registrar Mascota</a></li>
            <li><a class="dropdown-item" href="registroDonacion.php">Registrar Donación</a></li>
            <li><a class="dropdown-item" href="registroAdopcion.php">Registrar Adopción</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <ul class="navbar-nav ml-auto nav-flex-icons">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="icon-facebook-rect"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="icon-twitter-bird"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="icon-youtube"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="opciones" role="button" data-bs-toggle="dropdown">
            Opciones
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="login.php">Inicio Sesión</a></li>
            <li><a class="dropdown-item" href="#">Configuración</a></li>
            <li><a class="dropdown-item" href="#">Acerca de</a></li>
          </ul>
        </li>
      </ul>
  </div>
</nav>
</html>



