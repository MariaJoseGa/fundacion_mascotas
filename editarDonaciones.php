<?php
session_start();
include 'includes/conecta.php';

// consulta para extraer datos de usuario
$usuario = "SELECT * FROM usuario";
$guardarU = $conecta->query($usuario);
// validar que exita un boton enviar
// generar la consulta para extraer lo datos
$id_donacion = $_GET['id_donacion'];
$m = "SELECT * FROM donacion WHERE id_donacion = '$id_donacion'";
$modificar = $conecta->query($m);
$dato = $modificar->fetch_array();
if(isset($_POST['modificar'])){
// recuparar los datos que se encuentran en cada uno de los imputs
 $id_donacion = $_POST['id_donacion'];
 $id_usuario = $conecta->real_escape_string($_POST['id_usuario']);
 $tipo_donacion = $conecta->real_escape_string($_POST['tipo_donacion']);
 // realizar la consulta para modificar los datos
    $actualiza = "UPDATE donacion SET id_usuario = '$id_usuario', tipo_donacion = '$tipo_donacion' WHERE id_donacion = '$id_donacion'";
 
 $actualizar = $conecta->query($actualiza);
 header("location:tablaDonaciones.php");
}
 ?>

 <!DOCTYPE html>
<div id="pag">
<!--Inicia barra navegación -->
      <?php include "cabecera.php"; ?>
      <!-- Termina barra navegación -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <link rel="stylesheet" type="text/css" href="css/preloader.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/formularios.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="js/jquery-3.5.1.min.js"></script>
    <title>Bienvenido al sistema</title>
  </head>
  <body>
  <div class="container py-4">
       <h3 id="titulo" style="color: black; margin: 0.5rem;">Donaciones</h3>
       <div class="row text-center col-sm-12 col-md-12 col-lg-12 py-4">
         <ul class="nav nav-tabs">
            <li class="nav-item">
               <a id = "data" class="nav-link" href="tablaDonaciones.php" >Tabla de registros <i class="icon-edit"></i> </a>
            </li>
            <li class="nav-item">
               <a id = "data" class="nav-link active" href="registroDonacion.php">Registrar Donación <i class="icon-user-add"></i> </a>
            </li>
          </ul>
       </div>
       <div class="container">
           <div class="col-sm-12 col-md-12 col-lg-12">
              <h4 id="titulo" class="text-center">Editar Registro</h4>
              <form style="background-size: 50%, 25%, 25%; background-position: top center; min-height: 400px;" class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <p>
                      
                    </p>
                    <input type="hidden" name="id_donacion" value="<?php echo $dato['id_donacion']; ?>">
                    <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Donador</label>
                   <select id="texto" class="form-control" name="id_usuario">
                     <option value="<?php echo $dato['id_usuario']; ?>" >Nombre de quien dona</option>
                     <?php while($row = $guardarU->fetch_assoc()){?>
                     <option value="<?php echo $row['id_usuario']; ?>"><?php echo $row['nombre_usuario']; ?></option>
                     <?php } ?>
                   </select>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-form-label">Tipo de donación</label> 
                   <input style="height: 100px; margin: .5rem;" id="texto" type="text" name="tipo_donacion" value="<?php echo $dato['tipo_donacion']; ?>"  class="form-control" required></input>
                   </div>
                    <input id="button" type="submit" name="modificar" class="btn btn-success btn-sm btn-block" value="Modificar">
              </form>
           </div>
      </div>
      </body>
    </html>
    </div>