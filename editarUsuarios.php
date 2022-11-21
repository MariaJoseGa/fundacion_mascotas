<?php
include 'includes/conecta.php';
// consulta
$usuario = $_SESSION['id_usuario'];
if (!isset($usuario)) {
  header("location:editarUsuarios.php");
} 
// generar la consulta para extraer lo datos
$id = $_GET['id_usuario'];
$m = "SELECT * FROM usuario WHERE usuario = '$id'";
$modificar = $conecta->query($m);
$dato = $modificar->fetch_array();
if(isset($_POST['modificar'])){
// recuparar los datos que se encuentran en cada uno de los imputs
 $id_usuario = $_POST['id_usuario'];
 $tipo_usuario = $conecta->real_escape_string($_POST['tipo_usuario']);
 $correo_usuario = $conecta->real_escape_string($_POST['correo_usuario']);
 $cedula_usuario = $conecta->real_escape_string($_POST['cedula_usuario']);
 $nombre_usuario = $conecta->real_escape_string($_POST['nombre_usuario']);
 $apellido_usuario = $conecta->real_escape_string($_POST['apellido_usuario']);
 $telefono_usuario = $conecta->real_escape_string($_POST['telefono_usuario']);
 $direccion_usuario = $conecta->real_escape_string($_POST['direccion_usuario']);
 $id_ciudad = $conecta->real_escape_string($_POST['id_ciudad']);
 $id_veterinaria = $conecta->real_escape_string($_POST['id_veterinaria']);
 // realizar la consulta para modificar los datos
 $actuliza = "UPDATE usuario SET tipo_usuario = '$tipo_usuario', correo_usuario = '$correo_usuario',  cedula_usuario = '$cedula_usuario', nombre_usuario = '$nombre_usuario', apellido_usuario = '$apellido_usuario', telefono_usuario = 'telefono_usuario', direccion_usuario ='$direccion_usuario', id_ciudad = 'id_ciudad', id_veterinaria = 'id_veterinaria' WHERE id_usuario = '$id_usuario'";
 $actualizar = $conecta->query($actuliza);
 header("location:tablaUsuarios.php");
}
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
       <div class="container">
        <?php if($guardar->num_rows > 0) { ?>
        <h4 id="titulo" class="text-center">Registros</h4>
        <form style="background: linear-gradient(#75e6f8,#ddbcf0, #b7f0fa); border-radius: 25px;">
           <div class="col-sm-12 col-md-12 col-lg-12">
               <div class="table-responsive table-hover" id="TablaConsulta">
                  <table class="table">
                      <thead class="text-muted">
                      	   <th class="text-center">ID USUARIO</th>
                           <th class="text-center">NOMBRE</th>
                           <th class="text-center">APELLIDO</th>
                           <th class="text-center">TELÉFONO</th>
                           <th class="text-center">DIRECCIÓN</th>
                           <th class="text-center">CÉDULA</th>
                           <th class="text-center">CORREO</th>
                           <th class="text-center">CIUDAD</th>
                           <th class="text-center">VETERINARIA</th>
                           
                      </thead>
                      <tbody style="text-align:center;">
                         <?php while($row = $guardar->fetch_assoc()){?>
                         <tr>
                            <td><?php echo $row['id_usuario']; ?></td>
                            <td><?php echo $row['nombre_usuario']; ?></td>
                            <td><?php echo $row['apellido_usuario']; ?></td>
                            <td><?php echo $row['telefono_usuario']; ?></td>
                            <td><?php echo $row['direccion_usuario']; ?></td>
                             <td><?php echo $row['cedula_usuario']; ?></td>
                              <td><?php echo $row['correo_usuario']; ?></td>
                               <td><?php echo $row['id_ciudad']; ?></td>
                                <td><?php echo $row['id_veterinaria'];?></td>
                            <td>
                                <a style="color: #2798aa;" href="editarUsuarios.php?id_usuario=<?php echo $row['id_usuario'];?>" class="icon-edit">Editar</a> 
                                <a style="color: red;" href="eliminarUsuarios.php?id_usuario=<?php echo $row['id_usuario'];?>" class="icon-trash">Borrar</a>
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