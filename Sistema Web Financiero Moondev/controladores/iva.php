<?php 
 class iva {

function registro_iva($usuario,$iva_del_proyecto,$fecha)
{
require_once '../modelo/crud.php';
 $object= new crud();
 require_once  'funciones_ayuda.php';
 $obj2= new ayudas();
    $sql="INSERT INTO iva_mensual (id_user,iva_proyecto,fecha)
    VALUES($usuario,$iva_del_proyecto,'$fecha')";
    $object->crear_datos($sql);

}

function mostrar_iva_mensual($dato1,$dato2)
{
require_once '../modelo/crud.php';
 $object= new crud();
 require_once  'funciones_ayuda.php';
 $obj2= new ayudas();

  $sql = "SELECT * FROM iva_mensual
   WHERE fecha BETWEEN '$dato1' AND '$dato2' ";

  $result=$object->total_mensual($sql);

  

  $result=$obj2->redondear_dos_decimal($result);


  if ($result<=0) {
    return 0;
  }
  else{
    return $result;
  }
 
}




 }




?>