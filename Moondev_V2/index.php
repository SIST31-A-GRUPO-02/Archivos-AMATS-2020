<?php
session_start();

if(isset( $_SESSION["id_user"]) &&isset(  $_SESSION["cargo"]))
{
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- estilos propios  -->
<!--     <link rel="stylesheet" href="estilo.css"> -->
    <!-- frameworks -->
    <link rel="stylesheet" href="vistas/css/bootstrap.css">
    <script src=vistas/js/jquery.js></script>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="vistas/css/materialize.css"  media="screen,projection"/>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="vistas/js/materialize.js"></script>
    <link rel="icon" href="vistas/imagenes/logos/FAVlogo.png">
    <title> Bienvenido</title>
</head>
<body class="bg-light">
<ul id="slide-out" class="sidenav">
  <li><div class="user-view">
    <div class="background">
    </div>
    <a href=""><img class="figure-img sidenav-close" src="vistas/imagenes/logos/logo1.png" ></a>
    <span class="black-text name"><?php echo $_SESSION["nombre"]; ?>
    </span>
    <span class="black-text "><?php echo $_SESSION["cargo"]; ?></span>
  </div></li>
  <li><a href="index.php" class="green-text nav-link" >Inicio</a></li>
  <li><a href="vistas/opc_usuario.php" class="green-text nav-link" >Perfil</a></li>
  <li><a href="controladores/cerrar_sesion.php" class="green-text nav-link" >Cerrar Sesion</a></li>  
</ul>

<a href="" data-target="slide-out" class="sidenav-trigger">

<nav class="navbar navbar-expand-lg navbar-light bg-light">

     <img src=vistas/imagenes/logos/logo1.png alt="Moondev">

     

</nav>







</a> 



<?php 



if ($_SESSION["cargo"]=="Administrador") {

  # code...



?>

<div class="jumbotron bg-light">

<!-- Image and text -->

<table class="table bg-light">



<tr >



<td class="">

<a class="nav-link hoverable " href="vistas/ingreso_egresos.php">

 <h5 align=center class="nav-link">Ingresos</h5>

<h5 align=center><img src="vistas/imagenes/iconos/1.png" align=center  class="responsive-img " alt=""></h5>

</a>

</td>

    <td class="">

<a class="nav-link hoverable " href="vistas/egresos.php">

 <h5 align=center class="nav-link">Egresos</h5>

<h5 align=center><img src="vistas/imagenes/iconos/c.png" align=center  class="responsive-img " alt="" height="130px" width="130px"></h5>

</a>

</td>


<td class="">

<a class="nav-link hoverable" href="vistas/resumen_mensual.php">

 <h5 align=center class="nav-link">Resumen De Egresos e Ingresos</h5>

<h5 align=center><img src="vistas/imagenes/iconos/2.png" align=center  class="responsive-img " alt=""></h5>

</a>

</td>

                   

<td>

<a class="nav-link hoverable" href="vistas/pagos.php">

 <h5 align=center class="nav-link">Resumen De Pagos</h5>

<h5 align=center><img src="vistas/imagenes/iconos/3.png" align=center  class="responsive-img " alt=""></h5>

</a>

</td>









<td>

<a class="nav-link hoverable" href="vistas/socios.php">

 <h5 align=center class="nav-link">Socios</h5>

<h5 align=center><img src="vistas/imagenes/iconos/add.png"

 align=center  class="responsive-img " alt="Añadir Nuevos Socio"></h5>

</a>

</td>





</tr>



</table>

</div>







      



        



</body>

</html>

<?php 

}



else {

?>



<br>

<div class="container" align=center style=' height:250px; width:200px'>

<a class="list-inline-item hoverable " href="vistas/usuario_normal.php" style="

margin:5px;">

 <h4 style="margin:5px;"> Ganancias Mensuales </h4>

 <center>

<img src="vistas/imagenes/iconos/1.png" align=center   style="margin:5px;">

</center>

</a>

</div>





</table>



<?php 

}



?>





<?php 

}

else {

header("location: vistas/login.php");

exit;







}

?>

<script src="vistas/js/validaciones_decimal.js"></script>
