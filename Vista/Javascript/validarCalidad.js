function validarCalidad() {
    
    var vinoCalidad, estabFrio, estabCalor, nivelMetal, tenOxidacion, estabMicro, solSoluble, medHidro, nivPh, nivAlcohol, nivAcidez, acidTitu, acidVol, nivHierro, nivMag, nivCalcio, nivPotasio, nivSodio, color;
    vinoCalidad = document.getElementById("txtvinocalidad").value;
    estabFrio = document.getElementById("txtestabilidad").value;
    estabCalor = document.getElementById("txtestabilidadcalor").value;
    nivelMetal = document.getElementById("txtnivelmetal").value;
    tenOxidacion = document.getElementById("txtoxidacion").value;
    estabMicro = document.getElementById("txtestabilidadmicro").value;
    solSoluble = document.getElementById("txtsolubles").value;
    medHidro = document.getElementById("txthidro").value;
    nivPh = document.getElementById("txtph").value;
    nivAlcohol = document.getElementById("txtalcohol").value;
    nivAcidez = document.getElementById("txtacidez").value;
    acidTitu = document.getElementById("txtacideztitu").value;
    acidVol = document.getElementById("txtacidezvol").value;
    nivHierro = document.getElementById("txthierro").value;
    nivMag = document.getElementById("txtmagnesio").value;
    nivCalcio = document.getElementById("txtcalcio").value;
    nivPotasio = document.getElementById("txtpotasio").value;
    nivSodio = document.getElementById("txtsodio").value;
    color = document.getElementById("txtcolor").value;

    if (vinoCalidad.length === 0 || vinoCalidad === null || /^\s+$/.test(vinoCalidad)) {
        alert("Debes escribir un nombre de vino");
        return false;
    }
    else if (vinoCalidad.length > 30) {
        alert("El nombre del vino no debe superar los 30 caracteres");
        return false;
    }
    else if (estabFrio.length === 0 || estabFrio === null || /^\s+$/.test(estabFrio)) {
        alert("Debes escribir la estabilización por frío");
        return false;
    }
    else if (estabFrio.length > 200) {
        alert("La estabilización por frío no debe superar los 200 caracteres");
        return false;
    }
    else if (estabCalor.length === 0 || estabCalor === null || /^\s+$/.test(estabCalor)) {
        alert("Debes escribir la estabilidad frente al calor");
        return false;
    }
    else if (estabCalor.length > 200) {
        alert("La estabilidad frente al calor no debe superar los 200 caracteres");
        return false;
    }
    else if (nivelMetal.length === 0 || nivelMetal === null || /^\s+$/.test(nivelMetal)) {
        alert("Debes escribir el nivel de metales");
        return false;
    }
    else if (nivelMetal.length > 200) {
        alert("El nivel de metales no debe superar los 200 caracteres");
        return false;
    }
    else if (tenOxidacion.length === 0 || tenOxidacion === null || /^\s+$/.test(tenOxidacion)) {
        alert("Debes escribir la tendencia a la oxidación");
        return false;
    }
    else if (tenOxidacion.length > 200) {
        alert("La tendencia a la oxidación no debe superar los 200 caracteres");
        return false;
    }
    else if (estabMicro.length === 0 || estabMicro === null || /^\s+$/.test(estabMicro)) {
        alert("Debes escribir la estabilidad microbiológica");
        return false;
    }
    else if (estabMicro.length > 200) {
        alert("La estabilidad microbiológica no debe superar los 200 caracteres");
        return false;
    }
    else if (solSoluble.length === 0 || solSoluble === null || /^\s+$/.test(solSoluble)) {
        alert("Debes escribir los sólidos solubles totales");
        return false;
    }
    else if (solSoluble.length > 200) {
        alert("Los sólidos solubles totales no deben superar los 200 caracteres");
        return false;
    }
    else if (medHidro.length === 0 || medHidro === null || /^\s+$/.test(medHidro)) {
        alert("Debes escribir la medida hidrométrica");
        return false;
    }
    else if (medHidro.length > 200) {
        alert("La medida hidrométrica no debe superar los 200 caracteres");
        return false;
    }
    else if (nivPh.length === 0 || nivPh === null || /^\s+$/.test(nivPh)) {
        alert("Debes escribir el nivel de ph");
        return false;
    }
    else if (nivPh.length > 200) {
        alert("El nivel de ph no debe superar los 200 caracteres");
        return false;
    }
    else if (nivAlcohol.length === 0 || nivAlcohol === null || /^\s+$/.test(nivAlcohol)) {
        alert("Debes escribir el nivel de alcohol");
        return false;
    }
    else if (nivAlcohol.length > 200) {
        alert("El nivel de alcohol no debe superar los 200 caracteres");
        return false;
    }
    else if (nivAcidez.length === 0 || nivAcidez === null || /^\s+$/.test(nivAcidez)) {
        alert("Debes escribir el nivel de acidez");
        return false;
    }
    else if (nivAcidez.length > 200) {
        alert("El nivel de acidez no debe superar los 200 caracteres");
        return false;
    }
    else if (acidTitu.length === 0 || acidTitu === null || /^\s+$/.test(acidTitu)) {
        alert("Debes escribir el nivel de acidez titulable");
        return false;
    }
    else if (acidTitu.length > 200) {
        alert("El nivel de acidez titulable no debe superar los 200 caracteres");
        return false;
    }
    else if (acidVol.length === 0 || acidVol === null || /^\s+$/.test(acidVol)) {
        alert("Debes escribir el nivel de acidez volátil");
        return false;
    }
    else if (acidVol.length > 200) {
        alert("El nivel de acidez volátil no debe superar los 200 caracteres");
        return false;
    }
    else if (nivHierro.length === 0 || nivHierro === null || /^\s+$/.test(nivHierro)) {
        alert("Debes escribir el nivel de hierro");
        return false;
    }
    else if (nivHierro.length > 200) {
        alert("El nivel de hierro no debe superar los 200 caracteres");
        return false;
    }
    else if (nivMag.length === 0 || nivMag === null || /^\s+$/.test(nivMag)) {
        alert("Debes escribir el nivel de magnesio");
        return false;
    }
    else if (nivMag.length > 200) {
        alert("El nivel de magnesio no debe superar los 200 caracteres");
        return false;
    }
    else if (nivCalcio.length === 0 || nivCalcio === null || /^\s+$/.test(nivCalcio)) {
        alert("Debes escribir el nivel de calcio");
        return false;
    }
    else if (nivCalcio.length > 200) {
        alert("El nivel de calcio no debe superar los 200 caracteres");
        return false;
    }
    else if (nivPotasio.length === 0 || nivPotasio === null || /^\s+$/.test(nivPotasio)) {
        alert("Debes escribir el nivel de potasio");
        return false;
    }
    else if (nivPotasio.length > 200) {
        alert("El nivel de potasio no debe superar los 200 caracteres");
        return false;
    }
    else if (nivSodio.length === 0 || nivSodio === null || /^\s+$/.test(nivSodio)) {
        alert("Debes escribir el nivel de sodio");
        return false;
    }
    else if (nivSodio.length > 200) {
        alert("El nivel de sodio no debe superar los 200 caracteres");
        return false;
    }
    else if (color.length === 0 || color === null || /^\s+$/.test(color)) {
        alert("Debes escribir el color");
        return false;
    }
    else if (color.length > 200) {
        alert("El color no debe superar los 200 caracteres");
        return false;
    }
}