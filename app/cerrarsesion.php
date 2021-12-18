<?php
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['time']);
    session_destroy();
    echo "<SCRIPT> //not showing me this
        alert('Sesión cerrada')
        window.location.replace('index.html');
    </SCRIPT>";
?>
;