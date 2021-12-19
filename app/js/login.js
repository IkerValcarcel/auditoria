function comprobar_datos(){
    var email = document.login.email.value;
    var password = document.login.password.value;
    
    if(email.includes("<") || email.includes(">") || email.includes("&")|| email.includes("$")) {
        alert("Posible XSS, evite usar > y <");
        return false;
    }
    if(password.includes("<") || password.includes(">") || password.includes("&")|| password.includes("$")) {
        alert("Posible XSS, evite usar > y <");
        return false;
    }
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