<?php 
session_start();
$cargo=$_GET["var"];
$valor1=$_GET["dato1"];
$valor2=$_GET["dato2"];
$v1=0;
$v2=0;
$v3=0;

include '../db/conexion.php';

if ($cargo=="Administrador") {
/*  $total= $obj->mostrar_descuentos($valor1,$valor2) ; */
    $sql= "SELECT * FROM incrementos WHERE motivo='Incremento De Capital' AND fecha 
    BETWEEN '$valor1'  AND '$valor2'  ;";
    $result= $conn->query($sql);
     if ($result->num_rows>0) { 

        while ($rows = $result->fetch_assoc()) {     
           $v1=$v1+$rows["cantidad"];
           
        }
     }

     $sql= "SELECT * FROM incrementos WHERE motivo='Donacion' AND fecha 
    BETWEEN '$valor1'  AND '$valor2'  ;";
    $result= $conn->query($sql);
     if ($result->num_rows>0) { 

        while ($rows = $result->fetch_assoc()) {     
           $v2=$v2+$rows["cantidad"];
           
        }
     }
     $v3=$v1+$v2;
     echo "
     <h4 style='font-family:Arial,Helvetica,sans-serif;'><b>Incrementos</b></h4>
     <table class='table'>
     <thead class='amber accent-1'>
     <tr>
     <th scope=col>Incremento <br> De Capital</th>
     <th scope=col>Donaciones</th>
     <th scope=col>Total De Incrementos</th>
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