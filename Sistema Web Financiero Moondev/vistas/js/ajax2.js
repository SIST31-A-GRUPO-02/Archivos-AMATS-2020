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

    if (valor == "") {
        M.toast({ html: 'Algo Salio Mal ' })
    } else if (valor1 == "" || valor2 == "") {
        M.toast({ html: 'Seleccione Una Fecha' })
    } else {
        document.getElementById("cuerpo").style.display = "block";
        if (valor == "") {
            alert("Error.................");
        } else {
            if(valor=="Administrador"){
            objAjax.open("GET", "ResumenDePagos.php?var=" + valor + "&" + "dato1=" + valor1 + "&" + "dato2=" + valor2);
            objAjax.send();
            }
            else {
            objAjax.open("GET", "info_usuario.php?var=" + valor + "&" + "dato1=" + valor1 + "&" + "dato2=" + valor2);
            objAjax.send();
            }
        }
    }
}


