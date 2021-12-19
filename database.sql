
CREATE TABLE usuarios (
  Nombre varchar(20) NOT NULL,
  Apellidos varchar(20) NOT NULL,
  Email varchar(40) PRIMARY KEY,
  DNI varchar(10) UNIQUE,
  Telefono int(9) UNIQUE,
  Fecha_nacimiento varchar(10) NOT NULL,
  Cuenta_Bancaria varchar(255) NOT NULL,
  Contrasena varchar(255) NOT NULL
);

CREATE TABLE comentarios (
  ID int(4) PRIMARY KEY,
  NRECEP varchar(20) NOT NULL,
  ARECEP varchar(20) NOT NULL,
  ERECEP varchar(40) NOT NULL,
  Telefono int(9) NOT NULL,
  MSG varchar(8000) NOT NULL,
  EMISOR varchar(40) NOT NULL
);

INSERT INTO `comentarios` (`ID`, `NRECEP`, `ARECEP`, `ERECEP`, `Telefono`, `MSG`, `EMISOR`) VALUES
(1, 'Endika', 'Eiros', 'endika.eiros@gmail.com', 671024023, 'Vas a suspender mi asignatura, no sabes hacer PHP salu2', 'admin@ehu.eus'),
(2, 'iker', 'valcarcel', 'ikerval@gmail.com', 696544444, 'Esto no funciona man', 'endika.eiros@gmail.com'),
(3, 'iker', 'valcarcel', 'iker@gmail.com', 123456789, 'Esto funciona de locos, perdona la amenaza anterior', 'endika.eiros@gmail.com'),
(4, 'joaquin', 'gallego', 'joaquin@ucam.ca', 605031281, 'Borra esos tweets, la UPV es mejor que la UCAM 1º aviso', 'endika.eiros@gmail.com'),
(5, 'Anastasio', 'Perez', 'Anastasio@Ucam.com', 637570227, 'No hace falta dar un segundo aviso porque son facores', 'endika.eiros@gmail.com');


INSERT INTO `usuarios` (`Nombre`, `Apellidos`, `Email`, `DNI`, `Telefono`, `Fecha_nacimiento`, `Cuenta_Bancaria`, `Contrasena`) VALUES
('admin', 'admin', 'admin@ehu.eus', '05031281-P', 605031281, '1990/02/01', 'UVR2eUF0bzl5RHFXc2YvQzJRaHNNeUVqT2VxejVydFZXc2pWQzBFTjl4Yz06OtIv75gg16n/sRMbdszc4cQ=', '$2y$10$JTVkONw1.lO8.OZUUjMfSuJVjcXIu3lKyHd5T957UpyVgnC.xWLHC'),
('Endika', 'Eiros', 'endika.eiros@gmail.com', '79008225-M', 671024023, '2000/03/06', 'TW1tOFFwdEg5cjZvcGMyWDZsd2o4Vkd0UEh5YWUrUnYyTDFMZnZuMFQ4ND06OiXzisSM+yPXTTMtAlHmdSY=', '$2y$10$lJL13/Bbuddepu9oys6wIOhm7AEf0u2IpdOMeN78rk/ixmZmwZUJe');
