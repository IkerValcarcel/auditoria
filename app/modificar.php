<?php
    require("db_con.php");

    $id=$_GET['id'];   # se obtienen las variables que se han enviado en el js 
    $nom=$_GET['nombre'];
    $ape=$_GET['apellidos'];
    $mail=$_GET['email'];
    $telf=$_GET['telefono'];
    $mensaje=$_GET['mensaje'];
    # se genera la consulta
    $sql = "UPDATE `comentarios` SET NRECEP = '$nom',
                                    ARECEP = '$ape',
                                    ERECEP = '$mail',
                                    Telefono = '$telf',
                                    MSG = '$mensaje'
                                    WHERE ID = $id;";
     # se ejecuta la consulta
    if (mysqli_query($conn, $sql)) {
        printf ("Record updated successfully");
        echo "<script> window.location.href='/modificarmensaje.php/?id=${id}'</script>";# se redirecciona modificarmensaje.php
    }else {
        printf ("Error updating record: " . $conn->error); # indica que hay un error 
    }
?>