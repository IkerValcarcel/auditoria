<?php
    require("db_con.php"); #Se concta con la bd
    $id = $_GET['id'];

    $sql = "DELETE FROM comentarios WHERE ID = {$id}";# consulta para borrar la id seleccionada
  
    if ($mysqli->query($sql)) {# se ejecuta la consulta de borrado
        printf("Se ha borrado correctamente.<br />");
        echo '<script> window.location.href="/foro.php"</script>'; # Redirecciona a foro.php
    } 
    else{
        printf("Error inesperado al borrar : %s<br />", $mysqli->error);  # Muestra un error
    }
?>