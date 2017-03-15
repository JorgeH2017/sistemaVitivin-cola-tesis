function validarInventario() {
    var nombreVino, cantidadVino;
    nombreVino = document.getElementById("txtnombrevino").value;
    cantidadVino = document.getElementById("txtcantidadvino").value;

    if (nombreVino.length === 0 || nombreVino === null || /^\s+$/.test(nombreVino)) {
        alert("Debes escribir un nombre de vino");
        return false;
    }
    else if (!/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/.test(nombreVino)) {
        alert("El nombre del vino debe ser solo letras");
        return false;
    }
    else if (nombreVino.length > 50) {
        alert("El nombre del vino no debe superar los 50 caracteres");
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
    else if (cantidadVino.length > 12) {
        alert("La cantidad no debe superar los 12 caracteres");
        return false;
    }
}

function validarStockA() {
    var agregarStock;
    agregarStock = document.getElementById("txtagregarvino").value;

    if (agregarStock.length === 0 || agregarStock === null || /^\s+$/.test(agregarStock)) {
        alert("Debes escribir una cantidad para aumentar");
        return false;
    }
    else if (!/^[1-9][0-9]*$/.test(agregarStock)) {
        alert("La cantidad no es un número válido");
        return false;
    }
    else if (agregarStock.length > 12) {
        alert("La cantidad no debe superar los 12 caracteres");
        return false;
    }
}

function validarStockD() {
    var disminuirStock;
    disminuirStock = document.getElementById("txtdisminuirvino").value;

    if (disminuirStock.length === 0 || disminuirStock === null || /^\s+$/.test(disminuirStock)) {
        alert("Debes escribir una cantidad para disminuir");
        return false;
    }
    else if (!/^[1-9][0-9]*$/.test(disminuirStock)) {
        alert("La cantidad no es un número válido");
        return false;
    }
    else if (disminuirStock.length > 12) {
        alert("La cantidad no debe superar los 12 caracteres");
        return false;
    }
}