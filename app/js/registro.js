function comprobar_datos(){
    var nombre = document.registrarse.nombre.value;
    var apellidos = document.registrarse.apellidos.value;
    var email = document.registrarse.email.value;
    var dni = document.registrarse.dni.value;
    var telefono = document.registrarse.telefono.value;
    var nacimiento = document.registrarse.nacimiento.value;
    var cuenta_bancaria = document.registrarse.cuenta_bancaria.value;
    var password = document.registrarse.password.value;
    var regex_nombre = /^[A-Za-z\s]+$/;
    var regex_password = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    
    console.log("Enviando formulario...");

    if(nombre.includes("<") || nombre.includes(">") || nombre.includes("&")|| nombre.includes("$")) {
        alert("Posible XSS, evite usar > y <");
        return false; 
    }
    if(apellidos.includes("<") || apellidos.includes(">") || apellidos.includes("&")|| apellidos.includes("$")) {
        alert("Posible XSS, evite usar > y <");
        return false;
    }
    if(email.includes("<") || email.includes(">") || email.includes("&")|| email.includes("$")) {
        alert("Posible XSS, evite usar > y <");
        return false;
    }
    if(telefono.includes("<") || telefono.includes(">") || telefono.includes("&")|| telefono.includes("$")) {
        alert("Posible XSS, evite usar > y <");

        return false;
    }
    if(mensaje.includes("<") || mensaje.includes(">") || mensaje.includes("&")|| mensaje.includes("$")) {
        alert("Posible XSS, evite usar > y <");return false;}
    if(dni.includes("<") || dni.includes(">") || dni.includes("&")|| dni.includes("$")) {
        alert("Posible XSS, evite usar > y <");
        return false;
    }
    if(nacimiento.includes("<") || nacimiento.includes(">") || nacimiento.includes("&")|| nacimiento.includes("$")) {
        alert("Posible XSS, evite usar > y <");
        return false;
    }
    if(password.includes("<") || password.includes(">") || password.includes("&")|| password.includes("$")) {
        alert("Posible XSS, evite usar > y <");
        return false;
    }
   
    
    if (nombre === null || nombre === ''){
        alert("Introduzca su nombre");
        return false;
    }
    else if (!regex_nombre.test(nombre)){
        alert("Solo se pueden introducir letras en el nombre. No ñ ni tilde.")
        return false;
    }
    if (apellidos === null || apellidos === ''){
        alert("Introduzca sus apellidos");
        return false;
    }
    if (!regex_nombre.test(apellidos)){
        alert("Solo se pueden introducir letras en el apellido. No ñ ni tilde.")
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
    if (cuenta_bancaria === null || cuenta_bancaria === '' || cuenta_bancaria.length != 20 || !/^\d+$/.test(cuenta_bancaria)){
        alert('El número de cuenta bancaria debe tener 20 dígitos y estar unicamente compuesto por números');
        return false;
    }
    if (password === null || password === ''){
        alert('Introduzca su contrase\361a');
        return false;
    }
    if (!regex_password.test(password)){
        alert('Introduzca una contrase\361a de entre 8 y 16 caracteres que incluya almenos una minuscula, una mayuscula, un n\372mero y alguno de estos caracteres: !@#$%^&*');
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
        nuevapag=`${nuevapag}?nombre=${document.registrarse.nombre.value}&apellidos=${document.registrarse.apellidos.value}&email=${document.registrarse.email.value}&dni=${document.registrarse.dni.value}&telefono=${document.registrarse.telefono.value}&nacimiento=${document.registrarse.nacimiento.value}&cuenta_bancaria=${document.registrarse.cuenta_bancaria.value}&password=${document.registrarse.password.value}`

        window.location = nuevapag;

    }
   
}
function modificar_datos(){
    if (comprobar_datos()){
        
        nuevapag="modificarperfil.php";
        nuevapag=`${nuevapag}?nombre=${document.registrarse.nombre.value}&apellidos=${document.registrarse.apellidos.value}&email=${document.registrarse.email.value}&dni=${document.registrarse.dni.value}&telefono=${document.registrarse.telefono.value}&nacimiento=${document.registrarse.nacimiento.value}&cuenta_bancaria=${document.registrarse.cuenta_bancaria.value}&password=${document.registrarse.password.value}`

        window.location = nuevapag;

    }

}