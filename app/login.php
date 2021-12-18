<?php
  require("db_con.php");
  session_start(); # empeiza la sesion paa atener acceso a la variable sesion


  $emailF= $_GET["email"];   # obtengo la email que se ha  mandado en el js
  $passF= $_GET["password"]; # obtengo la contraseña que se ha mandado en el js
  $DateAndTime = date('m-d-Y h:i:s a', time()); # se obtiene la fecha y hora actual para registrar el acceso

  $file = 'logs.txt';
  $acceso = "$emailF    $DateAndTime \n";
  file_put_contents($file, $acceso, FILE_APPEND | LOCK_EX); # se registra el intento de acceso.

  $sql = "SELECT Contrasena FROM usuarios WHERE Email=?; "; # Guardo la consulta en la variable sql  
  $test= $conn->prepare($sql); # preparo la consulta 
  $test->bind_param("s", $emailF); #s de string y "junto" una variable a un parametro 
  
  if ($test->execute()) {   # ejecuto la consulta 
    $result = $test->get_result(); # consigo los resultados 
    $contrasena = $result->fetch_assoc(); # guarda los resultados     ¯\_(ツ)_/¯

    if ( strcmp($contrasena['Contrasena'],$passF) ==0 ){ # comparo la contraseña introducida con la almacenada en la base de datos 
      $_SESSION['email']  = $emailF; # guardo la variabe email en la varibale global de sesion para utilizarla mas tarde 
      $_SESSION['time'] = time();
      echo '<script> window.location.href="/iniciado.html"</script>';# redirecciono la pagina a la que esta logueado
    }else{
      echo '<script> window.location.href="/login.html"</script>'; # Se redirecciona al login ya que no es un usuario valido
    } 
  }else{
    echo '<script> window.location.href="/login.html"</script>'; # Se redirecciona al login ya que no es un usuario valido 
  }
?>
;