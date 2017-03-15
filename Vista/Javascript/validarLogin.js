function validarLogin() {
    var usuario, pass;

    usuario = document.getElementById("txtusuario").value;
    pass = document.getElementById("txtpass").value;

    if (usuario.length === 0 || usuario === null || /^\s+$/.test(usuario)) {
        alert("Debes escribir un nombre de usuario");
        return false;
    }
    else if (pass.length === 0 || pass === null || /^\s+$/.test(pass)) {
        alert("Debes escribir una contraseña");
        return false;
    }
}