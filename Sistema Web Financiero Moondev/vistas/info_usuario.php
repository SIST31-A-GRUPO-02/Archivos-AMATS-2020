<?php 
session_start();
$cargo=$_GET["var"];

$valor1=$_GET["dato1"];

$valor2=$_GET["dato2"];

include_once '../db/conexion.php';
include_once '../controladores/funciones_ayuda.php';
$obj= new  ayudas();    

if ($cargo=="Administrador") {



$sql= "SELECT nombre,SUM(ganancia_proyecto) AS ganancia,

fecha FROM pago_ganancia_miembro INNER JOIN usuario ON usuario.id_user = pago_ganancia_miembro.id_user

WHERE fecha BETWEEN '$valor1' AND '$valor2' GROUP BY nombre" ;

$result= $conn->query($sql);

 if ($result->num_rows>0) { 


    echo "

    <h4><b>Ganancias Del Mes Por Usuario</b></h4>
    <hr>
    <table class='table'>
    <thead class='amber accent-1'>
    <tr>
    <th scope=col>Nombre<br>De Usuario</th>
    <th scope=col>Ganancia</th>
    </tr>
    
    </thead>";

    while ($rows = $result->fetch_assoc()) {

    $ganancia=$rows["ganancia"];

    $ganancia=$obj->redondear_dos_decimal($ganancia);      

        echo "
        <tr>
        <td>".$rows["nombre"]."</td>
        <td>".$ganancia."</td>
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

#usuario Normal

$id = $_SESSION["id_user"];

$sql= "SELECT SUM(ganancia_proyecto) AS ganancia 

FROM pago_ganancia_miembro WHERE id_user= $id AND  fecha BETWEEN '$valor1' AND '$valor2' " ;

    $result= $conn->query($sql);

    

    if ($result->num_rows>0) { 

       echo "

       <h4 style='font-family:Arial,Helvetica,sans-serif;' class='teal-text text-darken-1'><b>Ganancias Del Mes Por Usuario</b></h4>

       <table class='table'>

       <thead class='white'>

       <tr>

       <th scope=col class='white'>Nombre<br>De Usuario</th>

       <th scope=col class='white'>Ganancia</th>

       

       </tr>

       <hr>

       </thead>";

       while ($rows = $result->fetch_assoc()) {

       $ganancia=$rows["ganancia"];

       $ganancia=$obj->redondear_dos_decimal($ganancia);      

   

           echo "

           <tr>

           <td class='white'>".$_SESSION["nombre"]."</td>

           <td class='white'>".$ganancia."</td>

           

           </tr></table>
		   <hr><br>";
       }

    }   

    else{

    echo "No Hay Registro ";

}

    #si quieres incluir fecha 

    /* $rows["fecha"] */

 

    

    

    

    







}















?>