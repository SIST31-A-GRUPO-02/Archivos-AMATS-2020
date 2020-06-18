<?php

session_start();

if (isset($_SESSION["id_user"])) {

if ($_SESSION["cargo"]=="Normal") {



?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- estilos propios  -->

<!--     <link rel="stylesheet" href="estilo.css"> -->

    <!-- frameworks -->

    <link rel="stylesheet" href="css/bootstrap.css">

    <script src=js/jquery.js></script>

      <!--Import Google Icon Font-->

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!--Import materialize.css-->

      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

      <!--JavaScript at end of body for optimized loading-->

      <script type="text/javascript" src="js/materialize.js"></script>

    <link rel="icon" href="imagenes/logos/FAVlogo.png">

   <!-- validaciones de number en decimal -->



   <title> Mis Ventas  </title>



</head>

<body class="" oncopy="return false" onpaste="return false" >





<ul id="slide-out" class="sidenav">

  <li><div class="user-view">

    <div class="background">



    </div>

    <a href=""><img class="figure-img sidenav-close" src="imagenes/logos/logo1.png" ></a>

    <span class="black-text name"><?php echo $_SESSION["nombre"]; ?>

    </span>

    <span class="black-text "><?php echo $_SESSION["cargo"]; ?></span>

  </div></li>

  <li><a href="../index.php" class="green-text nav-link" >Inicio</a></li>

  <li><a href="opc_usuario.php" class="green-text nav-link" >Perfil</a></li>

  <li><a href="../controladores/cerrar_sesion.php" class="green-text nav-link" >Cerrar Sesion</a></li>

</ul>

<a href="" data-target="slide-out" class="sidenav-trigger">

<nav class="navbar navbar-expand-lg navbar-light bg-light">

     <img src=imagenes/logos/logo1.png alt="Moondev">



</nav>

</a>

<br>

    <div class="container-fluid" >



    <center>



    <div class="jumbotron-fluid" style="width: 300px">

      <?php

      echo "<input type=hidden id=cargo value='".$_SESSION["cargo"]."' >

    ";

    ?>

    <?php echo"<input type=hidden  class='datepicker' readonly='' id=valor

  value='".$_SESSION["cargo"]."'>";?>

    <table class="table table-bordered">

    <tr>

      <th colspan="2">Seleccione Un Rango<br> De Fecha Para Mostrar</th>

    </tr>



    <tr>

      <th>Desde :</th>



      <th>Hasta</th>



    </tr>

  <tr>




<?php   echo "<input type=hidden id=valor value=".$_SESSION["cargo"].">"; ?>
    <td><input type=text class='datepicker' readonly='' id=valor1></td>

    <td><input type=text class='datepicker' readonly='' id=valor2></td>

    </tr>



    <tr>



    <th colspan="2"> <button class="waves-effect  btn-large col-lg-12 " style="background:#f9db5a" onclick='mostrar_pagos()'>

    Mostrar</button>

    </th>

</tr>

</table>









    </div>

    </center>

    <center><br>
 <div class=jumbotron style="width:900px; border-radius:15px;">
  <div class="container" id=cuerpo style="display:none; margin:3px; width:500px">




  </div>
  <div style="margin:0px;">
 <center> <a href=../index.php>
    <img src='imagenes/iconos/c.ico' class='responsive-img' width=80px height=80px>
    </a><br>
  <img src=imagenes/logos/logo1.png alt=Moondev></center>
</div>

  </center>

  </div>

<br>

<br>

<br>





<!-- script utilizados -->



<script src="js/ajax2.js"></script>











  <!-- esto v

  alida los text box que quiero numeros -->

  <script src=js/validaciones_decimal.js></script>

  <!--  fin script -->



<!--  es lo que controla el select -->



<script >

  $(document).ready(function(){

    $('.datepicker').datepicker({

        format: 'yyyy-mm-dd'

    });

  });

</script>



<!-- fin de los script -->





</body>

</html>

















<?php

}

}

else{

    header("location: ../vistas/login.php");

    exit;



}



?>
