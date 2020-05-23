<?php

class crud

{

    

function __construct()

    {

      

    }





function crear_datos($sql)

{

   

    include '../db/conexion.php';







    if($result = $conn->query($sql)==true)

    {

        return "Hecho";

    }

    else{

        return "No";

    }



}

function actualizar_datos($sql)

{

    include '../db/conexion.php';

    $result = $conn->query($sql);

    $result= $conn->affected_rows;

    if ($result>0) {

        return "Hecho";

    }

    else{

        return "No";

    }











}

function eliminar_datos($sql)

{

    include '../db/conexion.php';



    if($result=$conn->query($sql)==true){



        return "Exito";

    }

    else{

        return "No Exito";

    }







}





#SCRIPT DE CONSULTA PERSONALISADA

#usuarios

#retornar cargo

function cargo($sql)

{

    include '../db/conexion.php';

    $result = $conn->query($sql);

    

    if($result->num_rows>0)

    {

   while ($rows =$result->fetch_assoc()) {

       $resp=$rows["socio"];

     }

     return $resp;    

        

    }

 

 

    

}



#Comprobar Usuario

function comprobar_usuario($sql)

{

   include '../db/conexion.php';

   $result = $conn->query($sql);

   

   

   

   if($result->num_rows>0)

   {

  while ($rows =$result->fetch_assoc()) {

      $resp=$rows["usuario"];

    }



    return $resp;

   }

   else{

       return "No Existe";

   }







}









function actualizacion_porcentaje_x_usuario_duenos($sql,$porcentaje_a_introd)

{   

    include '../controladores/funciones_ayuda.php';

    $obj1=  new ayudas();

    include '../db/conexion.php';

    $result= $conn->query($sql);

    

    if ($result->num_rows>0) {

        while ($rows = $result->fetch_assoc() ) {

            $redondeo=$obj1->redondear_dos_decimal($rows["ganancia"]);

            $porcentaje_a_introd=$obj1->redondear_dos_decimal($porcentaje_a_introd);

            $suma=$porcentaje_a_introd+$redondeo;

            

            $usuario=$rows["id_user"];



            $sql="UPDATE usuario SET ganancia = $suma WHERE id_user = $usuario";

            $new_query=$conn->query($sql);

            

            

    

            





        }

       return "Exito";



    }

    else{

        return "No se hizo La consulta";

    }

    





}





#para quitar un porcentej de un usuario

function porcentaje_x_usuario($sql)

{   $total=0;

    include '../db/conexion.php';

    $result= $conn->query($sql);

    

    if ($result->num_rows>0) {

        while ($rows = $result->fetch_assoc() ) {

            $total=$rows["ganancia"];

        }

        return $total;

    }

    











}





#porcentaje de los usuarios 

function porcentaje($sql)

{   $total=0;

    include '../db/conexion.php';

    $result= $conn->query($sql);

    

    if ($result->num_rows>0) {

        while ($rows = $result->fetch_assoc() ) {

            $total=$rows["total"];

        }



    }

    else{

        $total=0;

    

    }

    return $total;











}





function actualizar_porcentaje($sql)

{  

    include '../db/conexion.php';

     $conn->query($sql);

    $result= $conn->affected_rows;

    if ($result>0) {

        return "Registro Actualizado";

    }

    else{

        return "Registro No Actualizado";    

    

    }

    











}









#fin Usuarios



#descuentos

function total_descuentos($sql)

{

    include '../db/conexion.php';





    $total=0;

    $total2=0;

    $total3=0;





    $result = $conn->query($sql);

   if ($result -> num_rows>0) {

       

        while($rows=$result->fetch_assoc()){

            $total=$total+$rows["cantidad_compras"];

            $total2=$total2+$rows["cantidad_viaticos"];

            $total3=$total3+$rows["cantidad_servicio_profesional"];





        }

    }  

    

        return "Total De Servicios: \$ $total<br>

                Total De Viaticos : \$ $total2<br>

                Total De Pago Por Servicio<br>

                Profesional: \$  $total3";

    

     

}

#mostrar Datos De iva mensual 

#funcion de iva a pagar mensual 

function total_mensual($sql)

{

    include '../db/conexion.php';





    $total=0;

    $result = $conn->query($sql);

   if ($result -> num_rows>0) {

       

        while($rows=$result->fetch_assoc()){

            $total=$total+$rows["iva_proyecto"];

        }

    }  

    

        return $total;

    

     

}

#total de ganancia 

function  ganancia_mensual_venta($sql)

{

    include '../db/conexion.php';





    $total=0;

    



    $result = $conn->query($sql);

   if ($result -> num_rows>0) {

       

        while($rows=$result->fetch_assoc()){

            

            $total=$total+$rows["ganancia_sinIva"];

            



        }

    }  

    

        return $total ;

   



}



function  costo_finales($sql)

{

    include '../db/conexion.php';





    $total=0;

    



    $result = $conn->query($sql);

   if ($result -> num_rows>0) {

       

        while($rows=$result->fetch_assoc()){

            

            $total=$total+$rows["costo_proyecto"];

            



        }

    }  

    

        return $total ;

   



}

function  viaticos_finales($sql)

{

    include '../db/conexion.php';





    $total=0;

    



    $result = $conn->query($sql);

   if ($result -> num_rows>0) {

       

        while($rows=$result->fetch_assoc()){

            

            $total=$total+$rows["cantidad_viaticos"];

            



        }

    }  

    

        return $total ;

   



}

#funcion de renta total mensual

function renta_total($sql)

{

    

    

    include '../db/conexion.php';





    $total=0;

    $total2=0;



    $result = $conn->query($sql);

   if ($result ->num_rows>0) {

       

        while($rows=$result->fetch_assoc()){

            $total=$total+$rows["cantidad_retencion_profesional"];

            $total2=$total2+$rows["pago_cuenta"];



        }

    }  

    

        return "Total De Retencion: \$ $total <br>

                   Total De Renta: \$ $total2";

   

     







}







#crear Codigo Y Validar Usuario Login

function leer_datos_user($sql)

{

    

    include '../db/conexion.php';

 /* $dominio= "moondevfinanciero.000webhostapp.com";  */

   # $dominio= "localhost";



    $result =$conn->query($sql);

    if ($result ->num_rows>0) {

    while($rows= $result->fetch_assoc()){

       

$r1=$rows["id_user"];

$r2=$rows["nombre"];

$r3=$rows["cargo"];

$r4=$rows["usuario"];



         }

       

           $_SESSION["id_user"]=$r1;

         $_SESSION["nombre"]=$r2;

         $_SESSION["cargo"]=$r3;

         $_SESSION["usuario"]=$r4;

         

         

 





    return "Si";

}

else{

    return "No";

}



}



#fin de la clase

}





?>