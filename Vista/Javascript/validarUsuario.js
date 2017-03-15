function validarUsuario() {

    var usuario, pass, repePass, nombre, apellido, telefono, correo, direccion, tipoUsuario;
    usuario = document.getElementById("txtusuario").value;
    pass = document.getElementById("txtpass").value;
    repePass = document.getElementById("txtrepetircontrasena").value;
    nombre = document.getElementById("txtnombres").value;
    apellido = document.getElementById("txtapellidos").value;
    telefono = document.getElementById("txttelefono").value;
    correo = document.getElementById("txtcorreousuario").value;
    direccion = document.getElementById("txtdirecusuario").value;
    tipoUsuario = document.getElementById("txtselecttipousuario").selectedIndex;

    if (usuario.length === 0 || usuario === null || /^\s+$/.test(usuario)) {
        alert("Debes escribir un nombre de usuario");
        return false;
    }
    else if (!/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ]|[0-9]|[\_\-])+$/.test(usuario)) {
        alert("El nombre de usuario no es válido. Es válido si contiene letras (con y sin tilde), números enteros o guiones");
        return false;
    }
    else if (usuario.length > 30) {
        alert("El nombre de usuario no debe superar los 30 caracteres");
        return false;
    }
    else if (pass.length === 0 || pass === null || /^\s+$/.test(pass)) {
        alert("Debes escribir una contraseña");
        return false;
    }
    else if (!/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/.test(pass)) {
        alert("La contraseña no es válida. Es válida si contiene al menos 1 letra mayúscula y 1 minúscula sin tildes , al menos 1 número, al menos 1 caracter. Un largo minimo de 8 y máximo de 20");
        return false;
    }
    else if (pass.length > 20) {
        alert("La contraseña no debe superar los 20 caracteres");
        return false;
    }
    else if (repePass.length === 0 || repePass === null || /^\s+$/.test(repePass)) {
        alert("Debes escribir la contraseña en el campo repetir contraseña");
        return false;
    }
    else if (repePass.value !== pass.value) {
        alert("Las contraseñas son diferentes");
        return false;
    }
    if (nombre.length === 0 || nombre === null || /^\s+$/.test(nombre)) {
        alert("Debes escribir un nombre");
        return false;
    }
    else if (!/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/.test(nombre)) {
        alert("El nombre debe ser solo letras");
        return false;
    }
    else if (nombre.length > 50) {
        alert("El nombre no debe superar los 50 caracteres");
        return false;
    }
    if (apellido.length === 0 || apellido === null || /^\s+$/.test(apellido)) {
        alert("Debes escribir un apellido");
        return false;
    }
    else if (!/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/.test(apellido)) {
        alert("El apellido debe ser solo letras");
        return false;
    }
    else if (apellido.length > 50) {
        alert("El apellido no debe superar los 50 caracteres");
        return false;
    }
    if (telefono.length === 0 || telefono === null || /^\s+$/.test(telefono)) {
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
    if (correo.length === 0 || correo === null || /^\s+$/.test(correo)) {
        alert("Debes escribir un correo");
        return false;
    }
    else if (!/(^\S+@\S+\.\S+)/.test(correo)) {
        alert("El correo no es válido");
        return false;
    }
    else if (correo.length > 50) {
        alert("El correo no debe superar los 50 caracteres");
        return false;
    }
    if (direccion.length === 0 || direccion === null || /^\s+$/.test(direccion)) {
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
    else if (tipoUsuario === null || tipoUsuario === 0) {
        alert("Debes seleccionar un tipo de usuario");
        return false;
    }
}


function validarUsuario2() {
    var usuario2, nombre2, apellido2, telefono2, direccion2;

    usuario2 = document.getElementById("txtusuario").value;
    nombre2 = document.getElementById("txtnombres").value;
    apellido2 = document.getElementById("txtapellidos").value;
    telefono2 = document.getElementById("txttelefono").value;
    direccion2 = document.getElementById("txtdirecusuario").value;

    if (usuario2.length === 0 || usuario2 === null || /^\s+$/.test(usuario2)) {
        alert("Debes escribir un nombre de usuario");
        return false;
    }
    else if (!/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ]|[0-9]|[\_\-])+$/.test(usuario2)) {
        alert("El nombre de usuario no es válido. Es válido si contiene letras (con y sin tilde), números enteros o guiones");
        return false;
    }
    else if (usuario2.length > 30) {
        alert("El nombre de usuario no debe superar los 30 caracteres");
        return false;
    }
    else if (nombre2.length === 0 || nombre2 === null || /^\s+$/.test(nombre2)) {
        alert("Debes escribir un nombre");
        return false;
    }
    else if (!/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/.test(nombre2)) {
        alert("El nombre debe ser solo letras");
        return false;
    }
    else if (nombre2.length > 50) {
        alert("El nombre no debe superar los 50 caracteres");
        return false;
    }
    if (apellido2.length === 0 || apellido2 === null || /^\s+$/.test(apellido2)) {
        alert("Debes escribir un apellido");
        return false;
    }
    else if (!/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s])*$/.test(apellido2)) {
        alert("El apellido debe ser solo letras");
        return false;
    }
    else if (apellido2.length > 50) {
        alert("El apellido no debe superar los 50 caracteres");
        return false;
    }
    if (telefono2.length === 0 || telefono2 === null || /^\s+$/.test(telefono2)) {
        alert("Debes escribir un teléfono");
        return false;
    }
    else if (!/^([0-9]+){9}$/.test(telefono2)) {
        alert("El teléfono no es un número válido");
        return false;
    }
    else if (telefono2.length > 9) {
        alert("El teléfono no debe superar los 9 caracteres");
        return false;
    }
    else if (direccion2.length === 0 || direccion2 === null || /^\s+$/.test(direccion2)) {
        alert("Debes escribir una dirección");
        return false;
    }
    else if (!/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ]|[0-9])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s]|[0-9]|[\,])*$/.test(direccion2)) {
        alert("La dirección puede contener letras o números separados por coma o espacio");
        return false;
    }
    else if (direccion2.length > 100) {
        alert("La dirección no debe superar los 100 caracteres");
        return false;
    }

}

