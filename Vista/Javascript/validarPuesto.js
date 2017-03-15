function validarPuesto() {
    var puesto;

    puesto = document.getElementById("txtnombrepuesto").value;

    if (puesto.length === 0 || puesto === null || /^\s+$/.test(puesto)) {
        alert("Debes escribir un puesto de trabajo");
        return false;
    }
    else if (!/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/.test(puesto)) {
        alert("El puesto de trabajo debe ser solo letras");
        return false;
    }
    else if (puesto.length > 30) {
        alert("El puesto de trabajo no debe superar los 30 caracteres");
        return false;
    }
}