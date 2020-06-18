<?php 
session_start();


 if (isset($_POST["ok1"])) {
     # code...
 
 #costo de servicio Profesional
 $servicio=$_POST["servicio_profesional"];  
 #compras de srvicios Luz Agua Servidores
 $servicio_compras=$_POST["compras"];#pago de servicios 
 #si lleva iva 
 $pagoIva_servicio=$_POST["iva"];
 #viaticos
 $viaticos=$_POST["viaticos"];
 #si es venta O servicio La venta 
 
 #fecha
 $fecha=date("y-m-d");
 #usuario
 $usuario=$_SESSION["id_user"];


include_once 'egresos.php'; 
$object2= new egresos();                                 


$iva_compra= $object2 ->iva_de_servicios($pagoIva_servicio,$servicio_compras); 
#proceso de servicio contratado por algun profesional externo de la empresa (especialista, o n asesor de algo )
$retencion_renta=$object2->retencio_renta($servicio);
#activo que saldra de la empresa
$cobro_profesional=$servicio-$retencion_renta;
#fin

include 'descuentos_activos.php';
$control_desc = new descuentos();
 $result=$control_desc->desc_activos($usuario,$servicio_compras,$viaticos,$cobro_profesional,$fecha,$retencion_renta,$iva_compra); 
#fin
if ($result=="Exito"){
echo "
<link rel=stylesheet href=../vistas/css/materialize.css>
<link type=text/css rel=stylesheet href=../vistas/css/bootstrap.css>
<br>
    <div class=container>
	<div class=jumbotron style='border-radius:20px;'>
      <center><h4 style='font-family:Arial,Helvetica,sans-serif;' class='teal-text text-darken-1'><b>Registro hecho exitosamente</b></h4>
     <a href=../vistas/egresos.php>
    <img src='../vistas/imagenes/iconos/c.ico' class='responsive-img' width=80px height=80px> 
    </a></center>
	</div>
      </div>";
}
else{
    echo "
    <link rel=stylesheet href=../vistas/css/materialize.css>
	<link type=text/css rel=stylesheet href=../vistas/css/bootstrap.css>
	<br>
    <div class=container>
	<div class=jumbotron style='border-radius:20px;'>
      <h4 style='font-family:Arial,Helvetica,sans-serif;' class='teal-text text-darken-1'><b>Algo salio mal</b></h4>
      <img src='../vistas/imagenes/iconos/c.ico' class='responsive-img' width=80px height=80px> 
    </a></center>
	</div>
      </div>";
}

 }
 else{
    echo "
   <link rel=stylesheet href=../vistas/css/materialize.css>
   <link type=text/css rel=stylesheet href=../vistas/css/bootstrap.css>
   <br>
    <div class=container>
	<div class=jumbotron style='border-radius:20px;'>
      <h4 style='font-family:Arial,Helvetica,sans-serif;' class='teal-text text-darken-1'><b>Algo salio mal</b></h4>
      <img src='../vistas/imagenes/iconos/c.ico' class='responsive-img' width=80px height=80px> 
    </a></center>
	</div>
      </div>
   ";


 }
?>