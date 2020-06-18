<?php 
session_start();
?>
<link type=text/css rel=stylesheet href=../vistas/css/materialize.css>

<link type=text/css rel=stylesheet href=../vistas/css/bootstrap.css>

<?php 



if (isset($_SESSION["id_user"]) && isset($_SESSION["cargo"])) {

    $cokie=$_SESSION["cargo"];

    if ($cokie=="Administrador") {

    require_once 'usuario.php';

    $obj=new usuario();

   

    

    $nombre= $_POST["nom"];

    $usuario= $_POST["user"];

    $pass= $_POST["pass"];

    $acceso= $_POST["acceso"];

    $porcentaje=$_POST["porcentaje"];

   

    $comprobar_usuario=$obj->comprobar_usuario($usuario);



if ($comprobar_usuario==$usuario) {

    echo " <br>

    <div class=container>

    <div class=jumbotron style='border-radius:20px;'>

    <center><h5 style='font-family:Arial,Helvetica,sans-serif;' class='teal-text text-darken-1'><b>El Usuario ya existe</b></h5><br>

    <a href=../vistas/socios.php>

    <img src='../vistas/imagenes/iconos/c.ico' class='responsive-img' width=80px height=80px> 

    </a></center>

    </div>

    </div>

    

  ";

}

else{

    $cantidad_duenos= $obj->solo_duenos();



    $pocentaje_duenos = $obj ->porcentaj_ganancia();

    $pocentaje_duenos= ($pocentaje_duenos - $porcentaje)/$cantidad_duenos;

   

    $result=$obj->actualizar_porcentaje($pocentaje_duenos);



/*     INSERT INTO usuario (usuario,nombre,pass,cargo,ganancia,socio,estado)

    VALUES ('usuario', 'nombre','pass','cargo','ganancia','socio','estado')

 */    

        if ($result=="Registro Actualizado") {

            $result= $obj->nuevo_socio($usuario,$nombre,$pass,$acceso,$porcentaje,'Temporal','Activo');

            if ($result=="Hecho") {

                echo "

                <br>
				<div class=container>

                <div class=jumbotron style='border-radius:20px;'>

                <center><h5 style='font-family:Arial,Helvetica,sans-serif;' class='teal-text text-darken-1'><b>Registro Hecho</b></h5><br>

                <a href=../vistas/socios.php>

                <img src='../vistas/imagenes/iconos/c.ico' class='responsive-img' width=80px height=80px> 

                </a></center>

                </div>

                </div>

                ";

            }

            else{



            }

        }

        else

        {

            echo "<center>Algo Salio Mal En la Actualizacion Del Porcentaje</center>";



        }









    }

    }

    else{

        header("location: ../index.php");

        exit;

    }

}

else{

    header("location: ../vistas/login.php");

    exit;

}











?>