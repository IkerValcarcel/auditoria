<?php
    session_start();
    $tiempo_acceso = $_SESSION['time'];
    require("tiemposesion.php");

    if (permitir_acceso() != 0) #Si no esta iniciado o lleva mucho tiempo inactivo no se le permite acceso
        echo '<script> window.location.href="/cerrarsesion.php"</script>';
    
    header('Location: iniciado.html');
    
?>
;