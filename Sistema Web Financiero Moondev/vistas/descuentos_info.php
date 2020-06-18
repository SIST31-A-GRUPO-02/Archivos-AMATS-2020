<?php 
session_start();
$cargo=$_GET["var"];
$valor1=$_GET["dato1"];
$valor2=$_GET["dato2"];
$v1=0;
$v2=0;
$v3=0;

include '../db/conexion.php';
require '../controladores/descuentos_activos.php';
$obj = new  descuentos();
if ($cargo=="Administrador") {
/*  $total= $obj->mostrar_descuentos($valor1,$valor2) ; */
    $sql= "SELECT * FROM desc_activo WHERE fecha 
    BETWEEN '$valor1'  AND '$valor2' ;";
    $result= $conn->query($sql);
     if ($result->num_rows>0) { 

        while ($rows = $result->fetch_assoc()) {     
           $v1=$v1+$rows["cantidad_compras"];
           $v2=$v2+$rows["cantidad_viaticos"];
           $v3=$v3+$rows["cantidad_servicio_profesional"];            
        }
     }
     echo "
          <h4 style='font-family:Arial,Helvetica,sans-serif;'><b>Egresos</b></h4>
     <table class='table'>
     <thead class='amber accent-1'>
     <tr>
     <th scope=col>Compras De Servicio </th>
     <th scope=col>Viaticos</th>
     <th scope=col>Gasto De <br>Servicio Profesional</th>
     </tr>
     <hr>
     </thead>";

     echo " <tr>
            <td>\$ $v1 </td>
            <td>\$ $v2 </td>
            <td>\$ $v3 </td>                        
            </tr>
			</table>
			"
			;

    }
?>