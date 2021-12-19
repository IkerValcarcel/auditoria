<?php
    require("db_con.php"); # se conecta con la base de datos
    require("cifrado.php"); # necesita acceso a los algoritmos de cifrado
    session_start();

    $clave = 'dVT@dp7FaJdt^PalSkHq2H$0w@Xbd7dy';

    $nombre = $_GET["nombre"]; # se guardan los enviados desde el archivo js 
    $apellidos = $_GET["apellidos"]; 
    $email = $_GET["email"]; 
    $dniLetra = $_GET["dni"]; 
    $tel = (int)$_GET["telefono"]; 
    $fnac = $_GET["nacimiento"]; 
    $nbanc = cifrar($_GET["cuenta_bancaria"],$clave);
    $con = $_GET["password"]; 
    $con_hash = password_hash($con, PASSWORD_DEFAULT);

    list($dia,$mes,$ano) = explode("-", $fnac); # se cambia el formato de la fecha 
    $fnac= $ano."/".$mes."/".$dia;

    $sql = "INSERT INTO usuarios VALUES ('$nombre','$apellidos','$email','$dniLetra',$tel,'$fnac','$nbanc','$con_hash')"; # se genera la consulta sql
    
    if ($mysqli->query($sql)) { # ejecuta la consulta sql 
        printf("Se ha añadido correctamente.<br />");  # se indica por la terminal del buscador que ha salido bien 
    } 
    else{
        session_start();# inicia una sesion en php para tener acceso a la variable global email 
        printf("Error inesperado al añadir usuario: %s<br />", $mysqli->error);  # se indica por la terminal del buscador que ha salido mal  
        echo "<script>alert('Error inesperado al añadir usuario. Puede que alguno de los datos únicos este ya esten registrados.')</script>";
        echo '<script> window.location.href="registro.html"</script>'; # redireccioona al inicio del perfil
    }
    $_SESSION["email"] = $email; # se guarda en la variable global el email; esto es para evitar tener que iniciar sesion despues de modificar el email
    $_SESSION["time"] = time();
    echo '<script> window.location.href="/iniciado.html"</script>'; # redireccioona al inicio del perfil
?>