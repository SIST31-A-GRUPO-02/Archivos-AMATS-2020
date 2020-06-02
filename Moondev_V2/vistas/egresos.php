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

   <title> Egresos</title>  

</head>
<body class="" >
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

    <div class="container">
      <br>
     <div class="jumbotron ">
     <center> 
     <!--   <h3 class=green-text>Elija Opcion</h3> -->
        <form> 
        <div class=input-field style=width:500px>  
          <select name=option  onchange='llamada()' id=option >
          <option disabled selected>Tipo De Egreso </option>
          <option value=servicio >Pago servicio profesional</option>
          <option value=venta>Viaticos</option>
          <option value=incremento>Pago de Servicios</option>
          </select> 
        </div>
        </form>
        <a href="../index.php"><button  class="btn btn-success">Regresar</button></a>
        </center>
        </div>


<!--  es lo que controla el select -->
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
<!-- fin del scrip para el boton de elecion -->


		
</body>
</html>
<?php 
}
else{
header("location: login.php");
exit;
}
?>
















