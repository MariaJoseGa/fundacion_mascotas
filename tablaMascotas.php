<?php
include 'includes/conecta.php';
  error_reporting(0);
  include 'includes/conecta.php';
  $where = "";
  if (!empty($_POST)) {
      $valor = $_POST['buscar'];
      if (!empty($valor)) {
         $where = "WHERE id_raza LIKE '%$valor%'";
      }
  }
  $consulta = "SELECT * FROM mascota $where";
  $resultado = $conecta->query($consulta);
 ?>
<?php
include 'includes/conecta.php';
// consulta
$consulta = "SELECT * FROM mascota";
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
       <h3 id="titulo" style="color: black; margin: 0.5rem;">Registros de Usuarios</h3>
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
       <form id="searchL" class="input-group rounded" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                       <input style="background:white; border-width: 3px; border-color: #dda1fe;" type="text" name="bubtn btn-primaryscar" class="form-control rounded" placeholder="Digite el número de cédula"><br>
                       <span style="background-color: transparent;" class="input-group-text border-0" id="search-addon">
                        <input style="background:linear-gradient(#ddbcf0, #b7f0fa); color: gray; border-color: lightcyan;" class="btn btn-primary" id="search-addon" type="submit" name="buscando" value="Buscar"></input>
                        </span>
                   </form>
       <div class="container">
         <?php if($resultado->num_rows > 0) { ?>
           <div class="col-sm-12 col-md-12 col-lg-12">
               <h4 id="titulo" class="text-center">Registros Mascotas</h4>
               <form style="background: linear-gradient(#75e6f8,#ddbcf0, #b7f0fa); border-radius: 25px;">
               <div class="table-responsive table-hover" id="TablaConsulta">
                  <table class="table">
                      <thead class="text-muted">
                      	   <th class="text-center">ID PET</th>
                           <th class="text-center">ID USUARIO</th>
                           <th class="text-center">TIPO MASCOTA</th>
                           <th class="text-center">ID RAZA</th>
                           <th class="text-center">COLOR</th>
                           <th class="text-center">TAMAÑO</th>
                           <th class="text-center">PESO</th>
                           <th class="text-center">DESCRIPCIÓN</th>
                           <th class="text-center">FECHA_INGRESO</th>
                      </thead>
                      <tbody style="text-align:center;">
                         <?php while($row = $resultado->fetch_assoc()){?>
                         <tr>
                           <td><?php echo $row['id_mascota']; ?></td>
                            <td><?php echo $row['id_usuario']; ?></td>
                            <td><?php echo $row['id_tipo_mascota']; ?></td>
                            <td><?php echo $row['id_raza']; ?></td>
                            <td><?php echo $row['color']; ?></td>
                            <td><?php echo $row['tamanio']; ?></td>
                             <td><?php echo $row['peso']; ?></td>
                              <td><?php echo $row['descripcion']; ?></td>
                               <td><?php echo $row['fecha_ingreso']; ?></td>
                            <td>
                               <a style="color: #2798aa;" href="editarMascotas.php?id_usuario=<?php echo $row['id_mascota'];?>" class="icon-edit">Editar</a> 
                                <a style="color: red;" href="eliminarMascotas.php?id_mascota=<?php echo $row['id_mascota'];?>" class="icon-trash">Borrar</a>
                            </td>
                         </tr>
                       <?php } ?>
                      </tbody>
                  </table>
               </div>
           </div>
         </form>
        <?php } ?>
       </div>