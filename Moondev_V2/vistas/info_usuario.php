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

    <h4 >Ganancias Del Mes Por Usuario</h4>

    <table class='table'>

    <thead class=thead-light>

    <tr>

    <th scope=col>Nombre<br>De Usuario</th>

    <th scope=col>Ganancia</th>

    

    </tr>

    <hr>

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

       <h4>Ganancias Del Mes Por Usuario</h4>

       <table class='table'>

       <thead class=thead-light>

       <tr>

       <th scope=col>Nombre<br>De Usuario</th>

       <th scope=col>Ganancia</th>

       

       </tr>

       <hr>

       </thead>";

       while ($rows = $result->fetch_assoc()) {

       $ganancia=$rows["ganancia"];

       $ganancia=$obj->redondear_dos_decimal($ganancia);      

   

           echo "

           <tr>

           <td>".$_SESSION["nombre"]."</td>

           <td>".$ganancia."</td>

           

           </tr>";

       }

    }   

    else{

    echo "No Hay Registro ";

}

    #si quieres incluir fecha 

    /* $rows["fecha"] */

 

    

    

    

    







}















?>