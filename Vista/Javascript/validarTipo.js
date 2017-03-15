function validarTipo(){
    
    var tipo;
    tipo = document.getElementById("txttipoproducto").value;

    if (tipo.length === 0 || tipo === null || /^\s+$/.test(tipo)) {
        alert("Debes escribir un tipo de producto");
        return false;
    }
    else if (!/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/.test(tipo)) {
        alert("El tipo de producto debe ser solo letras");
        return false;
    }
    else if (tipo.length > 30) {
        alert("El tipo de producto no debe superar los 30 caracteres");
        return false;
    }
}

