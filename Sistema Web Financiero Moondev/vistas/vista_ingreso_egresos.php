<script src=js/ajax.js></script>
<link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

<?php

  $option=$_GET["var"];

  if ($option=="") {

    header("location: ../index.php");

    exit;

  }

  else{

    echo "";

    #este es el select y la condicion que  manda

    switch($option)

    {

      case "Proyecto":

        ##################################################################################

        #inicio

        echo "

      

        <center><b><h5 style='font-family:Arial,Helvetica,sans-serif;' class='teal-text text-darken-1'>Ingreso Del Servicio</h5></b></center><br>
		<div style='display:flex; justify-content:center; align-items:center;'>
        <form action='../controladores/insertar_datos.php' method=post onsubmit='return formularioOk()'>
        <input type=hidden value=Proyecto name=motivo>          
        <h6>Descripcion De Venta : 
		<br>
		<input type=text name=descripcion_venta maxlength=100 required='' style=width:300px ></h6>
        <h6>Precio : \$
		<br>
		<input name=precio_venta  type=text 
        style=width:300px required='' id=moneda_nac onkeypress='return filterFloat(event,this);' 
        value=0></h6>
        <h6>Porcentaje de Ganancia: 
		<br>
		<input name=porcent_ganancia type=number value=0
        style=width:300px required=''  max=100 min=0 id=porc>
        </h6><br>
		<center><input type=submit name=ok1 class='btn waves-effect waves-light' style='color:black;background-color:rgb(244,219,90);
        font-size:15px;' value=Registrar id=btn>
        <input type=reset class='btn waves-effect waves-light' style='color:black;background-color:rgb(244,219,90);
        font-size:15px;'value=Reiniciar>     
        </center>
		</div>
        </form>
		<br><br>
		<center><img src=imagenes/logos/logo1.png alt=Moondev></center>
		";


    #fin

    #########################################################################################

    break;

case "incremento":

  echo "

  
  
  <center><h5 style='font-family:Arial,Helvetica,sans-serif;' class='teal-text text-darken-1'>Ingrese Incremento</h5></center><br>
  <div style='display:flex; justify-content:center; align-items:center;'>
  <form action=../controladores/insertar_datos.php method=post onsubmit='return formularioOk2()'>
  <input type=hidden value='Incremento De Capital' name=motivo>          
  <h6>Descripcion Del Incremento : <br>
  <input type=text name=descripcion_incremento maxlength=100 required='' style=width:300px placeholder='Detalle' ></h6>
  <h6>Cantidad : \$ <br>
  <input name=cantidad  type=text id=cantidad 
  style=width:300px required='' id=moneda_nac onkeypress='return filterFloat(event,this);' 
  value=0></h6> 
  <br>
  <center><input type=submit name=ok2 class='btn waves-effect waves-light' style='color:black;background-color:rgb(244,219,90);
  font-size:15px;'value=Registrar id=btn>
  <input type=reset class='btn waves-effect waves-light' style='color:black;background-color:rgb(244,219,90);
  font-size:15px;'value=Reiniciar> </center>
  </div>
  </form>
  <br><br>
		<center><img src=imagenes/logos/logo1.png alt=Moondev></center>
  ";

  

  break;

case 'donacion':

  echo "

  

  <center><h5 style='font-family:Arial,Helvetica,sans-serif;' class='teal-text text-darken-1'>Ingrese  Donaci&oacute;n</h5></center><br>
  <div style='display:flex; justify-content:center; align-items:center;'>
  <form action=../controladores/insertar_datos.php  method=post  onsubmit='return formularioOk2()'>
  <input type=hidden value=Donacion name=motivo>          
  <h6>Descripcion De Donaci&oacute;n : <br>
  <input type=text name=descripcion_incremento maxlength=100 required='' style=width:300px placeholder='Detalle' ></h6>
  <h6>Cantidad : \$ <br>
  <input name=cantidad  type=text id=cantidad 
  style=width:300px required='' id=moneda_nac onkeypress='return filterFloat(event,this);' 
  value=0></h6>
  <br>
  <br>

  <center><input type=submit name=ok2 class='btn waves-effect waves-light' style='color:black;background-color:rgb(244,219,90);
  font-size:15px;'value=Registrar onclik=radio() id=btn>
  <input type=reset class='btn waves-effect waves-light' style='color:black;background-color:rgb(244,219,90);
  font-size:15px;'value=Reiniciar> </center> 
  </div>
     
  </form>
  <br><br>
		<center><img src=imagenes/logos/logo1.png alt=Moondev></center>
  ";



  break;      

  





}

##fin switch

  }

 

 

  ?>



  

  

