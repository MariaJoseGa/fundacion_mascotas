<?php
include 'includes/conecta.php';
$id = $_GET['id_donacion'];
$eliminar = "DELETE FROM donacion WHERE id_donacion = '$id'";
$elimina = $conecta->query($eliminar);
header("location:tablaDonaciones.php");
$conecta->close();?>