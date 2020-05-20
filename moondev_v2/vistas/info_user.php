

<?php 

$var = $_GET["var"];



if ($var == "Activate") {

    



    session_start();



if (isset($_SESSION["id_user"])) {

    # code...

$id_user= $_SESSION["id_user"];



include "../db/conexion.php";

$sql="SELECT * FROM usuario WHERE id_user= $id_user ";

$result = $conn->query($sql);



while($rows = $result->fetch_assoc() ){

?>

    <div class=jumbotron>

    <h5>Informacion Personal</h5>





    

  <label for=""><h5>Nombre: <input type="text" id="nom" class=input-field value='<?php echo $rows["nombre"];?>'  ></h5>  

</label>



<label for=""><h5>Nombre De Acceso: <input type="text" id="user" class=input-field value='<?php echo $rows["usuario"];?>'  ></h5>  

</label>





<label for=""><h5>Contraseña: <input type="password" id="pass" class=input-field value=''  ></h5>  

</label>



<label for=""><h5>Actualizar Contraseña: <input type="password" id="pass_new" class=input-field value=''  ></h5>  

</label>

 <br>   



 <button onclick="validar_datos_usuarios()" class="btn waves-effect amber accent-3">

 Actualizar

 </button>



    </div>

<script src='js/ajax.js'></script>





    <?php 

}

    }



    else{



        echo "<h1>Ups Algo Salio Mal................</h1> ";





    }

    

}

else{



    echo "<h1>Ups Algo Salio Mal................</h1> ";





}



    ?>