<?php 
session_start();
$cargo=$_GET["var"];

$valor1=$_GET["dato1"];

$valor2=$_GET["dato2"];

include '../db/conexion.php';

require '../controladores/descuentos_activos.php';

$obj = new  descuentos();



if ($cargo=="Administrador") {

    $total= $obj->mostrar_descuentos($valor1,$valor2) ;



    $sql= "SELECT * FROM desc_activo WHERE fecha 

    BETWEEN '$valor1'  AND '$valor2' ;";

    $result= $conn->query($sql);

     if ($result->num_rows>0) { 

    

        echo "

        <h4>Egresos</h4>

        <h6>$total</h6>

        <table class='table'>

        <thead class=thead-light>

        <tr>

        <th scope=col>Compras De Servicio </th>

        <th scope=col>Viaticos</th>

        <th scope=col>Contrato De <br>Servicio Profesional</th>

        <th scope=col>Fecha</th>



                

        </tr>

        <hr>

        </thead>";

        while ($rows = $result->fetch_assoc()) {     

            echo "

            <tr>

            <td>\$ ".$rows["cantidad_compras"]."</td>

            <td>\$ ".$rows["cantidad_viaticos"]."</td>

            <td>\$ ".$rows["cantidad_servicio_profesional"]."</td>                        

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