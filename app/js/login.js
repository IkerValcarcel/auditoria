function comprobar_datos(){
    var email = document.login.email.value;
    var password = document.login.password.value;
    var regex_xss= /<>/;

    if(!regex_xss.test(email)){     alert("Posible XSS, evite usar > y <");return false };
    if(!regex_xss.test(password)){  alert("Posible XSS, evite usar > y <");return false };
    
    console.log("Enviando formulario...");
    validar_email(email);
    if (password === null || password === ''){
        alert('Introduzca su contrase\361a');
    }
    return true;
}
function validar_email(email){
    var regex_email = /\S+@\S+\.\S+/;
    if (!regex_email.test(email)){
        alert("Formato del email incorrecto");
    }
}

function redireccion(){

    if (comprobar_datos()){
  
        nuevapag=window.location.href.replace("html","php");
        nuevapag=`${nuevapag}?email=${document.login.email.value}&password=${document.login.password.value}`

        window.location = nuevapag;

    }
   
}