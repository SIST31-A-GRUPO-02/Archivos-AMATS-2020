<?php 
session_start();
$_SESSION["id_user"]="";
$_SESSION["nombre"]="";
$_SESSION["cargo"]="";
$_SESSION["usuario"]="";
session_destroy();

header("location: ../vistas/login.php");
exit;
?>