
CREATE TABLE usuarios (
  Nombre varchar(20) NOT NULL,
  Apellidos varchar(20) NOT NULL,
  Email varchar(40) PRIMARY KEY,
  DNI varchar(10) UNIQUE,
  Telefono int(9) UNIQUE,
  Fecha_nacimiento varchar(10) NOT NULL,
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

INSERT INTO usuarios VALUES  ('admin','admin','admin@ehu.eus','00262482-Y',600262482,'1995/12/8','test');

INSERT INTO usuarios VALUES  ('Endika','Eiros','endika.eiros@gmail.com','79008225-M',671024023,'2000/03/06','contraseña');
INSERT INTO usuarios VALUES  ('Iker','Valcarcel','ikervalcarcel@gmail.com','92639771-A',123456789,'2001/05/14','seguridad');
INSERT INTO usuarios VALUES  ('test1','test1','test1@outlook.com','42918286-X', 687245523,'2005/05/14','1234');
INSERT INTO usuarios VALUES  ('test2','test2','test2@yahoo.com','93360933-T',649964569,'1999/03/06','dinosaurio');
INSERT INTO usuarios VALUES  ('test3','test3','test3@protonmail.onion','00069420-Y',685560738,'2005/05/19','pescado');



INSERT INTO comentarios VALUES  (0000,'test1','test1','test1@gmail.com',429182866,'Eres muy pesado, no me importa tu vida ','endika.eiros@gmail.com');
INSERT INTO comentarios VALUES  (0001,'Endika','Eiros','endika.eiros@gmail.com',671024023,'Se pone  a hacer cosas extra cuando las obligatorias no estan erminadas','ikervalcarcel@gmail.com');
INSERT INTO comentarios VALUES  (0003,'test2','test2','test2@yahoo.com',649964569,'No me impportan tus hijos','ikervalcarcel@gmail.com');
INSERT INTO comentarios VALUES  (0004,'Endika','Eiros','endika.eiros@gmail.com',671024023,'Aprende a trabajar en quipo','ikervalcarcel@gmail.com');
INSERT INTO comentarios VALUES  (0005,'Iker','Valcarcel','ikervalcarcel@gmail.com',123456789,'Haz commits claros, y aprende a escribir ','endika.eiros@gmail.com');
INSERT INTO comentarios VALUES  (0006,'test3','test3','endika.eiros@gmail.com',685560738,'Deja de comer los sandwiches de otras personas','ikervalcarcel@gmail.com');
INSERT INTO comentarios VALUES  (0007,'test1','test1','test1@gmail.com',687245523,'No dejes cosas que mo fncionen el viernes a la tarde ','ikervalcarcel@gmail.com');
INSERT INTO comentarios VALUES  (0008,'Endika','Eiros','endika.eiros@gmail.com',671024023,'Comenta tu propio codigo!!!!!!','ikervalcarcel@gmail.com');
COMMIT;


