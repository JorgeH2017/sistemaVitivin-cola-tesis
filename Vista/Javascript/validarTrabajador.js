function validarTrabajador() {

    var dni, nombres, apellidos, telefono, correo, direccion, puestoTrabajo;
    dni = document.getElementById("txtruttrabajador").value;
    nombres = document.getElementById("txtnombretrabajador").value;
    apellidos = document.getElementById("txtapellidotrabajador").value;
    telefono = document.getElementById("txttelefonotrabajador").value;
    correo = document.getElementById("txtcorreotrabajador").value;
    direccion = document.getElementById("txtdirecciontrabajador").value;
    puestoTrabajo = document.getElementById("selectpuestotrabajo").selectedIndex;

    if (dni.length === 0 || dni === null || /^\s+$/.test(dni)) {
        alert("Debes escribir un dni");
        return false;
    }
    valor = document.getElementById("txtruttrabajador").value;
    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];

    if (!(/^\d{8}[A-Z]$/.test(valor))) {
        alert("Dni no válido");
        return false;
    }
    if (valor.charAt(8) !== letras[(valor.substring(0, 8)) % 23]) {
        alert("la última letra del Dni es incorrecta");
        return false;
    }
    else if (nombres.length === 0 || nombres === null || /^\s+$/.test(nombres)) {
        alert("Debes escribir un nombre");
        return false;
    }
    else if (!/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/.test(nombres)) {
        alert("El nombre debe ser solo letras");
        return false;
    }
    else if (nombres.length > 50) {
        alert("El nombre no debe superar los 50 caracteres");
        return false;
    }
    else if (apellidos.length === 0 || apellidos === null || /^\s+$/.test(apellidos)) {
        alert("Debes escribir un apellido");
        return false;
    }
    else if (!/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/.test(apellidos)) {
        alert("El apellido debe ser solo letras");
        return false;
    }
    else if (apellidos.length > 50) {
        alert("El apellido no debe superar los 50 caracteres");
        return false;
    }
    else if (telefono.length === 0 || telefono === null || /^\s+$/.test(telefono)) {
        alert("Debes escribir un teléfono");
        return false;
    }
    else if (!/^([0-9]+){9}$/.test(telefono)) {
        alert("El teléfono no es un número válido");
        return false;
    }
    else if (telefono.length > 9) {
        alert("El teléfono no debe superar los 9 caracteres");
        return false;
    }
    else if (!/(^$|\S+@\S+\.\S+)/.test(correo)) {
        alert("El correo no es válido");
        return false;
    }
    else if (/^\s+$/.test(correo)) {
        alert("El correo no es válido");
        return false;
    }
    else if (correo.length > 50) {
        alert("El correo no debe superar los 50 caracteres");
        return false;
    }
    else if (direccion.length === 0 || direccion === null || /^\s+$/.test(direccion)) {
        alert("Debes escribir una dirección");
        return false;
    }
    else if (!/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ]|[0-9])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s]|[0-9]|[\,])*$/.test(direccion)) {
        alert("La dirección puede contener letras o números separados por coma o espacio");
        return false;
    }
    else if (direccion.length > 100) {
        alert("La dirección no debe superar los 100 caracteres");
        return false;
    }
    else if (puestoTrabajo === null || puestoTrabajo === 0) {
        alert("Debes seleccionar un puesto de trabajo");
        return false;
    }
}


