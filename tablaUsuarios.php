<?php
include 'includes/conecta.php';
// consulta
$consulta = "SELECT * FROM usuario";
$guardar = $conecta->query($consulta);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <link rel="stylesheet" type="text/css" href="css/preloader.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="js/jquery-3.5.1.min.js"></script>
    <title>Bienvenido al sistema</title>
  </head>
  <body>
  <div class="container py-4">
       <h3>Crear una tabla con Php</h3>
       <div class="row text-center col-sm-12 col-md-12 col-lg-12 py-4">
         <ul class="nav nav-tabs">
            <li class="nav-item">
               <a class="nav-link" href="principal.php">Validación de sesión</a>
            </li>
            <li class="nav-item">
               <a class="nav-link active" href="tabla.php">Crear Tabla con PHP y MysQL</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="registro.php">Registro con PHP y MysQL</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="busqueda.php">Busqueda de registros Con PHP y MysQL</a>
           </li>
          </ul>
       </div>
       <div class="container">
           <div class="col-sm-12 col-md-12 col-lg-12">
               <h3 class="text-center"> Tabla Dinamica</h3>
               <div class="table-responsive table-hover" id="TablaConsulta">
                  <table class="table">
                      <thead class="text-muted">
                      	   <th class="text-center">id_usuario</th>
                      	   <th class="text-center">tipo_usuario</th>
                           <th class="text-center">nombre_usuario</th>
                           <th class="text-center">apellido_usuario</th>
                           <th class="text-center">telefono_usuario</th>
                           <th class="text-center">direccion_usuario</th>
                           <th class="text-center">cedula_usuario</th>
                           <th class="text-center">correo_usuario</th>
                           <th class="text-center">id_ciudad</th>
                           <th class="text-center">id_veterinaria</th>
                           
                      </thead>
                      <tbody>
                         <?php while($row = $guardar->fetch_assoc()){?>
                         <tr>
                            <td><?php echo $row['id_usuario']; ?></td>
                            <td><?php echo $row['tipo_usuario']; ?></td>
                            <td><?php echo $row['nombre_usuario']; ?></td>
                            <td><?php echo $row['apellido_usuario']; ?></td>
                            <td><?php echo $row['telefono_usuario']; ?></td>
                            <td><?php echo $row['direccion_usuario']; ?></td>
                             <td><?php echo $row['cedula_usuario']; ?></td>
                              <td><?php echo $row['correo_usuario']; ?></td>
                               <td><?php echo $row['id_ciudad']; ?></td>
                                <td><?php echo $row['id_veterinaria']; ?></td>
                            <td><a href="editarUsuarios.php?id_usuario=<?php echo $row['id_usuario'];?>">Editar</a> <a href="eliminarUsuarios.php?Id_Alumnos=<?php echo $row['id_usuario'];?>">Borrar</a></td>
                         </tr>
                       <?php } ?>
                      </tbody>
                  </table>
               </div>
           </div>
       </div>