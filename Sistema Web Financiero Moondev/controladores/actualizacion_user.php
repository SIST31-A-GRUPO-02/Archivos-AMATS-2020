<?php 
session_start();

$dato1=$_GET["dato1"];

$dato2=$_GET["dato2"];

$dato3=$_GET["dato3"];

$dato4=$_GET["dato4"];



if (isset($_SESSION["id_user"])) {

include_once "../modelo/crud.php";

$obj = new crud();

$id_user=$_SESSION["id_user"];



if ($dato4=="") {

    $sql="SELECT * FROM usuario WHERE id_user = $id_user; ";

    $user1= $obj->comprobar_usuario($sql);

    $sql="SELECT * FROM usuario WHERE usuario = '$dato2'; ";

    $user2= $obj->comprobar_usuario($sql);

    

    if ($user1==$dato2) {

        $sql="UPDATE usuario SET nombre='$dato1',pass='$dato3',usuario='$dato2'

        WHERE usuario= '$user1' AND pass='$dato3';";

        $result= $obj->actualizar_datos($sql);

        if ($result=="Hecho") {
            $_SESSION["nombre"]=$dato1;
            $_SESSION["usuario"]=$dato2;

            echo"<h1>Registro Hecho</h1>
            
            <button class=btn onclick='redireccionar2()'>

            Regresar</button>";


        }

        else{

            echo"<h1>No Se Registro Ningun Cambio</h1>

            <button class=btn onclick='redireccionar2()'>

            Regresar</button>";

        }

    }

    else if ($dato2==$user2) {

            echo"<h2>El Usuario Ya Existe Elija Otro  </h2>

            <button class=btn onclick='redireccionar2()'>

            Regresar</button>";

        }





    else if($user1=="No Existe"){

        echo"<h2>Algo Salio Mal...  </h2>

        <button class=btn onclick='redireccionar2()'>

        Regresar</button>";

    }

    else {

            $sql="UPDATE usuario SET nombre='$dato1',pass='$dato3',usuario='$dato2'

            WHERE usuario= '$user1' AND pass='$dato3'";

            $result= $obj->actualizar_datos($sql);

            if ($result=="Hecho") {
            $_SESSION["nombre"]=$dato1;
            $_SESSION["usuario"]=$dato2;


                echo"<h1>Registro Hecho</h1>

                <button class=btn onclick='redireccionar2()'>

                Regresar</button>";

            }

            else{   

                echo"<h1>No Se Registro Ningun Cambio</h1>

                <button class=btn onclick='redireccionar2()'>

                Regresar</button>";

            }   



        }



    }

    



else

{





    $sql="SELECT * FROM usuario WHERE id_user = $id_user AND pass='$dato3'";

    $user1= $obj->comprobar_usuario($sql);

    $sql="SELECT * FROM usuario WHERE usuario = '$dato2' ";

    $user2= $obj->comprobar_usuario($sql);

    

    if ($user1==$dato2) {

        $sql="UPDATE usuario SET nombre='$dato1',pass='$dato4',usuario='$dato2'

        WHERE usuario= '$user1' AND pass='$dato3';";

        $result= $obj->actualizar_datos($sql);

        if ($result=="Hecho") {
        
            $_SESSION["nombre"]=$dato1;
            $_SESSION["usuario"]=$dato2;


            echo"<h1>Registro Hecho</h1>

            <button class=btn onclick='redireccionar2()'>

            Regresar</button>";

        }

        else{

            echo"<h1>No Se Registro Ningun Cambio</h1>

            <button class=btn onclick='redireccionar2()'>

            Regresar</button>";

        }

    }

        else if ($dato2==$user2) {

            echo"<h2>El Usuario Ya Existe Elija Otro  </h2>

            <button class=btn onclick='redireccionar2()'>

            Regresar</button>";

        }

        else {

            $sql="UPDATE usuario SET nombre='$dato1',usuario='$dato2',pass='$dato4'

            WHERE usuario= '$user1' AND pass='$dato3';";

            $result= $obj->actualizar_datos($sql);

            if ($result=="Hecho") {
            $_SESSION["nombre"]=$dato1;
            $_SESSION["usuario"]=$dato2;


                echo"<h1>Registro Hecho</h1>

                <button class=btn onclick='redireccionar2()'>

                Regresar</button>";

            }

            else{

                echo"<h1>No Se Registro Ningun Cambio</h1>

                <button class=btn onclick='redireccionar2()'>

                Regresar</button>";

            }

             

        }



    }



}









else{

     echo"<h2>Ups... Error </h2>
       
            <button class=btn onclick='redireccionar2()'>

            Regresar</button>";

}











?>