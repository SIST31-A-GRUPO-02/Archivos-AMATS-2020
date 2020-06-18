<?php 
class usuario
{
    function eliminar_usuario($usuario)
    {
        require_once  '../modelo/crud.php';
        $obj = new crud();

        $sql= "SELECT * FROM usuario WHERE id_user=$usuario";
        $socio =$obj->cargo($sql);

        if ($socio=="Permanente") {
            return $socio;
        }   
        else{

        $cantidad= self::solo_duenos();
        $sql="SELECT * FROM usuario WHERE id_user=$usuario";
        $porcentaje=$obj->porcentaje_x_usuario($sql);
        $actualizacion1=$porcentaje/$cantidad;
        $sql="SELECT * FROM usuario WHERE socio='Permanente'";
        $actualizacion2=$obj->actualizacion_porcentaje_x_usuario_duenos($sql,$actualizacion1);
        if ($actualizacion2=="Exito") {
            $sql="UPDATE usuario SET estado='Inactivo',ganancia = 0,usuario= NULL WHERE id_user=$usuario";
            $result = $obj->eliminar_datos($sql);
            if ($result=="Exito") {
                return "Exito";
            }
            else{

                return "No Exito";

            }
        }
        else{
            return "Error";
        }
        

    }

    }
    function comprobar_usuario($new_usuario)
    {
    
        require_once  '../modelo/crud.php';
        $obj = new crud();
        $respuesta="";
        $sql="SELECT * FROM usuario WHERE usuario = '$new_usuario' ;";
        $respuesta=$obj->comprobar_usuario($sql);

        
 
        return $respuesta;
 
 
    }


   function porcentaj_ganancia()
   {
       require_once  '../modelo/crud.php';
       $obj = new crud();
       $total=0;
       $sql="SELECT SUM(ganancia) AS total FROM usuario WHERE socio = 'Permanente' ;";
       $total=$obj->porcentaje($sql);

       return $total;


   }

   function solo_duenos()
   {   $total=0;
       include  '../db/conexion.php';
       $sql="SELECT COUNT(*) AS cantidad FROM usuario WHERE socio = 'Permanente' ";
       $result= $conn->query($sql);
       
       if ($result->num_rows>0) {
           while ($rows = $result->fetch_assoc() ) {
               $total=$rows["cantidad"];
           }
   
       }
       else{
           $total=0;
       
       }
       return $total;
         

   }

   function actualizar_porcentaje($porcentaje_duenos)
   {
    require_once '../modelo/crud.php';
    $obj = new crud();
    $sql="UPDATE 
    usuario SET ganancia = $porcentaje_duenos
    WHERE socio = 'Permanente' ;";
       
       $result = $obj->actualizar_porcentaje($sql);

    return $result;

   }
   function nuevo_socio($usuario,$nombre,$pass,$cargo,$porcentaje,$socio,$estado)
   {
       require_once  '../modelo/crud.php';
    $obj = new crud();
    $sql="INSERT INTO usuario (usuario,nombre,pass,cargo,ganancia,socio,estado)
    VALUES ('$usuario', '$nombre','$pass','$cargo',$porcentaje,'$socio','$estado')";
       
       $result = $obj->crear_datos($sql);

    return $result;
      
   }

}

?>