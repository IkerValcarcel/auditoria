<?php
    require("db_con.php"); # se conecta con la base de datos
    session_start();
    $nom=$_GET["nombre"]; # se guardan los valores del formulario en las variables lcoales a traves de un metodo post 
    $ape=$_GET["apellidos"];
    $mail=$_GET["email"]; 
    $dni=$_GET["dni"]; 
    $telf=(int)$_GET["telefono"]; 
    
    $fnac=$_GET["nacimiento"]; 
    list($dia,$mes,$ano) = explode("-", $fnac);
    $fnac= $ano."/".$mes."/".$dia;
    
    $pasw=password_hash($_GET["password"], PASSWORD_DEFAULT);
    
    # consulta sql 
    $sql = "UPDATE usuarios SET Nombre = '$nom',
                                Apellidos = '$ape',
                                Email = '$mail',
                                DNI = '$dni',
                                Telefono = '$telf',
                                Fecha_nacimiento = '$fnac',
                                Contrasena = '$pasw'
                                WHERE Email LIKE '$mail';";

    if ($conn->query($sql) === TRUE) {# se ejecuta la consulta sql 
        $_SESSION['email'] = $mail;  # guarda en la variable glogal el email para mantener la sesion inicada 
        printf ("Record updated successfully");# imprime en la terminal del buscador que ha salido bien 
        echo '<script> window.location.href="/perfil.php"</script>'; # redirecciona al perfiñ
    }else {
        printf ("Error updating record: " . $conn->error); # algo ha salido mal y se imprime en la terminal del buscador 
    }
    
?>