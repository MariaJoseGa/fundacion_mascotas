<?php
include 'includes/conecta.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="css/fontello.css">
	<link rel="stylesheet" type="text/css" href="css/preloader.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="js/jquery-3.6.1.min.js"></script>
	<title>Inicio | ADOPET Fundación de Mascotas</F></title>
</head>
	<body>
		<!-- Inicio preloader de la pagina web -->
		<div id="loader">
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
		</div>
		<!-- Termina el preloader de la pagina web -->
		<!-- Inicia el contenido de la web -->
		<div id="contenido">
			<!--Inicia barra navegación -->
		<nav class="navbar navbar-expand-lg bg-main sticky-top" id="menu">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.html">
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
            <li><a class="dropdown-item" href="#">Registrar Usuario</a></li>
            <li><a class="dropdown-item" href="#">Registrar Mascota</a></li>
            <li><a class="dropdown-item" href="#">Registrar Donación</a></li>
            <li><a class="dropdown-item" href="#">Registrar Adopción</a></li>
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
            <li><a class="dropdown-item" href="#">Inicio Sesión</a></li>
            <li><a class="dropdown-item" href="#">Configuración</a></li>
            <li><a class="dropdown-item" href="#">Acerca de</a></li>
          </ul>
        </li>
      </ul>
  </div>
</nav>
</div>
			<!-- Termina barra navegación -->
			<p class="py-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
		<!-- Termina el contenido de la web -->
		<script src="js/bootstrap.min.js"></script>
		<script src="css/bootstrap.min.css"></script>
		<script src="js/preloader.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>