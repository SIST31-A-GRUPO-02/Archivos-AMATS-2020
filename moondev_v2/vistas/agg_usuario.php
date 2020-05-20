<?php 
session_start();
$var = $_GET["var"];

 if ($var == "Mostrar")

{

  require '../controladores/usuario.php';

$obj = new usuario();

$max=$obj->porcentaj_ganancia();



?>

 <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

<br>

<center>

<div class='jumbotron col-8' align=left >



 <?php 

 

if ($max<10) {

  echo "

  <center>

 

 <img src=imagenes/logos/logo1.png alt=Moondev><br>

 



 <label>

 <h6>EL Porcentaje de Ganancia De Los Dueños Es Menor al 10% 

Actualize Porcentajes De Algunos Socios Para Poder Agregar Nuevos Socios</h6>

 </label>

 <input type=button class=btn btn-danger light-red value=Regresar onclick=mostrar_usuario()>

 </center> ";

 

} 

else{ 

 ?>





<center>



<img src=imagenes/logos/logo1.png alt=Moondev><br>

<input type=button class=btn btn-danger light-red value=Regresar onclick=mostrar_usuario()>

</center>

<form action="../controladores/insertar_usuarios.php" method="post"

 id=form1 onsubmit="return enviar_usuario()">

<h5>Ingrese Nombre : <input type="text" name="nom" placeholder="Nombre" required=''

maxlength=100></h5>

<h5>Usuario : <input type="text" name="user" placeholder="usuario" maxlength=50

required='' >

<label id=label1></label>

</h5>

<h5>Contraseña : <input type="text" name="pass" placeholder="Contraseña Temporal"

maxlength=50 required=''></h5>



<h5>Porcentaje de ganancia: 

<?php 





echo"<input type=number name=porcentaje min=0.00 max=$max required='' >";



?>    



<h5>Nivel De Acceso</h5>

<p>

    <label>

      <input class="with-gap" name="acceso" type="radio" value="Administrador" >

      <span>Administrador</span>

    </label>

  </p>

    

  <p>

    <label>

      <input class="with-gap" name="acceso" type="radio" value="Normal" checked >

      <span>Usuario Normal</span>

    </label>

  </p>

  









</h5>

<input type="reset" value="Limpiar Campos"  class="btn btn-danger light-black" >



<input type="submit" class="btn btn-danger light-green" value="Registrar Usuario">

</form>

  

</center>









</div>







<?php 

#FIN DE MAX 

}





}

else

{



}



?>