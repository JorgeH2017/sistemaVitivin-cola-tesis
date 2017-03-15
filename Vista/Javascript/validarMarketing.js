function validarMarketing() {

    var nombrePlan, situActual, objetivo, estrategia, planAccion, presupuesto, metodo;
    nombrePlan = document.getElementById("txtnombreplanmarketing").value;
    situActual = document.getElementById("txtsituacionactual").value;
    objetivo = document.getElementById("txtobjetivos").value;
    estrategia = document.getElementById("txtestrategia").value;
    planAccion = document.getElementById("txtplanaccion").value;
    presupuesto = document.getElementById("txtpresupuesto").value;
    metodo = document.getElementById("txtmetodocontrol").value;

    if (nombrePlan.length === 0 || nombrePlan === null || /^\s+$/.test(nombrePlan)) {
        alert("Debes escribir un nombre del plan");
        return false;
    }
    else if (nombrePlan.length > 50) {
        alert("El nombre del plan no debe superar los 50 caracteres");
        return false;
    }
    else if (situActual.length === 0 || situActual === null || /^\s+$/.test(situActual)) {
        alert("Debes escribir una situación actual");
        return false;
    }
    else if (situActual.length > 500) {
        alert("La situación actual no debe superar los 500 caracteres");
        return false;
    }
    else if (objetivo.length === 0 || objetivo === null || /^\s+$/.test(objetivo)) {
        alert("Debes escribir los objetivos");
        return false;
    }
    else if (objetivo.length > 500) {
        alert("Los objetivos no deben superar los 500 caracteres");
        return false;
    }
    else if (estrategia.length === 0 || estrategia === null || /^\s+$/.test(estrategia)) {
        alert("Debes escribir la estrategia");
        return false;
    }
    else if (estrategia.length > 500) {
        alert("La estrategia no debe superar los 500 caracteres");
        return false;
    }
    else if (planAccion.length === 0 || planAccion === null || /^\s+$/.test(planAccion)) {
        alert("Debes escribir el plan de acción");
        return false;
    }
    else if (planAccion.length > 500) {
        alert("El plan de acción no debe superar los 500 caracteres");
        return false;
    }
    else if (presupuesto.length === 0 || presupuesto === null || /^\s+$/.test(presupuesto)) {
        alert("Debes escribir el presupuesto");
        return false;
    }
    else if (presupuesto.length > 500) {
        alert("El presupuesto no debe superar los 500 caracteres");
        return false;
    }
    else if (metodo.length === 0 || metodo === null || /^\s+$/.test(metodo)) {
        alert("Debes escribir el método de control");
        return false;
    }
    else if (metodo.length > 500) {
        alert("El método de control no debe superar los 500 caracteres");
        return false;
    }
}