<?php
include 'includes/conecta.php';
$id = $_GET['id_adopcion'];
$eliminar = "DELETE FROM adopcion WHERE id_adopcion = '$id'";
$elimina = $conecta->query($eliminar);
header("location:tablaAdopciones.php");
$conecta->close();?>