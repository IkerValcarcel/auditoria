function comprobar_datos(){
    var nombre = document.registrarse.nombre.value;
    var apellidos = document.registrarse.apellidos.value;
    var email = document.registrarse.email.value;
    var dni = document.registrarse.dni.value;
    var telefono = document.registrarse.telefono.value;
    var nacimiento = document.registrarse.nacimiento.value;
    var password = document.registrarse.password.value;
    var regex_nombre = /^[A-Za-z\s]+$/;
    console.log("Enviando formulario...");

    if (nombre === null || nombre === ''){
        alert("Introduzca su nombre");
        return false;
    }
    else if (!regex_nombre.test(nombre)){
        alert("Solo se pueden introducir letras")
        return false;
    }
    if (apellidos === null || apellidos === ''){
        alert("Introduzca sus apellidos");
        return false;
    }
    else if (!regex_nombre.test(apellidos)){
        alert("Solo se pueden introducir letras")
        return false;
    }
    if (!validar_email(email)){
        return false;
    }
    if (!validar_dni(dni)){
        return false;
    }
    if (telefono === null || telefono === '' || telefono.length != 9 || !/^\d+$/.test(telefono)){
        alert("Introduzca un n\372mero de tel\351fono de nueve d\355gitos");
        return false;
    }
    if (!validar_fecha(nacimiento)){
        return false;
    }
    if (password === null || password === ''){
        alert('Introduzca su contrase\361a');
        return false;
    }
    return true;
}
function validar_email(email){
    var regex_email = /\S+@\S+\.\S+/;
    if (!regex_email.test(email)){
        alert("Formato del email incorrecto");
        return false;
    }
    return true;
}
function validar_dni(dni){
    var num;
    var letra;
    var regex_dni = /^\d{8}-[a-zA-Z]$/;

    if (regex_dni.test(dni)){
        partes_dni = dni.split("-")
        numero = partes_dni[0]
        letra = partes_dni[1]
        numero = numero % 23;
        var comprobacion = 'TRWAGMYFPDXBNJZSQVHLCKET';
        comprobacion = comprobacion.substring(numero,numero+1);
        if (letra != comprobacion.toUpperCase()) {
            alert("DNI incorrecto")
            return false;
        }
    }
    else{
        alert("Formato del DNI debe de ser el n\372mero y un gui\363n seguido de la letra")
        return false;
    }
    return true;
}
function validar_fecha(fecha){
    var partes_fecha = fecha.split("-");
    if (partes_fecha.length != 3){
        alert("La fecha tiene que seguir el formato 'dd-mm-aaaa'");
        return false;
    }
    else{
        var dia = partes_fecha[0];
        var mes = partes_fecha[1];
        var anio = partes_fecha[2];
        var comprobar_dia_mes = /^\d{2}$/;
        var comprobar_anio = /^\d{4}$/;
        if(!comprobar_dia_mes.test(dia) || !comprobar_dia_mes.test(mes) || !comprobar_anio.test(anio)){
            alert("La fecha tiene que seguir el formato 'dd-mm-aaaa");
            return false;
        }
    }
    return true;
}

function redireccion(){
    if (comprobar_datos()){
  
        nuevapag=window.location.href.replace("html","php");
        nuevapag=`${nuevapag}?nombre=${document.registrarse.nombre.value}&apellidos=${document.registrarse.apellidos.value}&email=${document.registrarse.email.value}&dni=${document.registrarse.dni.value}&telefono=${document.registrarse.telefono.value}&nacimiento=${document.registrarse.nacimiento.value}&password=${document.registrarse.password.value}`

        window.location = nuevapag;

    }
   
}