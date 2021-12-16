<?php
require("db_con.php");
session_start();

$maxid = mysqli_fetch_array($id);  #consulta para obtener el ultimo id generado 
$newid = $maxid[0] +1 ;

$nrecep= $_GET["nombre"];  #se obtienen las variables que se han enviado en el js
$arecep= $_GET["apellidos"]; 
$erecep= $_GET["email"]; 
$telf= (int)$_GET["telefono"]; 
$msg= $_GET["mensaje"]; 
$emisor=$_SESSION['email'];

# genera la consulta 
$sql = "INSERT INTO comentarios VALUES ($newid,'$nrecep','$arecep','$erecep',$telf,'$msg','$emisor');";
  
if ($mysqli->query($sql)) {
    echo '<script> window.location.href="/foro.php"</script>'; # Redirecciona a foro.php
} 
else{
    printf("Error inesperado al añadir : %s<br />", $mysqli->error);
}
require('foro.php');


?>