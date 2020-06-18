<?php 
session_start();
$cargo=$_GET["var"];
$valor1=$_GET["dato1"];
$valor2=$_GET["dato2"];
include '../db/conexion.php';
include '../controladores/ventas_servicios.php';
$obj = new  ventas();
if ($cargo=="Administrador") {
    $total= $obj->total_ventas($valor1,$valor2) ;
    $sql= "SELECT * FROM ventas WHERE fecha 
    BETWEEN '$valor1'  AND '$valor2' ;";
    $result= $conn->query($sql);
     if ($result->num_rows>0) { 
        echo "
        <h4 style='font-family:Arial,Helvetica,sans-serif;'><b>Reportes De Egreso e Ingreso</b></h4>
        <h4>$total</h4>
        <table class='table'>
        <thead class='amber accent-1'>
        <tr>
        <th scope=col>Descripcion</th>
        <th scope=col>Categoria</th>
        <th scope=col>Costo</th>
        <th scope=col>Precio<br>Final (Sin Iva)</th>
        <th scope=col>Precio<br>Final (Con Iva)</th>
        <th scope=col>Fecha</th>        
        </tr>
        <hr>
        </thead>";
        while ($rows = $result->fetch_assoc()) {     
            echo "
            <tr>
            <td>".$rows["descrip_venta"]."</td>
            <td>".$rows["categoria_venta"]."</td>
            <td>".$rows["costo_proyecto"]."</td>            
            <td>".$rows["ganancia_sinIva"]."</td>            
            <td>".$rows["total_venta"]."</td>            
            <td>".$rows["fecha"]."</td>            
            </tr>";

        }

        #si quieres incluir fecha 

        /* $rows["fecha"] */

     }

        else{

            echo "No Hay Registro ";

            }

        

    

    

    }

    else{

    

    

    

    }





































?>