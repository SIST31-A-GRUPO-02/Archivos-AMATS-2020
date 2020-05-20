<?php
session_start();
if(isset($_SESSION["id_user"]))

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

  

   <title>Socios</title>

    

</head>

<body onload="mostrar_usuario()">



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



  



<div class='container ' style="height: 400px ; overflow: scroll;" id=cuerpo_principal>

<!-- aqui se genera los usuarios -->





</div>

<br>

<div  class='container' style="display: none" id=btn>

<input type=button class='btn btn-primary black-text   amber accent-2' 

 value='Eliminar Miembro ' onclick =eliminar_usuario() >





<input type=button class='btn btn-primary black-text   amber accent-2' 

 value='Agregar Miembro ' onclick =agg_usuario()  >

  

</form>  

</div>



<div class=container-fluid style="display: none;" id=cuerpo2>



</div>





<script >

document.addEventListener('DOMContentLoaded', function() {

        var elems = document.querySelectorAll('select');

        var instances = M.FormSelect.init(elems, options);

    });



    // Or with jQuery



    $(document).ready(function() {

        $('select').formSelect();

    });

</script>





        <!-- fin -->

<script src="js/ajax.js"></script>







  <!-- esto v

  alida los text box que quiero numeros -->

  <script src=js/validaciones_decimal.js></script>     

  <!--  fin script -->





<br>

<br>

<br>

</body>

</html>



<?php 

}

else{

header("location: login.php");

exit;







}

?>



