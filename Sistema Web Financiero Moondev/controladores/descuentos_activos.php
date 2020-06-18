<?php 

class descuentos{

function desc_activos($id_user,$compras,$viaticos,$servicio_profesional,$fecha,$retencion,$ivaCompras)
{   
require_once '../modelo/crud.php';
  $object = new crud();
  
 
    $sql=" INSERT INTO desc_activo (id_user,cantidad_compras,cantidad_viaticos,cantidad_servicio_profesional,fecha) VALUES ($id_user,$compras,$viaticos,$servicio_profesional,'$fecha');";
    $result = $object->crear_datos($sql);
    
    if($result=="Hecho"){
      $sql=" INSERT INTO egresos_renta (id_user,retencion_renta,fecha) VAlUE ($id_user,$retencion,'$fecha');";
      $result = $object->crear_datos($sql);
      if ($result=="Hecho") {
        $sql=" INSERT INTO iva_egresos (id_user,cantidad_compras,fecha) VAlUE ($id_user,$ivaCompras,'$fecha');";
        $result = $object->crear_datos($sql);
        if ($result=="Hecho") {
          return "Exito";
        }
        else{
          echo "Algo salio mal al meter el Iva ";
        }
      }
      else{
      echo "Algo salio mal al meter la renta ";
      }
    }
    else{
      echo"Algo salio mal al meter todo el descuento";
    }

}


#mostrar descuentos

function mostrar_descuentos($fecha1,$fecha2)
{

require_once '../modelo/crud.php';
  $object = new crud();
  
$sql="SELECT * FROM desc_activo WHERE fecha BETWEEN '$fecha1' AND '$fecha2' ; ";
$result=$object->total_descuentos($sql);
 return $result;



}



function pago_ganancia($ganancia,$fecha)
{ 
 
require_once '../modelo/crud.php';
  $object = new crud();

require_once 'funciones_ayuda.php';
  $ctrl_ayudas = new ayudas();

include '../db/conexion.php';
    
   
    
    
    $sql="SELECT * FROM usuario WHERE estado='Activo'";
    $result= $conn->query($sql);
     
    if ($result->num_rows > 0) {
    
    $i=0; #iteraciones para los arreglos
        while ($rows = $result->fetch_assoc()) {
            $id_user[$i]=$rows["id_user"];
            $cantidad_miembros[$i]=$rows["ganancia"];
            $i=$i+1;
        }
     #para que crezca  1 en 1 y se asigne un indice al proceso de arriba 
    }   
    
for ($i=0; $i < count($id_user) ; $i++) { 

    $ganancia_persona= ($ganancia*$cantidad_miembros[$i])/100;
    $ganancia_persona=$ctrl_ayudas->redondear_dos_decimal($ganancia_persona);
    $sql="INSERT INTO pago_ganancia_miembro (id_user,ganancia_proyecto,fecha)
      VALUES(".$id_user[$i].",$ganancia_persona,'$fecha');";

    $object->crear_datos($sql);


}


}

    
}










?>