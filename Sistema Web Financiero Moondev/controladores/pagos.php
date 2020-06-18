<?php 

class pagos
{
    
    function ganancias($fch1,$fch2)
    {
     include_once "../modelo/crud.php"; 
     $obj = new crud();
     $sql="SELECT * FROM ventas WHERE fecha BETWEEN '$fch1' AND '$fch2'";
     $total=$obj->ganancia_mensual_venta($sql);
     return $total;
    }

    
    function costos($fch1,$fch2)
    {
     include_once "../modelo/crud.php"; 
     $obj = new crud();
     $sql="SELECT * FROM ventas WHERE fecha BETWEEN '$fch1' AND '$fch2'";
     $total=$obj->costo_finales($sql);
     return $total;
    }

    function viaticos($fch1,$fch2)
    {
     include_once "../modelo/crud.php"; 
     $obj = new crud();
     $sql="SELECT * FROM desc_activo WHERE fecha BETWEEN '$fch1' AND '$fch2'";
     $total=$obj->viaticos_finales($sql);
     return $total;
    }


}




?>