<?php 

  



class validar

{



    function sql_segura($dato)

    {

        $quitar= array("INSERT","insert","SELECT","UPDATE"

        ,"or","OR","AND", "&&","&","DELETE","||","|","select","update","delete","=",

        "'","Or","oR");

        $vocales = $quitar;

        $no = str_replace($vocales,"",$dato);

        $final = str_replace("'","",$no);

        return $final;



    }

    function validar_usuario($user,$pass)

    { 
        

        include_once  '../modelo/crud.php';

        $obj= new crud();
        
        $user= $this -> sql_segura($user);

        $pass= $this -> sql_segura($pass);

         $sql= "SELECT * FROM usuario WHERE usuario = '$user' AND pass = '$pass'";

         $result= $obj->leer_datos_user($sql);

         if ($result=="Si") {

             return "si";

         }

         else{

             return "no";

         }





    }

    







}











?>