function comprobar_datos(){
    var nombre = document.mensaje.nombre.value;
    var apellidos = document.mensaje.apellidos.value;
    var email = document.mensaje.email.value;
    var telefono = document.mensaje.telefono.value;
    var mensaje = document.mensaje.mensaje.value;
    var regex_nombre = /^[A-Za-z\s]+$/;
    var regex_xss= /^<[A-Za-z\s]+>$/;
    console.log("Enviando formulario...");

    if(regex_xss.test(nombre)){     alert("Posible XSS, evite usar > y <");return false };
    if(regex_xss.test(apellidos)){  alert("Posible XSS, evite usar > y <");return false };
    if(regex_xss.test(email)){      alert("Posible XSS, evite usar > y <");return false };
    if(regex_xss.test(telefono)){   alert("Posible XSS, evite usar > y <");return false };
    if(regex_xss.test(mensaje)){    alert("Posible XSS, evite usar > y <");return false };

    if (nombre === null || nombre === ''){
        alert("Introduzca el nombre");
        return false;
    }
    else if (!regex_nombre.test(nombre)){
        alert("Solo se pueden introducir letras")
        return false;
    }
    if (apellidos === null || apellidos === ''){
        alert("Introduzca los apellidos");
        return false;
    }
    else if (!regex_nombre.test(apellidos)){
        alert("Solo se pueden introducir letras")
        return false;
    }
    if (!validar_email(email)){
        return false;
    }
    if (telefono === null || telefono === '' || telefono.length != 9 || !/^\d+$/.test(telefono)){
        alert("Introduzca un n\372mero de tel\351fono de nueve d\355gitos");
        return false;
    }
    if (mensaje === null || mensaje === ''){
        alert("El campo del mensaje no puede estar vacío");
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
function redireccion(){
    if (comprobar_datos()){
  
        nuevapag=window.location.href.replace("html","php");
        nuevapag=`${nuevapag}nombre=${document.mensaje.nombre.value}&apellidos=${document.mensaje.apellidos.value}&email=${document.mensaje.email.value}&telefono=${document.mensaje.telefono.value}&mensaje=${document.mensaje.mensaje.value}`

        window.location = nuevapag;

    }
   
}