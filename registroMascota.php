<?php
error_reporting(0);
include 'includes/conecta.php';
// consulta para extraer datos de usuario
$usuario = "SELECT * FROM usuario";
$guardarU = $conecta->query($usuario);
// validar que exita un boton enviar
// consulta para extraer datos de tipo_mascota
$tipoM = "SELECT * FROM tipo_mascota";
$guardarT = $conecta->query($tipoM);
// validar que exita un boton enviar
// consulta para extraer datos de veterinaria
$raza = "SELECT * FROM raza";
$guardarR = $conecta->query($raza);
// validar que exita un boton enviar
if (isset($_POST['registrar'])) {
  $mensaje = "";
  $id_mascota = "";
  $id_usuario = $conecta->real_escape_string($_POST['id_usuario']);
  $id_tipo_mascota = $conecta->real_escape_string($_POST['id_tipo_mascota']);
  $id_raza = $conecta->real_escape_string($_POST['id_raza']);
  $color = $conecta->real_escape_string($_POST['color']);
  $tamanio = $conecta->real_escape_string($_POST['tamanio']);
  $peso = $conecta->real_escape_string($_POST['peso']);
  $descripcion = $conecta->real_escape_string($_POST['descripcion']);
  $fecha_ingreso = $conecta->real_escape_string($_POST['fecha_ingreso']);
  // consulta para insertar los datos
    if($id_usuario == "")
    {
        $insertar = "INSERT INTO mascota (id_mascota, id_usuario, id_tipo_mascota, id_raza, color, tamanio, peso,
  descripcion, fecha_ingreso)VALUES('$id_mascota',null,'$id_tipo_mascota','$id_raza','$color',
  '$tamanio','$peso','$descripcion','$fecha_ingreso')";
    }else
    {
        $insertar = "INSERT INTO mascota (id_mascota, id_usuario, id_tipo_mascota, id_raza, color, tamanio, peso,
  descripcion, fecha_ingreso)VALUES('$id_mascota','$id_usuario','$id_tipo_mascota','$id_raza','$color',
  '$tamanio','$peso','$descripcion','$fecha_ingreso')";
    }
  
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
       <h3 id="titulo" style="color: black; margin: 0.5rem;">Nuestras Pets</h3>
       <div class="row text-center col-sm-12 col-md-12 col-lg-12 py-4">
         <ul class="nav nav-tabs">
            <li class="nav-item">
               <a class="nav-link" href="tablaUsuarios.php">Tabla de registros</a>
            </li>
            <li class="nav-item">
               <a class="nav-link active" href="registroUsuario.php">Registrar datos</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="busquedaUsuarios.php">Búsqueda de registros</a>
           </li>
          </ul>
       </div>
       <div class="container">
           <div class="col-sm-12 col-md-12 col-lg-12">
              <h4 id="titulo" class="text-center">Registro de Mascota</h4>
              <form style="background-size: cover; background-position: top center; min-height: 700px;" class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <p>
                      
                    </p>
                    <div class="form-group row">
                    <label for="staticEmail" class="text">¿Quién trajo la mascota?</label>
                   <select id="texto" class="form-control" name="id_usuario">
                     <option value="">Nombre del usuario</option>
                     <?php while($row = $guardarU->fetch_assoc()){?>
                     <option value="<?php echo $row['id_usuario']; ?>"><?php echo $row['nombre_usuario']; ?></option>
                     <?php } ?>
                   </select>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="text">Tipo de Mascota</label>
                   <select id="texto" class="form-control" name="id_tipo_mascota">
                     <option value="">Tipo</option>
                     <?php while($row = $guardarT->fetch_assoc()){?>
                     <option value="<?php echo $row['id_tipo_mascota']; ?>"><?php echo $row['tipo_mascota']; ?></option>
                     <?php } ?>
                   </select>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Raza</label>
                   <select id="texto" class="form-control" name="id_raza">
                     <option value="">Raza</option>
                     <?php while($row = $guardarR->fetch_assoc()){?>
                     <option value="<?php echo $row['id_raza']; ?>"><?php echo $row['tipo_raza']; ?></option>
                     <?php } ?>
                   </select>
                  </div>
                    <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Color</label>        
                   <input id="texto" type="text" name="color" placeholder="Describe el color de la mascota" class="form-control" required>
                   </div>
                   <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Tamaño</label>
                   <input id="texto" type="text" name="tamanio" placeholder="Ex: 15cm x 25 cm aprox" class="form-control" required>
                   </div>
                   <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Peso</label>
                   <input id="texto" type="text" name="peso" placeholder="Peso en Kg" class="form-control" required>
                   </div>
                   <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Descripción</label>
                   <input id="texto" type="text" name="descripcion" placeholder="Descripción del estado de la mascota" class="form-control" required>
                   </div>
                   <div class="form-group row">
                    <label for="staticEmail" class="text">Fecha de ingreso</label>
                   <input id="texto" type="date" name="fecha_ingreso" class="form-control" required>
                   </div>
                   <input id="button" align=center; type="submit" name="registrar" value="Registrar" class="btn btn-primary">
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