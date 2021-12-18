<?php
    session_start();
    if (isset($_SESSION['email'])){
        header('Location: iniciado.html');
    }
    else{
        header('Location: login.html');
    }
?>
;