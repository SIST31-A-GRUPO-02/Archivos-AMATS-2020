<?php 
session_start();


$var =$_GET["var"];

$fecha1 =$_GET["dato1"];

$fecha2 =$_GET["dato2"];



if (isset($_SESSION["id_user"])) {

    # code...



/* Si a fin de año las ganancias sin IVA suman 12,000 y los costos suman 7,000 tenemos:

12,000 ganancias sin IVA

 7,000 costos 

1,000 viáticos

-----------

4,000 de ganancia neta. A esta ganancia neta se le aplica el 25% de Renta y eso es lo que se entrega a hacienda y debe salir en el reporte anual

 */

if ($_SESSION["cargo"]=="Administrador") {

include_once "../controladores/pagos.php";

$obj = new pagos();

include_once "../controladores/funciones_ayuda.php";

$obj2= new ayudas();

$ganancias_iva = $obj->ganancias($fecha1,$fecha2);

$costos = $obj->costos($fecha1,$fecha2);

$viaticos = $obj->viaticos($fecha1,$fecha2);



$gananci_neta= ($ganancias_iva-$costos)-$viaticos;

$gananci_neta = $obj2->redondear_dos_decimal($gananci_neta);



$subtotal = $gananci_neta * 0.25;

$subtotal=$obj2->redondear_dos_decimal($subtotal);



$dineroFinal= $gananci_neta-$subtotal;

$dineroFinal=$obj2->redondear_dos_decimal($dineroFinal);



?>

<table>

<tr class="table-active">

<th  colspan="2">Pagos</th>

</tr>



<tr >

    <td>Ganancias Sin Iva :</td>

    <td class="table-active">$ <?php echo $ganancias_iva;?></td>



</tr>



<tr>

    <td>Costos De Proyectos :</td>

    <td class="table-active">$ <?php echo $costos;?></td>



</tr>





<tr>

    <td>Pago De Viaticos :</td>

    <td class="table-active">$ <?php echo $viaticos;?></td>



</tr>



<tr>

    <td>Ganancia Neta :</td>

    <td class="table-active">$ <?php echo $gananci_neta;?></td>



</tr>





<tr>

    <td>Pago A Hacienda :</td>

    <td class="table-active">$ <?php echo $subtotal;?></td>



</tr>



<tr>

    <td class="table-dark">Capital :</td>

    <td class="table-active">$ <?php echo $dineroFinal;?></td>



</tr>





</table>





<?php 

}

}





?> 