<?php
    require("db_con.php");  # se conecta con la base de datos 
    require("cifrado.php"); # necesita acceso a los algoritmos de cifrado
    require("tiemposesion.php");
    session_start();

    $clave = 'dVT@dp7FaJdt^PalSkHq2H$0w@Xbd7dy';

    if (permitir_acceso() != 0) #Si no esta iniciado o lleva mucho tiempo inactivo no se le permite acceso
        echo '<script> window.location.href="/cerrarsesion.php"</script>';
    

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
        
        $nbanc = desencriptar($usuario['Cuenta_Bancaria'],$clave);
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
                <form name='registrarse'>
                    <h1>Cambio de datos</h1>
                    Nombre: <input type='text' name='nombre' value={$Nombre}><br>
                    Apellidos: <input type='text' name='apellidos' value={$Apellidos}><br>
                    Email: <input type='text' name='email' value={$Email}><br>
                    DNI: <input type='text' name='dni' value={$DNI}><br>
                    Teléfono: <input type='text' name='telefono' value={$Telefono}><br>
                    Fecha de nacimiento: <input type='text' name='nacimiento' value={$Fecha_nacimiento}><br>
                    Numero de cuenta bancaria: <input type='text' name='cuenta_bancaria' value={$nbanc} ><br>
                    Introducir contraseña: <input type='password' name='password'><br>
                    <button type='button' class='button' onclick = 'return modificar_datos()' value='Modificar Datos'>Modificar Datos</button> <br>
                </form>
                <form action='btn_volver_tiempo_sesion.php'>
                    <button id='volver' class='button'>Volver</button> <!-- Botón que vuelve atras. -->
                </form>
            </main>
            <div id='imagen'>
                <img src='img/undraw_Control_panel_re_y3ar.svg'>
            </div>
            <footer>
                Icons made by <a href='' title='juicy_fish'>juicy_fish</a> from <a href='https://www.flaticon.com/' title='Flaticon'>www.flaticon.com</a>
            </footer>
            <script src='js/registro.js'></script> <!-- Esta etiqueta hace referencia al script que valida los datos del formulario antes de mandarlos. -->
        </body>
    </html>";
?>