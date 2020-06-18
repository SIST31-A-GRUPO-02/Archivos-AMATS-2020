<?php 
session_start();
$cargo=$_GET["var"];
$valor1=$_GET["dato1"];
$valor2=$_GET["dato2"];
if($cargo=="Administrador"){
#inicio del menu del admin
include '../controladores/renta.php';
/* $obj = new renta();
$total= $obj->mostrar_renta($valor1,$valor2); */
$v1=0;
$v2=0;

include '../db/conexion.php';
$sql= "SELECT *  FROM renta WHERE fecha BETWEEN '$valor1' AND '$valor2'";
$result = $conn->query($sql);
        if ($result->num_rows >0) {
            while($rows = $result->fetch_assoc()){
                $v1=$v1+ $rows["pago_cuenta"];
            /*     <td>".$rows["fecha"]."</td>
                </tr>";     */ 
                 }
            }
$sql= "SELECT * FROM egresos_renta WHERE fecha BETWEEN '$valor1' AND '$valor2'";
$result = $conn->query($sql);
        if ($result->num_rows >0) {
            while($rows = $result->fetch_assoc()){    
                $v2=$v2+ $rows["retencion_renta"];
                 }
            }
    $total=$v1+$v2;
echo "<h4><b>Renta</b></h4>
<hr>
<table class='table'>
<thead class='amber accent-1'>
<tr>
<th scope=col>Renta De Contratos</th>
<th scope=col>Renta De Proyectos</th>
<th scope=col>Total A Pagar</th>
</tr>
</thead>
<tr>
<td>\$ $v2</td>
<td>\$ $v1</td>
<td>\$ $total</td>
</tr>
</table>
";
#fin del menu 
}
else{
#inicio del menu del cualquier usuario 

#fin del menu 
}

?>