<?php 
session_start();
?>
<link rel=stylesheet href=../vistas/css/materialize.css>

<?php 



if (isset($_POST["ok1"])) {

  

######################################################################################

#inicio del boton

#descripcion Del Producto

$descripcion=$_POST["descripcion_venta"];

#precio Del Producto

$precio=$_POST["precio_venta"];  

#porcentaje de ganancia

$porcentaje_ganancia=$_POST["porcent_ganancia"];

#costo de servicio Profesional

$servicio=$_POST["servicio_profesional"];  

#compras de srvicios Luz Agua Servidores

$servicio_compras=$_POST["compras"];#pago de servicios 

#si lleva iva 

$pagoIva_servicio=$_POST["iva"];

#viaticos

$viaticos=$_POST["viaticos"];

#si es venta O servicio La venta 

$tipo_venta=$_POST["motivo"];

#fecha

$fecha=date("y-m-d");

#usuario que esta registrado actualmente

$usuario=$_SESSION["id_user"];









include_once 'ventas_servicios.php'; 



$object= new ventas();                                 





include_once 'egresos.php'; 

$object2= new egresos();                                 



#esta manda a llamar los controladores  







###################################################################################################

#inicio de procesos egresos



#proceso para el porcentaje de ganancia

 $porcent_ganancia=$object->porcentaje_ganancias($precio,$porcentaje_ganancia);

#fin





#proceso para sacar la renta del proyecto

$renta_proyecto=$object->renta_proyecto($precio , $porcent_ganancia);

#fin



#precio sin iva del proyecto

#sumatoria del porcentaje de ganancia + la renta + precio

$precio_sin_iva=$object->precio_sin_iva($precio,$porcent_ganancia,$renta_proyecto);

#fin



#iva del proyecto

$iva_proyecto=$object->iva_proyecto($precio_sin_iva);

#fin





#precio final con iva incluido

$precio_final=$object->precio_final($iva_proyecto,$precio_sin_iva);

#fin



#metemos a la base de datos los datos de la venta 

$object->registrar_venta($usuario,$tipo_venta,

$descripcion,$precio,$porcent_ganancia,$precio_sin_iva,

$precio_final,$fecha)

;



#fin





#metemos el activo o en este caso el precio sin iva SI ese es el activo de la venta 

$object->activos($usuario,$precio_sin_iva,$fecha);

#fin

#fin procesos de ingresos

###################################################################################################



###################################################################################################

#inicio proceso egresos





#analiso la condicion si vienen los servicios de compra (luz,agua,servidores)con Iva

$iva_compra= $object2 ->iva_de_servicios($pagoIva_servicio,$servicio_compras);



  #fin



#proceso de servicio contratado por algun profesional externo de la empresa (especialista, o n asesor de algo )

$retencion_renta=$object2->retencio_renta($servicio);

#activo que saldra de la empresa

$cobro_profesional=$servicio-$retencion_renta;

#fin





#mandamos el iva de este proyecto con el iva de las compras 

include 'iva.php';

$control_iva= new iva();

$control_iva->registro_iva($usuario,$iva_proyecto,$iva_compra,$fecha);



#fin



#mandamos la renta de este proyceto

include 'renta.php';

$control_renta= new renta();

$info = $control_renta->registro_renta($usuario,$retencion_renta,$renta_proyecto,$fecha);



#fin



#mandamos los descuentos de capital o descuentos de activos

include 'descuentos_activos.php';

$control_desc = new descuentos();

$control_desc->desc_activos($usuario,$servicio_compras,

$viaticos,$cobro_profesional,$fecha);



#fin



#pago por ganancia a los empleados



$ganancia=($porcent_ganancia+$precio)/2;

$control_desc->pago_ganancia($ganancia,$fecha);

#fin proceso egresos

###################################################################################################





echo "<div class=container>

      <br>

      <br>

      <h3>Registro Hecho exitosamente</h3>

      <form method=post>

     <a href=../index.php> <input type=button class='btn btn-danger' name=ok60 value=Regresar>  </a>

      </form>

      </div>

";





  }

  ##########################################################################################

 elseif (isset($_POST["ok2"])) {

#descripcion del incremento

  $descrip_incremento = $_POST["descripcion_incremento"];

#canditada de dinero a incrementar

  $cantidad = $_POST["cantidad"];

#motivo de incremento

  $motivo  = $_POST["motivo"];

  #fecha actual

  $fecha=date("Y-m-d");

  #Mandamos a llamra al usuario 

  $usuario=$_SESSION["id_user"];

 #incluimos controlador 

 include 'incremento.php';

 $object= new incremento();



 $object->incremento_capital($usuario,$descrip_incremento,$motivo,$cantidad,$fecha);



 echo "<div class=container>

      <br>

      <br>

      <h3>Registro Hecho exitosamente</h3>

      <form method=post>

     <a href=../index.php> <input type=button class='btn btn-danger' name=ok60 value=Regresar>  </a>

      </form>

      </div>

";



 }

 else{

  header("location: ../index.php");

  exit;

 }



?>