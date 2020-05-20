function llamada() {

    var valor = document.getElementById("option").value;

    if (window.XMLHttpRequest) {
        var objAjax = new XMLHttpRequest();

    }

    objAjax.onreadystatechange = function() {

        if (objAjax.readyState == 4 && objAjax.status == 200) {

            document.getElementById("cuerpo").innerHTML = objAjax.responseText;
        }

    }
    objAjax.open("GET", "vista_ingreso_egresos.php?var=" + valor);
    objAjax.send();

}





function mostrar_infoUsuario() {



    if (window.XMLHttpRequest) {
        var objAjax = new XMLHttpRequest();

    }

    objAjax.onreadystatechange = function() {

        if (objAjax.readyState == 4 && objAjax.status == 200) {

            document.getElementById("cuerpo").innerHTML = objAjax.responseText;
        }

    }
    objAjax.open("GET", "info_user.php?var=" + "Activate");
    objAjax.send();

}




function mostrar_datos() {

    var valor = document.getElementById("cargo").value;
    var valor1 = document.getElementById("valor1").value;
    var valor2 = document.getElementById("valor2").value;


    if (window.XMLHttpRequest) {
        var objAjax = new XMLHttpRequest();
        var objAjax2 = new XMLHttpRequest();
        var objAjax3 = new XMLHttpRequest();
        var objAjax4 = new XMLHttpRequest();
        var objAjax5 = new XMLHttpRequest();




    }

    objAjax.onreadystatechange = function() {

        if (objAjax.readyState == 4 && objAjax.status == 200) {

            document.getElementById("cuerpo").innerHTML = objAjax.responseText;
        }

    }
    objAjax2.onreadystatechange = function() {

        if (objAjax2.readyState == 4 && objAjax2.status == 200) {

            document.getElementById("cuerpo2").innerHTML = objAjax2.responseText;
        }

    }
    objAjax3.onreadystatechange = function() {

        if (objAjax3.readyState == 4 && objAjax3.status == 200) {

            document.getElementById("cuerpo3").innerHTML = objAjax3.responseText;
        }

    }
    objAjax4.onreadystatechange = function() {

        if (objAjax4.readyState == 4 && objAjax4.status == 200) {

            document.getElementById("cuerpo4").innerHTML = objAjax4.responseText;
        }

    }
    objAjax5.onreadystatechange = function() {

        if (objAjax5.readyState == 4 && objAjax5.status == 200) {

            document.getElementById("cuerpo5").innerHTML = objAjax5.responseText;
        }

    }

    if (valor1 == "" || valor2 == "") {

        alert("Porfavor Seleccione Un Rango de edad");

    } else {
        document.getElementById("cuerpo").style.display = "block";
        document.getElementById("cuerpo2").style.display = "block";
        document.getElementById("cuerpo3").style.display = "block";
        document.getElementById("cuerpo4").style.display = "block";
        document.getElementById("cuerpo5").style.display = "block";






        if (valor != "") {


            objAjax.open("GET", "resumen_Iva.php?var=" + valor + "&" + "dato1=" + valor1 + "&" + "dato2=" + valor2);
            objAjax.send();

            objAjax2.open("GET", "resumen_renta.php?var=" + valor + "&" + "dato1=" + valor1 + "&" + "dato2=" + valor2);
            objAjax2.send();

            objAjax3.open("GET", "info_usuario.php?var=" + valor + "&" + "dato1=" + valor1 + "&" + "dato2=" + valor2);
            objAjax3.send();


            objAjax4.open("GET", "ventas_info.php?var=" + valor + "&" + "dato1=" + valor1 + "&" + "dato2=" + valor2);
            objAjax4.send();

            objAjax5.open("GET", "descuentos_info.php?var=" + valor + "&" + "dato1=" + valor1 + "&" + "dato2=" + valor2);
            objAjax5.send();

        } else {
            alert("vivo con la cookie");

        }


    }

}




function validar_datos_usuarios() {
    var dato1 = document.getElementById("nom").value;
    var dato2 = document.getElementById("user").value;
    var dato3 = document.getElementById("pass").value;
    var dato4 = document.getElementById("pass_new").value;

    if (window.XMLHttpRequest) {
        var objAjax = new XMLHttpRequest();

    }
    objAjax.onreadystatechange = function() {

        if (objAjax.readyState == 4 && objAjax.status == 200) {

            document.getElementById("cuerpo").innerHTML = objAjax.responseText;
        }

    }
    if (dato1 == "") {
        M.toast({ html: 'El Nombre Esta Vacio' })

    } else if (dato2 == "") {
        M.toast({ html: 'El Nombre De Acceso Esta Vacio' })
    } else if (dato3 == "") {
        M.toast({ html: 'La Contraseña No Puede Estar Vacia' })
    } else {
        objAjax.open("GET", "../controladores/actualizacion_user.php?dato1=" + dato1 +
            "&" + "dato2=" + dato2 +
            "&" + "dato3=" + dato3 +
            "&" + "dato4=" + dato4);

        objAjax.send();
    }



}


