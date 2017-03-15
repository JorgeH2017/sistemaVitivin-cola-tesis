function validarVenta() {
    var numVenta, fechaVenta, cantidadVino, tipoDocumento, montoTotal, nomVino;
    numVenta = document.getElementById("txtdocumentoventa").value;
    fechaVenta = document.getElementById("txtfechaventa").value;
    cantidadVino = document.getElementById("txtcantidadvinoventa").value;
    tipoDocumento = document.getElementById("txttipodocumento").value;
    montoTotal = document.getElementById("txtmontototal").value;
    nomVino = document.getElementById("selectnombrevino").selectedIndex;
    if (numVenta.length === 0 || numVenta === null || /^\s+$/.test(numVenta)) {
        alert("Debes escribir un número de documento");
        return false;
    }
    else if (!/^[0-9]+$/.test(numVenta)) {
        alert("El número de documento no es válido");
        return false;
    }
    else if (numVenta.length > 11) {
        alert("El número de documento no debe superar los 11 caracteres");
        return false;
    }
    else if (fechaVenta.length === 0 || fechaVenta === null) {
        alert("Debes seleccionar una fecha de venta");
        return false;
    }
    else if (cantidadVino.length === 0 || cantidadVino === null || /^\s+$/.test(cantidadVino)) {
        alert("Debes escribir una cantidad de vino");
        return false;
    }
    else if (!/^[1-9][0-9]*$/.test(cantidadVino)) {
        alert("La cantidad no es un número válido");
        return false;
    }
    else if (cantidadVino.length > 11) {
        alert("La cantidad no debe superar los 11 caracteres");
        return false;
    }
    else if (tipoDocumento.length === 0 || tipoDocumento === null || /^\s+$/.test(tipoDocumento)) {
        alert("Debes escribir un tipo de documento");
        return false;
    }
    else if (!/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/.test(tipoDocumento)) {
        alert("El tipo de documento debe ser solo letras");
        return false;
    }
    else if (tipoDocumento.length > 30) {
        alert("El tipo de documento no debe superar los 30 caracteres");
        return false;
    }
    else if (montoTotal.length === 0 || montoTotal === null || /^\s+$/.test(montoTotal)) {
        alert("Debes escribir un monto total");
        return false;
    }
    else if (!/^[0-9]+\.[0-9]{2}$/.test(montoTotal)) {
        alert("El monto no es un número válido o no tiene el formato adecuado de dos decimales después del punto");
        return false;
    }
    else if (montoTotal.length > 20) {
        alert("El monto total no debe superar los 20 caracteres");
        return false;
    }
    else if (nomVino === null || nomVino === 0) {
        alert("Debes seleccionar un nombre de vino");
        return false;
    }
}

