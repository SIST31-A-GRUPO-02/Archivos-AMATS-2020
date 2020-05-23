

<script src=js/ajax.js></script>

<?php

  $option=$_GET["var"];



  if ($option=="") {

    header("location: ../index.php");

    exit;

  }

  else{

    echo "<center><img src=imagenes/logos/logo1.png alt=Moondev></center>";

    #este es el select y la condicion que  manda

    switch($option)

    {

      case "venta":

        ######################################################################################

        #inicio

        echo "

      



        <h5 style=font-family:Arial,Helvetica,sans-serif>Ingreso De La Venta </h5>

        <form action=../controladores/insertar_datos.php method=post>

        <input type=hidden value=Venta name=motivo>  

        <h6>Descripcion De Venta : <input type=text name=descripcion_venta maxlength=100 required='' style=width:300px ></h6>

        

        <h6>Precio : \$ <input name=precio_venta  type=text 

        style=width:100px required='' id=moneda_nac onkeypress='return filterFloat(event,this);' ></h6>

        

        <h6>Porcentaje de Ganancia: <input name=porcent_ganancia type=number

        style=width:100px required='' id=moneda_nac onkeypress='return filterFloat(event,this);' max=100 min=0 value=0>

        </h6>

        <h5>Egresos De La Venta</h5>

        

        <h6>Contratacion De Servicio Profesional : \$  <input name=servicio_profesional type=text style=width:100px required=''

        id=moneda_nac  onkeypress='return filterFloat(event,this);'  value=0></h6>

        

        <h6>Pago de servicios  : \$  <input name=compras  type=text style=width:100px required=''  

        id=moneda_nac  onkeypress='return filterFloat(event,this);' value=0></h6>

        

        Pago de Iva Por Servicio<br> 

        <p>

        <label>

          <input class=with-gap name=iva type=radio  value=si>

          <span>Si</span>

        <label>

        <input class=with-gap name=iva type=radio checked  value=no>

          <span>No</span>

          </label>

      </p>



        <h6>Viaticos : \$  <input name=viaticos  type=text style=width:100px required=''  

        id=moneda_nac  onkeypress='return filterFloat(event,this);' value=0></h6>

        

        

        <br>

        <br>



        <input type=submit name=ok1 class='btn waves-effect waves-light' style='color:black;background-color:rgb(244,219,90);

        font-size:15px;'value=Registrar>

        <input type=reset class='btn waves-effect waves-light' style='color:black;background-color:rgb(244,219,90);

        font-size:15px;'value=Reiniciar>     

        </form>

        

        ";



        #fin

        ##################################################################################

      break;

      case "servicio":

        ##################################################################################

        #inicio

        echo "

      

        <h5 style=font-family:Arial,Helvetica,sans-serif>Ingreso Del Servicio</h5>

        <form action=../controladores/insertar_datos.php method=post>

        <input type=hidden value=Servicio name=motivo>          

        <h6>Descripcion De Servicio : <input type=text name=descripcion_venta maxlength=100 required='' style=width:300px ></h6>

        

        <h6>Precio : \$ <input name=precio_venta  type=text 

        style=width:100px required='' id=moneda_nac onkeypress='return filterFloat(event,this);' 

        value=0></h6>

        

        

        <h6>Porcentaje de Ganancia: <input name=porcent_ganancia type=number value=0

        style=width:100px required=''  max=100 min=0 >

        </h6>



        <h5>Egresos Del Servicio</h5>

        

        <h6>Contratacion De Servicio Profesional : \$  <input name=servicio_profesional type=text style=width:100px required=''

        id=moneda_nac  onkeypress='return filterFloat(event,this);' value=0 ></h6>

        

        <h6>Pago de servicios  : \$  <input name=compras  type=text style=width:100px required=''  value=0

        id=moneda_nac  onkeypress='return filterFloat(event,this);'></h6>

       

        Pago de Iva Por Servicio<br> 

        <p>

        <label>

          <input class=with-gap name=iva type=radio   value=si>

          <span>Si</span>

        <label>

        <input class=with-gap name=iva  type=radio  checked value=no>

          <span>No</span>

          </label>

      </p>



        <h6>Viaticos : \$  <input name=viaticos  type=text style=width:100px required=''  

        id=moneda_nac  onkeypress='return filterFloat(event,this);' value=0></h6>

        

        <br>

        <br>

        <input type=submit name=ok1 class='btn waves-effect waves-light' style='color:black;background-color:rgb(244,219,90);

        font-size:15px;'value=Registrar onclik=radio() id=btn>

        <input type=reset class='btn waves-effect waves-light' style='color:black;background-color:rgb(244,219,90);

        font-size:15px;'value=Reiniciar>     

        </form>

        

        



    ";

    

    #fin

    #########################################################################################

    break;

case "incremento":

  echo "

  

  <h5 style=font-family:Arial,Helvetica,sans-serif>Ingrese Incremento</h5>

  <form action=../controladores/insertar_datos.php method=post>

  <input type=hidden value='Incremento De Capital' name=motivo>          

  <h6>Descripcion Del Incremento : <input type=text name=descripcion_incremento maxlength=100 required='' style=width:300px placeholder='Detalle' ></h6>

  

  <h6>Cantidad : \$ <input name=cantidad  type=text 

  style=width:100px required='' id=moneda_nac onkeypress='return filterFloat(event,this);' 

  value=0></h6>

  <br>

  <br>

  <input type=submit name=ok2 class='btn waves-effect waves-light' style='color:black;background-color:rgb(244,219,90);

  font-size:15px;'value=Registrar onclik=radio() id=btn>

  <input type=reset class='btn waves-effect waves-light' style='color:black;background-color:rgb(244,219,90);

  font-size:15px;'value=Reiniciar>     

  </form>

  ";

  

  break;

case 'donacion':

  echo "

  

  <h5 style=font-family:Arial,Helvetica,sans-serif>Ingrese  Donacion</h5>

  <form action=../controladores/insertar_datos.php  method=post>

  <input type=hidden value=Donacion name=motivo>          

  <h6>Descripcion De Donacion : <input type=text name=descripcion_incremento maxlength=100 required='' style=width:300px placeholder='Detalle' ></h6>

  

  <h6>Cantidad : \$ <input name=cantidad  type=text 

  style=width:100px required='' id=moneda_nac onkeypress='return filterFloat(event,this);' 

  value=0></h6>

  <br>

  <br>

  <input type=submit name=ok2 class='btn waves-effect waves-light' style='color:black;background-color:rgb(244,219,90);

  font-size:15px;'value=Registrar onclik=radio() id=btn>

  <input type=reset class='btn waves-effect waves-light' style='color:black;background-color:rgb(244,219,90);

  font-size:15px;'value=Reiniciar>     

  </form>

  ";



  break;      

  





}

##fin switch

  }

 

 

  ?>

  

  

