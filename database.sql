
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

