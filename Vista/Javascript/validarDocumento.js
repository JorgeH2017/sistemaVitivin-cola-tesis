function validarDocumento(){
    var documento=document.getElementById("archivo").files;
    
    if(documento.length === 0){
        alert("Debes seleccionar por lo menos un archivo");
        return false;
    }
}

