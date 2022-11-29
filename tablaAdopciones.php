<?php
  error_reporting(0);
  include 'includes/conecta.php';
  $where = "";
  if (!empty($_POST)) {
      $valor = $_POST['buscar'];
      if (!empty($valor)) {
         $where = "WHERE nombre_mascota LIKE '%$valor%'";
      }
  }
  $consulta = "SELECT * FROM adopcion $where";
  $resultado = $conecta->query($consulta);
 ?>
<?php
include 'includes/conecta.php';
// consulta
$consulta = "SELECT * FROM adopcion";
$guardar = $conecta->query($consulta);
 ?>
<!DOCTYPE html>
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
       <h3 id="titulo" style="color: black; margin: 0.5rem;">Registros de Adopciones</h3>
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
       <form id="searchL" class="input-group rounded" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                       <input style="background:white; border-width: 3px; border-color: #dda1fe;" type="text" name="buscar" class="form-control rounded" placeholder="Busqueda por nombre mascota"><br>
                       <input style="background:linear-gradient(#ddbcf0, #b7f0fa); color: gray; border-color: lightcyan;" type="submit" name="buscando" value="Buscar" class="btn-block btn-sm btn-success">
                   </form>
       <div class="container">
         <?php if($resultado->num_rows > 0) { ?>
           <div class="col-sm-12 col-md-12 col-lg-12">
               <h4 id="titulo" class="text-center">Registros Adopciones</h4>
               <form style="background: linear-gradient(#75e6f8,#ddbcf0, #b7f0fa); border-radius: 25px;">
               <div class="table-responsive table-hover" id="TablaConsulta">
                  <table class="table">
                      <thead class="text-muted">
                      	   <th class="text-center">ID ADOPCION</th>
                           <th class="text-center">ID USUARIO</th>
                           <th class="text-center">ID MASCOTA</th>
                           <th class="text-center">NOMBRE MASCOTA</th>
                           <th class="text-center">FECHA SALIDA</th>
                           </thead>
                      <tbody style="text-align:center;">
                         <?php while($row = $resultado->fetch_assoc()){?>
                         <tr>
                           <td><?php echo $row['id_adopcion']; ?></td>
                            <td><?php echo $row['id_usuario']; ?></td>
                            <td><?php echo $row['id_mascota']; ?></td>
                            <td><?php echo $row['nombre_mascota']; ?></td>
                            <td><?php echo $row['fecha_salida']; ?></td>
                            <td>
                               <a style="color: #2798aa;" href="editarAdopciones.php?id_adopcion=<?php echo $row['id_adopcion'];?>" class="icon-edit">Editar</a> 
                                <a style="color: red;" href="eliminarAdopciones.php?id_adopcion=<?php echo $row['id_adopcion'];?>" class="icon-trash">Borrar</a>
                            </td>
                         </tr>
                       <?php } ?>
                      </tbody>
                  </table>
               </div>
           </div>
         </form>
        <?php } else {?>
        
        <?php } ?>
       </div>