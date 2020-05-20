<?php 
session_start();
$cargo=$_GET["var"];

$valor1=$_GET["dato1"];

$valor2=$_GET["dato2"];



if($cargo=="Administrador"){

#inicio del menu del admin

include '../controladores/renta.php';

$obj = new renta();

$total= $obj->mostrar_renta($valor1,$valor2);

include '../db/conexion.php';

$sql= "SELECT *  FROM renta

WHERE fecha BETWEEN '$valor1' AND '$valor2'";

$result = $conn->query($sql);

        if ($result->num_rows >0) {

            echo " $total

<table class='table'>

<thead class=thead-light>

<tr>

<th scope=col>Cantidad De Retencion</th>

<th scope=col>Pago A Cuenta</th>

<th scope=col>Fecha</th>

</tr>

</thead>";

            while($rows = $result->fetch_assoc()){

            echo"<tr>

            <td>".$rows["cantidad_retencion_profesional"]."</td>

            <td>".$rows["pago_cuenta"]."</td>

            <td>".$rows["fecha"]."</td>

            </tr>";

             }





        }

        else{

            echo "No Hay Registros ";

        }

        











#fin del menu 

}

else{

#inicio del menu del cualquier usuario 









#fin del menu 

}



?>