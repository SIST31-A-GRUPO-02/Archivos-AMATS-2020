

<?php 

include '../db/conexion.php';

$var = $_GET["var"];

$dato1=$_GET["dato1"];

$dato2=   $_GET["dato2"];



if ($var=="Administrador") {

include '../controladores/iva.php';

$obj = new iva();

$total = $obj->mostrar_iva_mensual($dato1,$dato2);



if ($total>0) {

  



echo"<h6>Iva A Pagar  \$ $total </h6>

<table class='table'>

<thead class=thead-light>

    <tr>

      <th scope=col>Iva De Proyectos</th>

      <th scope=col>Iva De Compras</th>

      <th scope=col>Fecha</th>

    </tr>

  </thead>";

  

$sql="SELECT * FROM iva_mensual WHERE fecha BETWEEN '$dato1' AND '$dato2'";



$result= $conn->query($sql);

if ($result->num_rows >0) {

    while($rows=$result->fetch_assoc()){

        echo"<tr>

        <td scope=col>".$rows["iva_proyecto"]."</td>

        <td scope=col>".$rows["iva_compra"]."</td>

        <td scope=col>".$rows["fecha"]."</td>

      </tr>";





    }    

    echo "</table>";

}

}

else{

  echo"  

 <h2>No Hay Registro En Ese Rango </h2>

 ";

}



















 

}

else

{









}







?>