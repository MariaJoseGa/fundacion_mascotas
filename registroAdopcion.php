<?php
error_reporting(0);
include 'includes/conecta.php';
// consulta para extraer datos de usuario
$usuario = "SELECT * FROM usuario";
$guardarU = $conecta->query($usuario);
// validar que exita un boton enviar
// consulta para extraer datos de usuario
$mascota = "SELECT * FROM mascota";
$guardarM = $conecta->query($mascota);
// validar que exita un boton enviar
if (isset($_POST['registrar'])) {
  $mensaje = "";
  $id_adopcion = "";
  $id_usuario = $conecta->real_escape_string($_POST['id_usuario']);
  $id_mascota = $conecta->real_escape_string($_POST['id_mascota']);
  $nombre_mascota = $conecta->real_escape_string($_POST['nombre_mascota']);
  $fecha_salida = $conecta->real_escape_string($_POST['fecha_salida']);
  // consulta para insertar los datos
        $insertar = "INSERT INTO adopcion (id_adopcion, id_usuario, id_mascota, nombre_mascota, fecha_salida)VALUES('$id_adopcion','$id_usuario','$id_mascota','nombre_mascota','fecha_salida')";
  
  $guardando = $conecta->query($insertar);
  if ($guardando > 0) {
    $mensaje.="<h5 class='text-success text-center'> Tu registro se realizo con exito</h5>";
  }
  else{
      $mensaje.="<h5 class='text-danger text-center'> Tu registro no se realizo con exito</h5>";
  }
}
 ?>
<!DOCTYPE html>
<div id="pag">
<!--Inicia barra navegación -->
      <?php include "cabecera.php"; ?>
      <!-- Termina barra navegación -->
<html lang="en" dir="ltr">
  <head>
    <head>
    <title>Confirmación de envío de formulario</title>
<script language="JavaScript">
function pregunta(){
    if (confirm('¿Estas seguro de enviar este formulario?')){
       document.tuformulario.submit()
    }
}
</script>
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
       <h3 id="titulo" style="color: black; margin: 0.5rem;"><D>Adopciones</D></h3>
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
              <h4 id="titulo" class="text-center">Registro de Adopción</h4>
              <form name=tuformulario style="background-size: 50%, 25%, 25%; background-position: top center; min-height: 400px;" class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <p>
                      
                    </p>
                    <div style ="width: 350px;" class="form-group row">
                    <label for="staticEmail" class="col-form-label">Persona que adopta</label>
                   <select id="texto" class="form-control" name="id_usuario">
                     <option value="">Seleccione nombre de la persona</option>
                     <?php while($row = $guardarU->fetch_assoc()){?>
                     <option id="vet_hab" value="<?php echo $row['id_usuario']; ?>"><?php echo $row['nombre_usuario']; ?></option>
                     <?php } ?>
                   </select>
                  </div>
                  <div style ="width: 350px;" class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Mascota</label>
                   <select id="texto" class="form-control" name="id_mascota">
                     <option value="">Seleccione la mascota</option>
                     <?php while($row = $guardarM->fetch_assoc()){?>
                     <option id="vet_hab" value="<?php echo $row['id_mascota']; ?>"><?php echo $row['descripcion']; ?></option>
                     <?php } ?>
                   </select>
                  </div>
                  <div style ="width: 350px;" class="form-group row">
                  <label for="staticEmail" class="col-form-label">Nombre de la mascota</label> 
                   <input id="texto" type="text" name="nombre_mascota" placeholder="Nombre" class="form-control" required>
                   </div>
                   <div class="form-group row">
                    <label for="staticEmail" class="col-form-label">Fecha de adopcion</label> 
                   <input id="texto" type="date" name="fecha_salida" class="form-control" required>
                   </div>
                   <input id="button" onclick="pregunta()" align=center; type="submit" name="registrar" value="Registrar" class="btn btn-primary">
              </form>
           </div>
           <?php echo $mensaje; ?>
      </div>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/preloader.js"></script>
      <script src="js/main.js"></script>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      </body>
    </html>
    </div>