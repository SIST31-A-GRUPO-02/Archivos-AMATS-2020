<?php 
 
class incremento {


function incremento_capital($usuario,$descrip,$motivo,$ganancia,$fecha)
{
      include '../modelo/crud.php';
      $object = new crud();
     
    $sql="INSERT INTO incrementos (id_user,descripcion_incremento,motivo,cantidad,fecha)
          VALUES ($usuario,'$descrip','$motivo',$ganancia,'$fecha');" ;   

    $result= $object -> crear_datos($sql);
     echo "$result";
      

}









}


?>