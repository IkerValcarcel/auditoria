<?php
    session_start(); # empeiza la sesion paa atener acceso a la variable sesion
    function permitir_acceso(){ #devuelve 0 si se permite el acceso, 1 si no esta identificado y 2 si hay que cerrar la sesión
        if (isset($_SESSION['email'])){
            if (tiempo_transcurrido() > 60){
                header('Location: cerrarsesion.php');
                return 2;
            }
            $_SESSION['time'] = time();
            return 0;
        }
        return 1;
    }


    function tiempo_transcurrido(){ #Calcula el tiempo que ha pasado desde la ultima vez que se ha interactuado con el sistema.
        $tiempo_acceso = $_SESSION['time'];
        return (time() - $tiempo_acceso);
    }

?>