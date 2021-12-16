function redireccion(id){
    nuevapag='modificarmensaje.php';
    nuevapag=`${nuevapag}/?id=${id}`
    window.location = nuevapag;
}
function confirmar(id){
    if(confirm("Seguro que quieres borrar?")){
        nuevapag='borrarmensaje.php';
        nuevapag=`${nuevapag}/?id=${id}`
        window.location = nuevapag;
    }
}