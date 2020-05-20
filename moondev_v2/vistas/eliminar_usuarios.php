<?php 
session_start();


$var = $_GET["var"];

$user=$_GET["usuario"];



if ($var=="Eliminar") {

include '../controladores/usuario.php';

$obj=new usuario();

$cargo=$_SESSION["cargo"];

$result=false;

if ($cargo=="Administrador") {

    

$result = $obj->Eliminar_usuario($user);



/* echo "$result"; */



if ($result=="Exito") {

   echo "<center>

   

   <img src=imagenes/logos/logo1.png alt=Moondev><br>

   <label>

   <h6>Usuario Eliminado </h6>

   </label><br>

   <input type=button class=btn btn-danger light-red value=Regresar onclick=mostrar_usuario()>

   </center> ";



}

else if($result == "Permanente") {

    echo "<center>

    

 

    <img src=imagenes/logos/logo1.png alt=Moondev><br>

    

    <label>

    <h6>El Usuario Es Dueño No Se Puede Eliminar</h6>

    </label><br>

    <input type=button class=btn btn-danger light-red value=Regresar onclick=mostrar_usuario()>

    </center> ";



}



else{

        echo "<center>

     

        <img src=imagenes/logos/logo1.png alt=Moondev><br>

        

        <label>

        <h6>Error</h6>

        </label><br>

        <input type=button class=btn btn-danger light-red value=Regresar onclick=mostrar_usuario()>

        </center> ";

}

    

    





}









else{

echo    "

<h1>NO Puedes Acceder Aqui </h1>





<a href=../index.php>Click Aqui Para Regresar</a>

";





}







}



else {

header("location: ../index.php")    ;

exit;

}









?>