<?php
    session_start();
    require("tiemposesion.php");

    $acceso = permitir_acceso();
    if ($acceso == 0) #Si no esta iniciado o lleva mucho tiempo inactivo no se le permite acceso
        echo '<script> window.location.href="/iniciado.html"</script>';
    
    if ($acceso == 1)
        echo '<script> window.location.href="/login.html"</script>';

    if ($acceso == 2)
        echo '<script> window.location.href="/cerrarsesion.php"</script>';
?>
;