

<?php
session_start();
$var= $_GET["var"];



if($var=="Mostrar"){

?>







    

<?php 



require_once '../controladores/funciones_ayuda.php';

$obj2= new ayudas();

include '../db/conexion.php';

$sql="SELECT * FROM usuario WHERE estado='Activo' ";

$result = $conn->query($sql);

if ($result->num_rows>0) {

  /* <thead><tr><th colspan='4'></tr></thead> */

  echo "

  <form  method=get id=form name=form1> 

<h5>Usuarios</h5>

  <table class='table table-hover '>



<thead>

  <tr>

    <th scope=col>Selecciona</th>

    <th scope=col>Nombre</th>

    <th scope=col>Nivel<br> De Acceso</th>

    <th scope=col>Porcentaje<br>De Ganancia</th>

    <th scope=col>Nombre<br>De Acceso</th>

  </tr>

</thead>";     

$i=0;

    while($rows=$result->fetch_assoc()){

      $porc= $obj2->redondear_dos_decimal($rows["ganancia"]);

      echo "<tr>

        <td> <p>

        <label>

          <input class='with-gap' name=user type=radio id=user  value='".$rows["id_user"]."' >

          <span></span>

        </label>

      </p></td>

        <td>".$rows["nombre"]."</td>

        <td>".$rows["cargo"]."</td>

        <td>".$porc." %</td>

        <td>".$rows["usuario"]." </td>



    



       



        </tr>

        ";



    }

    echo "</table>

 

    ";

}

?>

<?php 

echo "<input type=hidden id=id_user value=".$_SESSION["id_user"].">";

?>



</div>













<?php 

}







?>