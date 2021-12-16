<?php

  $mysqli = new mysqli("db","admin","test","database");  # Establece la conexion con la base de datos
  $conn = mysqli_connect("db","admin","test","database"); # Establece la conexion con la base de datos
  
#  if ($conn) { # Test para probar si hay conexion con la base de datos
#     echo "Conexion establecida <br />";
#   }else {
#    echo $conn->error;
#  }
  
  $datos = mysqli_query($conn, 'SELECT * FROM usuarios ORDER BY DNI;')or die (mysqli_error($conn));  # Consulta que obtiene los datos de TODOS los usuarios
  #$foro = mysqli_query($conn, 'SELECT * FROM comentarios ORDER BY RAND() LIMIT 5;')or die (mysqli_error($conn));
  $foro = mysqli_query($conn, 'SELECT * FROM comentarios ORDER BY ID;')or die (mysqli_error($conn)); # Consulta que obtiene los datos de TODOS los comentarios
  $id = mysqli_query($conn, 'SELECT MAX(ID) FROM comentarios;')or die (mysqli_error($conn)); #  Consulta que obtiene el valor mas grande de id, se utiliza para calcular el siguiente

  #mysqli_close($conn);
?>