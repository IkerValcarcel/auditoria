<?php
 session_start();
 require("db_con.php"); # se conecta con la bd
 require("tiemposesion.php");

 if (permitir_acceso() != 0) #Si no esta iniciado o lleva mucho tiempo inactivo no se le permite acceso
    echo '<script> window.location.href="/cerrarsesion.php"</script>';

 echo
 "
 <!DOCTYPE html>
    <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>EnlazadIn perfil</title>
            <link rel='shortcut icon' href='img/briefcase.png' type='image/x-icon'> <!-- Selecciona el ícono que aparece en la pestaña del navegador. -->
            <link rel='stylesheet' href='./css/foro.css'>
        </head>
        <header>
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
        </header>
      <body>";
      $email= $_SESSION['email'];
      $foro2 = mysqli_query($conn, "SELECT * FROM comentarios WHERE EMISOR LIKE '$email';")or die (mysqli_error($conn));
# secuencia en la que imprime 
 foreach($foro2 as $comentario) :
  $ID = $comentario['ID'];

  $NRECEP = $comentario['NRECEP']; 
  $ARECEP = $comentario['ARECEP']; 
  $ERECEP = $comentario['ERECEP'];
  $Telefono = $comentario['Telefono'];
  $MSG = $comentario['MSG'];
    echo
    "
        <div id={$ID}>
            <p>{$ERECEP}</p>
            <p>{$MSG}</p>

            <button id='modificar' onclick='return redireccion({$ID})' class='button'>Modificar mensaje</button> <!-- Botón que lleva a modificar el mensaje. -->
            <button type='button' onclick = 'return confirmar({$ID})' value='Enviar'>Borrar mensaje</button> <br>
        </div>
      ";
endforeach;
echo
"
    <form action='btn_volver_tiempo_sesion.php'>
        <button id='volver' class='button'>Volver</button> <!-- Botón que vuelve atras. -->
    </form>
      <script src='js/modificarmensaje.js'></script> <!-- Esta etiqueta hace referencia al script que valida los datos del formulario antes de mandarlos. -->
  </body>
</html>
";

?>