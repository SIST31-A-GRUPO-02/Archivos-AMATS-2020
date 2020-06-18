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
<body class="bg-light" oncopy="return false" onpaste="return false">
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

<div class="jumbotron " style="margin:0px;">
<!-- Image and text -->
<br><br>
<table class="table table-responsive bg-light" >
<tr >
<td class="" style="width:291px; margin:2px;">
<a class="nav-link hoverable" href="vistas/ingreso.php">
 <h5 align=center class="nav-link teal-text text-darken-1"><b>Ingresos</b></h5><br>
<h5 align=center><img src="vistas/imagenes/iconos/cd.ico" align=center  class="responsive-img " alt="" width=120px height=120px></h5>
</a>
</td>

<td class="" style="width:291px; margin:2px;">
<a class="nav-link hoverable " href="vistas/egresos.php">
 <h5 align=center class="nav-link teal-text text-darken-1"><b>Egresos</b></h5><br>
<h5 align=center><img src="vistas/imagenes/iconos/jk.ico" align=center  class="responsive-img " alt="" width=120px height=120px></h5>
</a>
</td>

<td class="" style="width:291px; margin:2px;">
<a class="nav-link hoverable" href="vistas/resumen_mensual.php">
 <h5 align=center class=" teal-text text-darken-1"><b>Resumen de Egresos e Ingresos</b></h5>
<h5 align=center><img src="vistas/imagenes/iconos/ef.ico" align=center  class="responsive-img " alt="" width=110px height=110px></h5>
</a>
</td>

<td style="width:291px; margin:2px;">
<a class="nav-link hoverable" href="vistas/pagos.php">
 <h5 align=center class="nav-link teal-text text-darken-1"><b>Resumen de Pagos</b></h5>
<h5 align=center><img src="vistas/imagenes/iconos/gh.ico" align=center  class="responsive-img " alt="" width=120px height=120px></h5>
</a>
</td>

<td style="width:291px; margin:2px;">
<a class="nav-link hoverable" href="vistas/socios.php">
 <h5 align=center class="nav-link teal-text text-darken-1"><b>Socios</b></h5><br>
<h5 align=center><img src="vistas/imagenes/iconos/no.ico" align=center  class="responsive-img " alt="Añadir Nuevos Socio" width=120px height=120px></h5>
</a>
</td>
</tr>
</table><br><br>
</div>
</body>
<footer style="background:#f9db5a; height:90px;">
<script type="text/javascript">
    //Función para la fecha

function MostrarFecha()
   {
   var nombres_dias = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado")
   var nombres_meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre")

   var fecha_actual = new Date()

   dia_mes = fecha_actual.getDate();
   dia_semana = fecha_actual.getDay();
   mes = fecha_actual.getMonth() + 1;
   anio = fecha_actual.getFullYear();

   document.write(nombres_dias[dia_semana] + ", " + dia_mes + " de " + nombres_meses[mes - 1] + " de " + anio)
   }

   //Función para el reloj

var RelojID12 = null
var RelojEjecutandose12 = false

function DetenerReloj12 () {
    if(RelojEjecutandose12)
        clearTimeout(RelojID12)
    RelojEjecutandose12 = false
}

function MostrarHora12 () {
    var ahora = new Date()
    var horas = ahora.getHours()
    var minutos = ahora.getMinutes()
    var segundos = ahora.getSeconds()
    var meridiano

    //ajusta las horas
    if (horas > 12) {
        horas -= 12
        meridiano = " P.M."
    } else {
        meridiano = " A.M."
        }

    //establece las horas
    if (horas < 10)
        ValorHora = "0" + horas
    else
        ValorHora = "" + horas

    //establece los minutos
    if (minutos < 10)
        ValorHora += ":0" + minutos
    else
        ValorHora += ":" + minutos

    //establece los segundos
    if (segundos < 10)
        ValorHora += ":0" + segundos
    else
        ValorHora += ":" + segundos

    ValorHora += meridiano
    document.reloj12.digitos.value = ValorHora

    //si se desea tener el reloj en la barra de estado, reemplazar la anterior por esta
    //window.status = ValorHora

    RelojID12 = setTimeout("MostrarHora12()",1000)
    RelojEjecutandose12 = true
}

