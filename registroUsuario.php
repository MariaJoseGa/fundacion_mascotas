<?php
error_reporting(0);
include 'includes/conecta.php';
// consulta para extraer datos de departamento
$dpto = "SELECT * FROM departamento";
$guardarD = $conecta->query($dpto);
// validar que exita un boton enviar
// consulta para extraer datos de ciudad
$ciudad = "SELECT * FROM ciudad";
$guardarC = $conecta->query($ciudad);
// validar que exita un boton enviar
// consulta para extraer datos de veterinaria
$id_veterinaria = "SELECT * FROM veterinaria";
$guardarV = $conecta->query($id_veterinaria);
// validar que exita un boton enviar
if (isset($_POST['registrar'])) {
  $mensaje = "";
  $id_usuario = "";
  $tipo_usuario = 1;
  $correo_usuario = $conecta->real_escape_string($_POST['correo_usuario']);
  $cedula_usuario = $conecta->real_escape_string($_POST['cedula_usuario']);
  $nombre_usuario = $conecta->real_escape_string($_POST['nombre_usuario']);
  $apellido_usuario = $conecta->real_escape_string($_POST['apellido_usuario']);
  $telefono_usuario = $conecta->real_escape_string($_POST['telefono_usuario']);
  $direccion_usuario = $conecta->real_escape_string($_POST['direccion_usuario']);
  $id_dpto = $conecta->real_escape_string($_POST['id_dpto']);
  $id_ciudad = $conecta->real_escape_string($_POST['id_ciudad']);
  $id_veterinaria = $conecta->real_escape_string($_POST['id_veterinaria']);
  // consulta para verificar que el registro no exista
  $validar = "SELECT * FROM usuario WHERE correo_usuario = '$correo_usuario' || cedula_usuario = '$cedula_usuario'";
  $validando = $conecta->query($validar);
  if($validando->num_rows > 0){
    $mensaje.="<h5 class='text-danger text-center'> El usuario y/o Email ya se encuantran registrados</h5>";
  } else {
  // consulta para insertar los datos
    if($id_veterinaria == "")
    {
        $insertar = "INSERT INTO usuario (id_usuario, tipo_usuario, correo_usuario, cedula_usuario, nombre_usuario, apellido_usuario, telefono_usuario,
  direccion_usuario, id_ciudad, id_veterinaria)VALUES('$id_usuario','$tipo_usuario','$correo_usuario','$cedula_usuario','$nombre_usuario',
  '$apellido_usuario','$telefono_usuario','$direccion_usuario','$id_ciudad',null)";
    }else
    {
        $insertar = "INSERT INTO usuario (id_usuario, tipo_usuario, correo_usuario, cedula_usuario, nombre_usuario, apellido_usuario, telefono_usuario,
  direccion_usuario, id_ciudad, id_veterinaria)VALUES('$id_usuario','$tipo_usuario','$correo_usuario','$cedula_usuario','$nombre_usuario',
  '$apellido_usuario','$telefono_usuario','$direccion_usuario','$id_ciudad','$id_veterinaria')";
    }
  
  $guardando = $conecta->query($insertar);
  if ($guardando > 0) {
    $mensaje.="<h5 class='text-success text-center'> Tu registro se realizo con exito</h5>";
  }
  else{
      $mensaje.="<h5 class='text-danger text-center'> Tu registro no se realizo con exito</h5>";
  }
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
       <h3 id="titulo" style="color: black; margin: 0.5rem;">Nuestra Comunidad</h3>
       <div class="row text-center col-sm-12 col-md-12 col-lg-12 py-4">
         <ul class="nav nav-tabs">
            <li class="nav-item">
               <a class="nav-link" href="tablaUsuarios.php">Tabla de registros</a>
            </li>
            <li class="nav-item">
               <a class="nav-link active" href="registroUsuario.php">Registrar datos</a>
            </li>
          </ul>
       </div>
       <div class="container">
           <div class="col-sm-12 col-md-12 col-lg-12">
              <h4 id="titulo" class="text-center">Registro de Usuario</h4>
              <form style="background-size: cover; background-position: top center; min-height: 700px;" class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <p>
                      
                    </p>
                    <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Correo</label>        
                   <input id="texto" type="email" name="correo_usuario" placeholder="example@email.com" class="form-control" required>
                   </div>
                   <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                   <input id="texto" type="text" name="nombre_usuario" placeholder="Tu nombre" class="form-control" required>
                   </div>
                   <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Apellido</label>
                   <input id="texto" type="text" name="apellido_usuario" placeholder="Tu apellido" class="form-control" required>
                   </div>
                   <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Cédula</label>
                   <input id="texto" type="text" name="cedula_usuario" placeholder="Tu número de cédula" class="form-control" required>
                   </div>
                   <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Teléfono</label>
                   <input id="texto" type="tel" name="telefono_usuario" placeholder="Ex: 3123456789" class="form-control" required>
                   </div>
                   <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Dirección</label>
                   <input id="texto" type="text" name="direccion_usuario" placeholder="Ex: Cra 25 # 12 - 33" class="form-control" required>
                   </div>
                   <div class="form-group row">
                    <div class="col">
                   <select class="form-control" name="id_dpto">
                     <option value="">Departamento</option>
                     <?php while($row = $guardarD->fetch_assoc()){?>
                     <option value="<?php echo $row['id_dpto']; ?>"><?php echo $row['nombre_dpto']; ?></option>
                     <?php } ?>
                   </select>
                   </div>
                   <div class="col">
                   <select class="form-control" name="id_ciudad">
                     <option value="">Ciudad</option>
                     <?php while($row = $guardarC->fetch_assoc()){?>
                     <option value="<?php echo $row['id_ciudad']; ?>"><?php echo $row['nombre_ciudad']; ?></option>
                     <?php } ?>
                   </select>
                   </div>
                   </div>
                   <div class="form-group">
                    <label for="staticEmail" class="col-form-label">¿Tienes una veterinaria?</label> 
                   <div class="form-group row">
                     <div class="col">
                      <label>Si</label>
                     <input id="chx" type="checkbox" name="vet" value="si">
                   </div>
                     <div class="col">
                      <label>No</label>
                     <input id="chx" type="checkbox" name="vet" value="no">
                   </div>
                   </div>
                   </div>
                   <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Veterinaria</label>
                   <select id="texto" class="form-control" name="id_veterinaria">
                     <option value="">Nombre de la Veterinaria</option>
                     <?php while($row = $guardarV->fetch_assoc()){?>
                     <option id="vet_hab" value="<?php echo $row['id_veterinaria']; ?>"><?php echo $row['nombre_vet']; ?></option>
                     <?php } ?>
                   </select>
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