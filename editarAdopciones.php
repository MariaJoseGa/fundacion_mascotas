<?php
session_start();
include 'includes/conecta.php';

// consulta para extraer datos de usuario
$usuario = "SELECT * FROM usuario";
$guardarU = $conecta->query($usuario);
// validar que exita un boton enviar
// consulta para extraer datos de usuario
$mascota = "SELECT * FROM mascota";
$guardarM = $conecta->query($mascota);
// validar que exita un boton enviar
// generar la consulta para extraer lo datos
$id_adopcion = $_GET['id_adopcion'];
$m = "SELECT * FROM adopcion WHERE id_adopcion = '$id_adopcion'";
$modificar = $conecta->query($m);
$dato = $modificar->fetch_array();
if(isset($_POST['modificar'])){
// recuparar los datos que se encuentran en cada uno de los imputs
 $id_adopcion = $_POST['id_adopcion'];
 $id_usuario = $conecta->real_escape_string($_POST['id_usuario']);
 $id_mascota = $conecta->real_escape_string($_POST['id_mascota']);
  $nombre_mascota = $conecta->real_escape_string($_POST['nombre_mascota']);
 $fecha_salida = $conecta->real_escape_string($_POST['fecha_salida']);
 // realizar la consulta para modificar los datos
    $actualiza = "UPDATE adopcion SET id_usuario = '$id_usuario', id_mascota = '$id_mascota', nombre_mascota = 'nombre_mascota', fecha_salida = 'fecha_salida' WHERE id_adopcion = '$id_adopcion'";
 
 $actualizar = $conecta->query($actualiza);
 header("location:tablaAdopciones.php");
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
       <h3 id="titulo" style="color: black; margin: 0.5rem;">Adopciones</h3>
       <div class="row text-center col-sm-12 col-md-12 col-lg-12 py-4">
         <ul class="nav nav-tabs">
            <li class="nav-item">
               <a id = "data" class="nav-link" href="tablaAdopciones.php" >Tabla de registros <i class="icon-edit"></i> </a>
            </li>
            <li class="nav-item">
               <a id = "data" class="nav-link active" href="registroAdopcion.php">Registrar Adopción <i class="icon-user-add"></i> </a>
            </li>
          </ul>
       </div>
       <div class="container">
           <div class="col-sm-12 col-md-12 col-lg-12">
              <h4 id="titulo" class="text-center">Editar Registro</h4>
              <form style="background-size: 50%, 25%, 25%; background-position: top center; min-height: 400px;" class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <p>
                      
                    </p>
                    <div style ="width: 350px;" class="form-group row">
                    <label for="staticEmail" class="col-form-label">Persona que adopta</label>
                   <select value="<?php echo $dato['id_usuario']; ?>"  id="texto" class="form-control" name="id_usuario">
                     <option value="">Seleccione nombre de la persona</option>
                     <?php while($row = $guardarU->fetch_assoc()){?>
                     <option id="vet_hab" value="<?php echo $row['id_usuario']; ?>"><?php echo $row['nombre_usuario']; ?></option>
                     <?php } ?>
                   </select>
                  </div>
                  <div style ="width: 350px;" class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Mascota</label>
                   <select value="<?php echo $dato['id_mascota']; ?>"  id="texto" class="form-control" name="id_mascota">
                     <option value="">Seleccione la mascota</option>
                     <?php while($row = $guardarM->fetch_assoc()){?>
                     <option id="vet_hab" value="<?php echo $row['id_mascota']; ?>"><?php echo $row['descripcion']; ?></option>
                     <?php } ?>
                   </select>
                  </div>
                  <div style ="width: 350px;" class="form-group row">
                  <label for="staticEmail" class="col-form-label">Nombre de la mascota</label> 
                   <input id="texto" type="text" name="nombre_mascota" placeholder="Nombre" class="form-control"value="<?php echo $dato['nombre_mascota']; ?>"  required>
                   </div>
                   <div class="form-group row">
                    <label for="staticEmail" class="col-form-label">Fecha de adopcion</label> 
                   <input value="<?php echo $dato['fecha_salida']; ?>"  id="texto" type="date" name="fecha_salida" class="form-control" required>
                   </div>
                    <input id="button" type="submit" name="modificar" class="btn btn-success btn-sm btn-block" value="Modificar">
              </form>
           </div>
      </div>
      </body>
    </html>
    </div>