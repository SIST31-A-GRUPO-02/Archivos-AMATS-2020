<?php 
session_start();
if (isset($_SESSION["id_user"])) {

	header("location: ../index.php");
	exit;
	
	}
	else{


if (isset($_POST["ok"])) {

include_once "../controladores/sesion.php";
$obj = new validar();

$user=$_POST["user"];
$pass=$_POST["pass"];


$busc=$obj->validar_usuario($user,$pass);

	if ($busc=="si") {
        
	header("location: ../index.php");
	exit;
    }

	else{
	?>
	
<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset=UTF-8>
    <meta name=viewport content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' href='css/estilo.css'>
	<link href='https://fonts.googleapis.com/css?family=Poppins:600&display=swap' rel=stylesheet>
	<script src='https://kit.fontawesome.com/a81368914c.js'></script>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='icon' href='imagenes/logos/FAVlogo.png'>
	  <title>Registrate</title>

</head>
<body>

	<div class='container'>

		<div class='img'>

			<img src='imagenes/logos/logo2.png' width='100px' >

		</div>

		<div class='login-content'>

			<form method=post>

				<img src='imagenes/logos/logo1.png '>

				<h2 class='title'>Ups..Ese Usuario No Existe</h2>

           		<div class='input-div one'>

           		   <div class='i'>

           		   		<i class='fas fa-user'></i>

           		   </div>

           		   <div class='div'>

           		   		<h5>Usuario</h5>

           		   		<input type='text' name='user' required='' class='input'>

           		   </div>

           		</div>

           		<div class='input-div pass'>

           		   <div class='i'>

           		    	<i class='fas fa-lock'></i>

           		   </div>

           		   <div class='div'>

           		    	<h5>Password</h5>

           		    	<input type='password' name='pass' class='input'>

            	   </div>

            	</div>



            	<input type='submit' class='btn'  name='ok' value='Login'>

            </form>

        </div>

    </div>
<script type='text/javascript' src='js/main.js'></script>

</body>


	<?php 
	}
}
else{



?>
<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset=UTF-8>
    <meta name=viewport content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' href='css/estilo.css'>
	<link href='https://fonts.googleapis.com/css?family=Poppins:600&display=swap' rel=stylesheet>
	<script src='https://kit.fontawesome.com/a81368914c.js'></script>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='icon' href='imagenes/logos/FAVlogo.png'>
	  <title>Registrate</title>

</head>
<body>

	<div class='container'>

		<div class='img'>

			<img src='imagenes/logos/logo2.png' width='100px' >

		</div>

		<div class='login-content'>

			<form method=post>

				<img src='imagenes/logos/logo1.png '>

				<h2 class='title'>Bienvenido</h2>

           		<div class='input-div one'>

           		   <div class='i'>

           		   		<i class='fas fa-user'></i>

           		   </div>

           		   <div class='div'>

           		   		<h5>Usuario</h5>

           		   		<input type='text' name='user' required='' class='input'>

           		   </div>

           		</div>

           		<div class='input-div pass'>

           		   <div class='i'>

           		    	<i class='fas fa-lock'></i>

           		   </div>

           		   <div class='div'>

           		    	<h5>Password</h5>

           		    	<input type='password' name='pass' class='input'>

            	   </div>

            	</div>



            	<input type='submit' class='btn'  name='ok' value='Login'>

            </form>

        </div>

    </div>
<script type='text/javascript' src='js/main.js'></script>

</body>




<?php 
	}
	}

?>



