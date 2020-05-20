<?php  
require   'funciones_Ayuda.php'; 
class ventas extends ayudas
{
    
    function porcentaje_ganancias($precio , $porcent_ganancia)
    {

        
        
        $porcent_ganancia=($precio * $porcent_ganancia)/100;
        $porcent_ganancia= $this->redondear_dos_decimal($porcent_ganancia);
        

        
        return $porcent_ganancia;
   
}
function renta_proyecto($precio , $porcent_ganancia)
{   
    /* include ("funciones_ayuda.php");  */


    $renta_proyecto=(($precio + $porcent_ganancia)*1.75)/100;
    $renta_proyecto=$this->redondear_dos_decimal($renta_proyecto);
    
    return $renta_proyecto;
}

function precio_sin_iva($precio,$porcent_ganancia,$renta_proyecto)
{   
 /*    include ("funciones_ayuda.php");  */
 
        $precio_sin_iva=$precio+$porcent_ganancia+$renta_proyecto;
        $precio_sin_iva=$this->redondear_dos_decimal($precio_sin_iva);
        
    
    return $precio_sin_iva;
}

function iva_proyecto($precio_sin_iva)
{   

    /* include ("funciones_ayuda.php");  */
    
    $iva_proyecto=($precio_sin_iva*13)/100;
    $iva_proyecto=$this->redondear_dos_decimal($iva_proyecto);
    
    return $iva_proyecto;
}

function precio_final($iva_proyecto,$precio_sin_iva)
{
 
    $precio_final=$iva_proyecto+$precio_sin_iva;

    return  $precio_final;

}
#####################################################################################
###########Ingreso a la base de datos###############################################


function registrar_venta($id_user,$motivo,
$descripcion,$precio,$porcent_ganancia,$precio_sin_iva,
$precio_final,$fecha)
{   
    require_once '../modelo/crud.php';

    $object= new crud();
    
    $sql="INSERT INTO ventas (id_user,categoria_venta,descrip_venta,costo_proyecto,ganancia_porcentaje,
    ganancia_sinIva,total_venta,fecha)
      VALUES
        ($id_user,'$motivo','$descripcion',$precio,$porcent_ganancia,$precio_sin_iva,$precio_final,
        '$fecha');";

        $object->crear_datos($sql);
            
}
function activos ($usuario,$precio_sin_iva,$fecha)
{

    
    require_once '../modelo/crud.php';
    $object= new crud();
    
   
    $sql="INSERT INTO  activos (id_user,cantidad,fecha)
    VALUES ($usuario,$precio_sin_iva,'$fecha')";
    
    $object->crear_datos($sql);

}

 function total_ventas($fecha1,$fecha2)
 {


    
    require_once '../modelo/crud.php';
    $object= new crud();
    
   
    $sql="SELECT * FROM ventas WHERE fecha BETWEEN '$fecha1'  AND '$fecha2'; ";
    
    $result = $object->ganancia_mensual_venta($sql);

    return " Ganancia Del Mes (Sin Iva) : \$ $result";



 }


/* $sql="SELECT * FROM usuarios "; 
$result=$conn->query($sql);
 */





}




/* 
   //iva 13%
    //renta 10%
    //1.75
vendemos un sistema de 1000 dolares
de ese sisteme se sacan viaticos gasto d una licencia comida pasaje etc 
digamos que gastamos 300
el total de la venta es 
1300

despues de eso nos dicen que ellos de eso parte todo
de esos 1300 tengo que descontar IVA,REnta y 1.75 % de algo que no me acuerdo
 de lo que resta nos dijeron que de eso se divide entre 2
1 parte va para un  activo corriente y la otra es la ganancia de ellos 
cuando ya paso todo eso ellos quieren ver un cuanto de iva tienen mensual cuanto es la renta como estan los acitvos los pasivos y como esta el capital
 luego quieren ver un resumen de ventas ose alo que an vendido etc  */
 


?>