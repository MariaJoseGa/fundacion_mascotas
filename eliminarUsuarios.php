<?php
include 'includes/conecta.php';
$id = $_GET['id_usuario'];
$eliminar = "DELETE FROM usuario WHERE id_usuario = '$id'";
$elimina = $conecta->query($eliminar);
header("location:tablaUsuarios.php");
$conecta->close();?> 