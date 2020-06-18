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
<!--<link rel="stylesheet" href="estilo.css"> -->
    <!-- frameworks -->
   
    <link rel="stylesheet" href="css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <script src=js/jquery.js></script>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.js"></script>
    <link rel="icon" href="imagenes/logos/FAVlogo.png">
   <!-- validaciones de number en decimal -->
   <title> Egresos</title>

</head>
<body class="" oncopy="return false" onpaste="return false">
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
<div class="jumbotron " style='position:relative; border-radius:20px'>
<div style='position:absolute; top:1%; margin-top:1% '>
<a href=../index.php><img src="imagenes/iconos/a.ico" class="responsive-img" width=35px height=35px></a>
</div>
<br><br>
<center><h5 style='font-family:Arial,Helvetica,sans-serif;' class='teal-text text-darken-1'><b>Egresos</b></h5></center><br>
<div style='display:flex; justify-content:center; align-items:center;'>
<form action="../controladores/insertar_egresos.php" name='fdatos1' method="post" onsubmit="return formulario()">
<h6>Contratacion De Servicio Profesional : $  <br>
<input name=servicio_profesional type=text style=width:320px required=''
id=moneda_nac  onkeypress='return filterFloat(event,this);'  ></h6>
<h6>Pago de servicios  : $ <br>
 <input name=compras  type=text style=width:320px required=''
id=moneda_nac  onkeypress='return filterFloat(event,this);'></h6>
Pago de Iva Por Servicio:
<label>
  <input class=with-gap name=iva type=radio   value=si>
  <span>Si</span>
<label>
<input class=with-gap name=iva  type=radio  checked value=no>
  <span>No</span>
  </label>
  </label>
<h6>Viaticos : $ <br>
 <input name=viaticos  type=text style=width:320px required=''
id=moneda_nac  onkeypress='return filterFloat(event,this);'></h6>
<br>
<center>
<input type=submit  name=ok1 class='btn waves-effect waves-light' style='color:black;background-color:rgb(244,219,90); font-size:15px;' value=Registrar >
<input type=reset class='btn waves-effect waves-light' style='color:black;background-color:rgb(244,219,90);
font-size:15px;'value=Reiniciar>  </center>
</div>

<br>

</form>

<br>
		<center><img src=imagenes/logos/logo1.png alt=Moondev></center>
</div>

</div>


<script src=js/validaciones_decimal.js></script>
<script src=js/validacion.js></script>




</body>
</html>
<?php
}
else{
header("location: login.php");
exit;
}
?>
