function formulario() {
    var d1 = document.fdatos1.servicio_profesional.value;
    var d2 = document.fdatos1.compras.value;
    var d3 = document.fdatos1.viaticos.value;

    if (d1.charAt(0) == "0" && d2.charAt(0) == "0" && d3.charAt(0) == "0" && d1.charAt(1) == "0" && d2.charAt(1) == "0" && d3.charAt(1) == "0") {

        M.toast({ html: 'Todas Las cantidades estan en 0' })

        return false;
    } else {
        d1 = parseFloat(d1);
        d2 = parseFloat(d2);
        d3 = parseFloat(d3);

        if (d1 == 0 && d2 == 0 && d3 == 0) {
            M.toast({ html: 'Todas Las cantidades estan en 0' })
            return false;
        } else {
            return true;
        }
    }



}