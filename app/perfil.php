<?php
    require("db_con.php");  # se conecta con la base de datos 
    session_start();
    $email= $_SESSION['email']; # se guarda en la variable local email la variable global en la que hemos almacenado el email

    $sql = "SELECT * FROM usuarios WHERE Email=?"; # consulta sql
    $test= $conn->prepare($sql); # prepara la seduencia sql
    $test->bind_param('s', $email); #s de string

    if ($test->execute()) { # ejecuta la consulta sql 
        $result = $test->get_result();
        $usuario = $result->fetch_assoc();

        $Nombre= $usuario['Nombre']; # se guardan los valores de la BD en las variables locales 
        $Apellidos= $usuario['Apellidos']; 
        $Email =$usuario['Email']; 
        $DNI =$usuario['DNI']; 
        $Telefono =$usuario['Telefono']; 
        
        $Fecha_nacimiento =$usuario['Fecha_nacimiento'];  # se modifica como se muestra la fecha 
        list($ano,$mes,$dia) = explode("/", $Fecha_nacimiento);
        $Fecha_nacimiento= $dia."-".$mes."-".$ano;
        
        $Contrasena =$usuario['Contrasena'];
    }
   #html con la estructura de las paginas
    echo  
    "<!DOCTYPE html>
    <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>EnlazadIn perfil</title>
            <link rel='shortcut icon' href='img/briefcase.png' type='image/x-icon'> <!-- Selecciona el ícono que aparece en la pestaña del navegador. -->
            <link rel='stylesheet' href='./css/perfil.css'>
        </head>
        <header>
            <div id='menu'>
                <ul>
                    <li id='logo'>
                        <a href='index.html'>
                            <img src='img/briefcase.png' width='50'>
                        </a>
                    </li>
                    <li id='nombre-pagina'>
                        <h1>EnlazadIN</h1>
                    </li>
                </ul>
            </div>
        </header>
        <body>
            <main>
                <form name='datos' method='post'>
                    <h1>Cambio de datos</h1>
                    Nombre: <input type='text' name='nombre' value={$Nombre}><br>
                    Apellidos: <input type='text' name='apellidos' value={$Apellidos}><br>
                    Email: <input type='text' name='email' value={$Email}><br>
                    DNI: <input type='text' name='dni' value={$DNI}><br>
                    Teléfono: <input type='text' name='telefono' value={$Telefono}><br>
                    Fecha de nacimiento: <input type='text' name='nacimiento' value={$Fecha_nacimiento}><br>
                    Introducir contraseña: <input type='text' name='password' value={$Contrasena}><br>
                    <input type='submit' name='Cambiardatos' class='button' value='Cambiar Datos' />
                </form>
                <form action='iniciado.html'>
                    <button id='volver' class='button'>Volver</button> <!-- Botón que vuelve atras. -->
                </form>
            </main>
            <div id='imagen'>
                <img src='img/undraw_Control_panel_re_y3ar.svg'>
            </div>
            <footer>
                Icons made by <a href='' title='juicy_fish'>juicy_fish</a> from <a href='https://www.flaticon.com/' title='Flaticon'>www.flaticon.com</a>
            </footer>
        </body>
    </html>";
    
    if(array_key_exists('Cambiardatos', $_POST)) { # detecta el momento en que el boton se pulsa
        
        $nom=$_POST['nombre']; # se guardan los valores del formulario en las variables lcoales a traves de un metodo post 
        $ape=$_POST['apellidos'];
        $mail=$_POST['email'];
        $dni=$_POST['dni'];
        $telf=$_POST['telefono'];
        
        $fnac=$_POST['nacimiento'];
        list($dia,$mes,$ano) = explode("-", $fnac);
        $fnac= $ano."/".$mes."/".$dia;
        
        $pasw=$_POST['password'];
# consulta sql 

        $sql = "UPDATE usuarios SET Nombre = '$nom',
                                    Apellidos = '$ape',
                                    Email = '$mail',
                                    DNI = '$dni',
                                    Telefono = '$telf',
                                    Fecha_nacimiento = '$fnac',
                                    Contrasena = '$pasw'
                                                        WHERE Email LIKE '$email';";

        if (mysqli_query($conn, $sql)) {# se ejecuta la consulta sql 
            printf ("Record updated successfully");# imprime en la terminal del buscador que ha salido bien 
            $_SESSION['email'] = $mail;  # guarda en la variable glogal el email para mantener la sesion inicada 
            echo '<script> window.location.href="/perfil.php"</script>'; # redirecciona al perfiñ
        }else {
            printf ("Error updating record: " . $conn->error); # algo ha salido mal y se imprime en la terminal del buscador 
          }
        }
?>