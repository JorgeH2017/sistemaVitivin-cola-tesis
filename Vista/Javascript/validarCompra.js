function validarCompra() {
    var nomProducto, descrProducto, cantProducto, tipoProducto;
    nomProducto = document.getElementById("txtnombreproducto").value;
    descrProducto = document.getElementById("txtdescrproducto").value;
    cantProducto = document.getElementById("txtcantidadproducto").value;
    tipoProducto = document.getElementById("selecttipoproducto").selectedIndex;

    if (nomProducto.length === 0 || nomProducto === null || /^\s+$/.test(nomProducto)) {
        alert("Debes escribir un nombre de producto");
        return false;
    }
    else if (!/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/.test(nomProducto)) {
        alert("El nombre de producto debe ser solo letras");
        return false;
    }
    else if (nomProducto.length > 50) {
        alert("El nombre del producto no debe superar los 50 caracteres");
        return false;
    }
    else if (descrProducto.length === 0 || descrProducto === null || /^\s+$/.test(descrProducto)) {
        alert("Debes escribir una descripción del producto");
        return false;
    }
    else if (!/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ]|[0-9])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s]|[0-9]|[\,])*$/.test(descrProducto)) {
        alert("La descripción puede contener letras o números separados por coma o espacio");
        return false;
    }
    else if (descrProducto.length > 200) {
        alert("La descripción del producto no debe superar los 200 caracteres");
        return false;
    }
    else if (cantProducto.length === 0 || cantProducto === null || /^\s+$/.test(cantProducto)) {
        alert("Debes escribir una cantidad");
        return false;
    }
    else if (!/^[1-9][0-9]*$/.test(cantProducto)) {
        alert("La cantidad no es un número válido");
        return false;
    }
    else if (cantProducto.length > 10) {
        alert("La cantidad no debe superar los 10 caracteres");
        return false;
    }
    else if (tipoProducto === null || tipoProducto === 0) {
        alert("Debes seleccionar un tipo de producto");
        return false;
    }
}

function validarStockA() {

    var agregarStock;
    agregarStock = document.getElementById("txtagregarcantidad").value;

    if (agregarStock.length === 0 || agregarStock === null || /^\s+$/.test(agregarStock)) {
        alert("Debes escribir una cantidad para aumentar");
        return false;
    }
    else if (!/^[1-9][0-9]*$/.test(agregarStock)) {
        alert("La cantidad no es un número válido");
        return false;
    }
    else if (agregarStock.length > 10) {
        alert("La cantidad no debe superar los 10 caracteres");
        return false;
    }
}

function validarStockD() {
    var disminuirStock;
    disminuirStock = document.getElementById("txtdisminuircantidad").value;

    if (disminuirStock.length === 0 || disminuirStock === null || /^\s+$/.test(disminuirStock)) {
        alert("Debes escribir una cantidad para disminuir");
        return false;
    }
    else if (!/^[1-9][0-9]*$/.test(disminuirStock)) {
        alert("La cantidad no es un número válido");
        return false;
    }
    else if (disminuirStock.length > 10) {
        alert("La cantidad no debe superar los 10 caracteres");
        return false;
    }
}