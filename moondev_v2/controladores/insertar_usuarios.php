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

    <div class=jumbotron>

    <h5>El Usuario Ya Existe</h5>

    <a href=../vistas/socios.php>

    <button class='btn btn-danger light-green'>Regresar</button> 

    </a>

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

                <div class=jumbotron>

                <h5>Registro Hecho</h5>

                <a href=../vistas/socios.php>

                <button class='btn btn-danger light-green'>Regresar</button> 

                </a>

                </div>

                

                ";

            }

            else{



            }

        }

        else

        {

            echo "Algo Salio Mal En la Actualizacion Del Porcentaje";



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