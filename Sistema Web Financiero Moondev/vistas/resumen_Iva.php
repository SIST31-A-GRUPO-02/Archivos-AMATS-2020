

<?php 

include '../db/conexion.php';

$var = $_GET["var"];
$dato1=$_GET["dato1"];
$dato2=   $_GET["dato2"];
if ($var=="Administrador") {
include '../controladores/iva.php';

$sql="SELECT * FROM iva_mensual WHERE fecha BETWEEN '$dato1' AND '$dato2'";
$result= $conn->query($sql);
$v1=0;
if ($result->num_rows >0) {
  
  
  
  while($rows=$result->fetch_assoc()){
      $v1=$v1+$rows["iva_proyecto"];
      } 
    }
$sql="SELECT * FROM iva_egresos WHERE fecha BETWEEN '$dato1' AND '$dato2'";
$result= $conn->query($sql);
$v2=0;
if ($result->num_rows >0) {

  
  
  while($rows=$result->fetch_assoc()){
      $v2=$v2+$rows["cantidad_compras"];
      } 
    }


echo"<h4><b>IVA</b></h4>
<hr>
<table class='table'>
<thead class='amber accent-1'>
    <tr>
      <th scope=col>Iva De Proyectos</th>
      <th scope=col>Iva De Compras</th>
      <th scope=col>Iva a Pagar</th>
    </tr>

  </thead>";
  /* <th scope=col>Fecha</th> */
$suma=$v1+$v2;
       echo "<td scope=col>\$ $v1</td>";
       echo "<td scope=col>\$ $v2</td>
             <td scope=col>\$ $suma</td>";

      /* <td scope=col>".$rows["fecha"]."</td> */
    
  
    echo "
    </tr>
    </table>";



}



?>