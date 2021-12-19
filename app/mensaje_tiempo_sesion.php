<?php
    session_start();
    require("tiemposesion.php");

    if (permitir_acceso() != 0) #Si no esta iniciado o lleva mucho tiempo inactivo no se le permite acceso
        echo '<script> window.location.href="/cerrarsesion.php"</script>';
    
    header('Location: mensaje.html');
?>
;