<?php 
       


class renta{


    function registro_renta ($usuario,$pago_cuenta,$fecha)
    {
      require_once '../modelo/crud.php';
        $object= new crud();

        $sql="INSERT INTO renta(id_user,pago_cuenta,fecha) VALUES ($usuario,$pago_cuenta,'$fecha')";
         $result  = $object ->crear_datos($sql);
            return $result;


    }
    #renta mensual
    function mostrar_renta($fecha1,$fecha2)
    {
      require_once '../modelo/crud.php';
        $object= new crud();
        
         $sql= "SELECT *  FROM renta
         WHERE fecha BETWEEN '$fecha1' AND '$fecha2'";
        $total = $object->renta_total($sql);
        
        return $total;
        
    }

}





?>