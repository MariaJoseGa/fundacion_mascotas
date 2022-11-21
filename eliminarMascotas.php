<?php
include 'includes/conecta.php';
$id = $_GET['id_mascota'];
$eliminar = "DELETE FROM mascota WHERE id_mascota = '$id'";
$elimina = $conecta->query($eliminar);
header("location:tablaUsuarios.php");
$conecta->close();?> 