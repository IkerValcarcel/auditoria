<?php
    session_start();
    $tiempo_acceso = $_SESSION['time'];
    $tiempo_transcurrido = time() - $tiempo_acceso;
    if ($tiempo_transcurrido > 60){ 
        header('Location: cerrarsesion.php');
    }
    else{
        $_SESSION['time'] = time();
        header('Location: mensaje.html');
    }
?>
;