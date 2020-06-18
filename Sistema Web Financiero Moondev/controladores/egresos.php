<?php 
 

class egresos{

function iva_de_servicios($pagoIva_servicio,$servicio_compras)
{
    
   
    require_once 'funciones_ayuda.php'; 
    $object= new ayudas();

    if ($pagoIva_servicio=="si") {
        ##iva_compra  es el iva de las compras  si viene si
        $iva_compra=$servicio_compras-($servicio_compras/1.13);
        $iva_compra= $object ->redondear_dos_decimal($iva_compra);
      
       }
       else{
        
        $iva_compra=0;
      
       }
       return $iva_compra;
}
function retencio_renta($servicio)
{
    
require_once 'funciones_ayuda.php'; 

$object= new ayudas();

   #retencion de renta del 10 por proyecto por trabajador
$retencion_renta=($servicio*10)/100;      
$retencion_renta=$object->redondear_dos_decimal($retencion_renta);

return $retencion_renta;
}

}


?>