function mostrar_pagos() {

    var valor = document.getElementById("valor").value;
    var valor1 = document.getElementById("valor1").value;
    var valor2 = document.getElementById("valor2").value;


    if (window.XMLHttpRequest) {
        var objAjax = new XMLHttpRequest();

    }

    objAjax.onreadystatechange = function() {

        if (objAjax.readyState == 4 && objAjax.status == 200) {

            document.getElementById("cuerpo").innerHTML = objAjax.responseText;
        }

    }
    if (valor1 == "" || valor2 == "") {

        M.toast({ html: 'Seleccione Una Fecha' })


    } else if (valor == "") {
        M.toast({ html: 'Algo Salio Mal ' })
    } else {
        document.getElementById("cuerpo").style.display = "block";

        if (valor == "") {

            location.href = "../vistas/login.php";


        } else {
            objAjax.open("GET", "info_usuario.php?var=" + valor + "&" + "dato1=" + valor1 + "&" + "dato2=" + valor2);
            objAjax.send();

        }


    }

}




function mostrar_salario() {


    var valor1 = document.getElementById("valor1").value;
    var valor2 = document.getElementById("valor2").value;


    if (window.XMLHttpRequest) {
        var objAjax = new XMLHttpRequest();

    }

    objAjax.onreadystatechange = function() {

        if (objAjax.readyState == 4 && objAjax.status == 200) {

            document.getElementById("cuerpo").innerHTML = objAjax.responseText;
        }

    }
    if (valor1 == "" || valor2 == "") {

        alert("Porfavor Seleccione Un Rango de Fecha");

    } else {
        document.getElementById("cuerpo").style.display = "block";

        if (valor == "") {

            location.href = "../vistas/login.php";


        } else {
            objAjax.open("GET", "ResumenDePagos.php?var=" + valor + "&" + "dato1=" + valor1 + "&" + "dato2=" + valor2);
            objAjax.send();

        }


    }

}







function mostrar_usuario() {

    var valor = "Mostrar";


    if (window.XMLHttpRequest) {
        var objAjax = new XMLHttpRequest();

    }

    objAjax.onreadystatechange = function() {

        if (objAjax.readyState == 4 && objAjax.status == 200) {

            document.getElementById("cuerpo_principal").innerHTML = objAjax.responseText;
        }

    }

    /* visibility: visible; */
    document.getElementById("cuerpo_principal").style.overflow = "scroll";
    document.getElementById("btn").style.display = "block";




    objAjax.open("GET", "usuario.php?var=" + valor);
    objAjax.send();

}


function eliminar_usuario() {


    var valor = document.form1.user.value;
    var identificacion = document.getElementById("id_user").value;
    if (valor == "") {
        alert("Porfavor seleccione Un Usuario");

    } else {

        var valor2 = "Eliminar";

        var ok = confirm("Esta Seguro Que Quiere Eliminar Este Usuario No Se Podra Revertir");
        if (ok == true) {


            if (window.XMLHttpRequest) {
                var objAjax = new XMLHttpRequest();

            }

            objAjax.onreadystatechange = function() {

                if (objAjax.readyState == 4 && objAjax.status == 200) {

                    document.getElementById("cuerpo_principal").innerHTML = objAjax.responseText;
                }

            }

            /* visibility: visible; */
            document.getElementById("cuerpo_principal").style.overflow = "visible";
            document.getElementById("btn").style.display = "none";




            objAjax.open("GET", "eliminar_usuarios.php?var=" + valor2 + "&" + "usuario=" + valor);
            objAjax.send();
        }


    }

}

function enviar_usuario() {

    var aceptar = confirm("Seguro Que Quiere Registrar Este Usuario Una Ves Hecho Esto No  Hay marcha Atras ");
    /* "../controladores/insertar_usuarios.php" */
    if (aceptar == true) {
        return true;
    } else {
        return false;


    }

}

function agg_usuario() {


    var valor = "Mostrar";


    if (window.XMLHttpRequest) {
        var objAjax = new XMLHttpRequest();

    }

    objAjax.onreadystatechange = function() {

        if (objAjax.readyState == 4 && objAjax.status == 200) {

            document.getElementById("cuerpo_principal").innerHTML = objAjax.responseText;
        }

    }
    document.getElementById("btn").style.display = "none";
    /* height: 400px ; overflow=" scroll;"" */
    document.getElementById("cuerpo_principal").style.overflow = " visible";
    objAjax.open("GET", "agg_usuario.php?var=" + valor);
    objAjax.send();


}



function validar_campos_personales() {

    var confirm = confirm("Quieres Cambiar Actualizar Estos Datos Una Ves Aceptado No Hay Marcha Atras");

    if (confirm == true) {
        return true;
    } else {
        var contra = document.getElementById("password2").value;
        return false;
    }




}

function redireccionar() {
    location.href = "../index.php";
}