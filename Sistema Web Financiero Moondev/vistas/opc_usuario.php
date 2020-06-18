<?php

session_start();

if (isset($_SESSION["id_user"]) && isset($_SESSION["nombre"]) &&

isset($_SESSION["cargo"]) && isset($_SESSION["usuario"])) {

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

    <script src=vistas/js/jquery.js></script>

      <!--Import Google Icon Font-->

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!--Import materialize.css-->

      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

      <!--JavaScript at end of body for optimized loading-->

      <script type="text/javascript" src="js/materialize.js"></script>

    <link rel="icon" href="imagenes/logos/FAVlogo.png">



    <title>Mi Perfil</title>



</head>

<input type="hidden" id='id' value=' <?php echo $_SESSION["id_user"]; ?> '>

<body class="bg-light" onload="mostrar_infoUsuario()" oncopy="return false" onpaste="return false">



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

<div class=container id=cuerpo>



  </div>





  </div>

  </div>



  <!-- <script>

  M.toast({html: 'I am a toast!'})

  </script>

   -->

  <script>



  $(document).ready(function() {

    M.updateTextFields();

  });


</script>

<script src='js/ajax.js'></script>
<script src='js/validaciones_decimal.js'></script>

</body>
</html>

<?php

}

else{



    header("location: login.php");

    exit;

}



?>