function validarPass() {
    var passActual, passNueva, repePassNueva;

    passActual = document.getElementById("txtcontrasenaactual").value;
    passNueva = document.getElementById("txtcontrasenanueva").value;
    repePassNueva = document.getElementById("txtrepetircontrasenanueva").value;

    if (passActual.length === 0 || passActual === null || /^\s+$/.test(passActual)) {
        alert("Debes escribir la contraseña actual");
        return false;
    }
    else if (!/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/.test(passNueva)) {
        alert("La contraseña nueva no es válida. Es válida si contiene al menos 1 letra mayúscula y 1 minúscula sin tildes , al menos 1 número, al menos 1 caracter. Un largo minimo de 8 y máximo de 20");
        return false;
    }
    else if (passNueva.length > 20) {
        alert("La contraseña nueva no debe superar los 20 caracteres");
        return false;
    }
    else if (repePassNueva.length === 0 || repePassNueva === null || /^\s+$/.test(repePassNueva)) {
        alert("Debes escribir la contraseña en el campo repetir contraseña");
        return false;
    }
    else if (repePassNueva !== passNueva) {
        alert("Las contraseñas son diferentes");
        return false;
    }

}

function validarTelefono() {

    var telefono3;

    telefono3 = document.getElementById("txttelefono").value;

    if (telefono3.length === 0 || telefono3 === null || /^\s+$/.test(telefono3)) {
        alert("Debes escribir un teléfono");
        return false;
    }
    else if (!/^([0-9]+){9}$/.test(telefono3)) {
        alert("El teléfono no es un número válido");
        return false;
    }
    else if (telefono3.length > 9) {
        alert("El teléfono no debe superar los 9 caracteres");
        return false;
    }
}

function validarCorreo() {
    var correo3;

    correo3 = document.getElementById("txtcorreonuevo").value;

    if (correo3.length === 0 || correo3 === null || /^\s+$/.test(correo3)) {
        alert("Debes escribir un correo");
        return false;
    }
    else if (!/(^\S+@\S+\.\S+)/.test(correo3)) {
        alert("El correo no es válido");
        return false;
    }
    else if (correo3.length > 50) {
        alert("El correo no debe superar los 50 caracteres");
        return false;
    }
}

function validarDireccion() {
    var direccion3;

    direccion3 = document.getElementById("txtdireccusuario").value;

    if (direccion3.length === 0 || direccion3 === null || /^\s+$/.test(direccion3)) {
        alert("Debes escribir una dirección");
        return false;
    }
    else if (!/^([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ]|[0-9])+([a-zA-Z]|[ÁÉÍÓÚáéíóú]|[Nñ\s]|[0-9]|[\,])*$/.test(direccion3)) {
        alert("La dirección puede contener letras o números separados por coma o espacio");
        return false;
    }
    else if (direccion3.length > 100) {
        alert("La dirección no debe superar los 100 caracteres");
        return false;
    }

}

function validarCorreo2() {
    var correo4;
    correo4 = document.getElementById("txtnuevocorreo").value;

    if (correo4.length === 0 || correo4 === null || /^\s+$/.test(correo4)) {
        alert("Debes escribir un correo nuevo");
        return false;
    }
    else if (!/(^\S+@\S+\.\S+)/.test(correo4)) {
        alert("El correo nuevo no es válido");
        return false;
    }
    else if (correo4.length > 50) {
        alert("El correo no debe superar los 50 caracteres");
        return false;
    }
}

function validarCorreo3() {
    var correo5;
    correo5 = document.getElementById("mail").value;

    if (correo5.length === 0 || correo5 === null || /^\s+$/.test(correo5)) {
        alert("Debes escribir un correo");
        return false;
    }
}

function validarPass2() {
    var passNueva2, repePassNueva2;
    passNueva2 = document.getElementById("txtpass").value;
    repePassNueva2 = document.getElementById("txtrepass").value;

    if (passNueva2.length === 0 || passNueva2 === null || /^\s+$/.test(passNueva2)) {
        alert("Debes escribir una contraseña nueva");
        return false;
    }
    else if (!/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/.test(passNueva2)) {
        alert("La contraseña nueva no es válida. Es válida si contiene al menos 1 letra mayúscula y 1 minúscula sin tildes , al menos 1 número, al menos 1 caracter. Un largo minimo de 8 y máximo de 20");
        return false;
    }
    else if (passNueva2.length > 20) {
        alert("La contraseña nueva no debe superar los 20 caracteres");
        return false;
    }
    else if (repePassNueva2.length === 0 || repePassNueva2 === null || /^\s+$/.test(repePassNueva2)) {
        alert("Debes escribir la contraseña en el campo repetir contraseña");
        return false;
    }
    else if (repePassNueva2 !== passNueva2) {
        alert("Las contraseñas son diferentes");
        return false;
    }

}