function IniciarReloj12 () {
    DetenerReloj12()
    MostrarHora12()
}

window.onload = IniciarReloj12;
if (document.captureEvents) {           //N4 requiere invocar la funcion captureEvents
    document.captureEvents(Event.LOAD)
}


</script>
<br>
<center><b style="font-family:monospace;"><script type="text/javascript">
    MostrarFecha();
</script></b>
<div class="recuadro3">
<form name="reloj12">
<input type="text" size="14" name="digitos" style="text-align:center; font-family:monospace; font-weight: bolder;">
</form>
</div></center>
</footer>
</html>

<?php
}
else {
?>


<div class="jumbotron " style="margin:0px;">
<center><table class="table bg-light" style="border-radius:10px; width:600px;">
<tr>
<td width=300px></td>
<td style="margin:4px; width:300px;">
<a class="nav-link hoverable" href="vistas/usuario_normal.php">
<h5 align=center class="nav-link teal-text text-darken-1"><b> Ganancias Mensuales </b></h5>
<h5 align=center><img src="vistas/imagenes/iconos/7.ico" align=center  class="responsive-img " alt="" width=120px height=120px></h5>
</a>
</td>
<td width=300px></td>
</tr>
</table></center>
</div>
</body><footer style="background:#f9db5a; height:90px;">
<script type="text/javascript">
    //Función para la fecha

function MostrarFecha()
   {
   var nombres_dias = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado")
   var nombres_meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre")

   var fecha_actual = new Date()

   dia_mes = fecha_actual.getDate();
   dia_semana = fecha_actual.getDay();
   mes = fecha_actual.getMonth() + 1;
   anio = fecha_actual.getFullYear();

   document.write(nombres_dias[dia_semana] + ", " + dia_mes + " de " + nombres_meses[mes - 1] + " de " + anio)
   }

   //Función para el reloj

var RelojID12 = null
var RelojEjecutandose12 = false

function DetenerReloj12 () {
    if(RelojEjecutandose12)
        clearTimeout(RelojID12)
    RelojEjecutandose12 = false
}

function MostrarHora12 () {
    var ahora = new Date()
    var horas = ahora.getHours()
    var minutos = ahora.getMinutes()
    var segundos = ahora.getSeconds()
    var meridiano

    //ajusta las horas
    if (horas > 12) {
        horas -= 12
        meridiano = " P.M."
    } else {
        meridiano = " A.M."
        }

    //establece las horas
    if (horas < 10)
        ValorHora = "0" + horas
    else
        ValorHora = "" + horas

    //establece los minutos
    if (minutos < 10)
        ValorHora += ":0" + minutos
    else
        ValorHora += ":" + minutos

    //establece los segundos
    if (segundos < 10)
        ValorHora += ":0" + segundos
    else
        ValorHora += ":" + segundos

    ValorHora += meridiano
    document.reloj12.digitos.value = ValorHora

    //si se desea tener el reloj en la barra de estado, reemplazar la anterior por esta
    //window.status = ValorHora

    RelojID12 = setTimeout("MostrarHora12()",1000)
    RelojEjecutandose12 = true
}

function IniciarReloj12 () {
    DetenerReloj12()
    MostrarHora12()
}

window.onload = IniciarReloj12;
if (document.captureEvents) {           //N4 requiere invocar la funcion captureEvents
    document.captureEvents(Event.LOAD)
}


</script>
<br>
<center><b style="font-family:monospace;"><script type="text/javascript">
    MostrarFecha();
</script></b>
<div class="recuadro3">
<form name="reloj12">
<input type="text" size="14" name="digitos" style="text-align:center; font-family:monospace; font-weight: bolder;">
</form>
</div></center>
</footer>
</html>
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
