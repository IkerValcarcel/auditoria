# EnlazadIN
## Que es
EnlazadIN es una pagina en la que puedes hacer criticas a tus compañeros de trabajo/jefes de forma anonima.
Solamente se podran realizar criticas constructivas, el uso de la pagina para enviar insultos y ofensas no esta permitido.
## Pasos para poner en marcha el sistema:

### 1
Descargarse el archivo "auditoria.zip" y descomprimir dicho archivo en /home en una carpeta que se llama auditoria

### 2 
Abrir la terminal en la carpeta previamente creada y ejecutar los siguientes comandos;

1- Se genera el contenedor docker:
```bash
sudo docker build -t="auditoria" .
```
2- Se pone en marcha dicho contenedor con el comando 
```bash
sudo docker-compose up
```
3- Se abre el buscador mozilla firefox y se introduce la siguiente url:
[EnlazadIN](localhost:81/index.html)
### Para parar el contenedor 
Abrir la terminal en la carpeta de la aplicacion web
```bash
$ sudo docker build -t="web" .
$ sudo docker-compose up
```

Comando parar parar el container:
Para detener el container hay que presionar la tecla control izquierda y la letra c de forma simultanea o abir otra terminal en la misma carpeta e introducir  
```bash
$ sudo docker-compose down
```
Es necesario dar permisos al log para escribir 
```bash
$ sudo chmod 666 logs.txt
```

Hemos creado un usuario para usarse
USUARIO:: admin@ehu.eus
CONTRASEÑA:: Contraseña1!

## Gracias a   

Edit de este [repositorio](https://github.com/celsocelante/docker-lamp/issues/2) de github. 
Utiliza Linux + Apache + MariaDB (MySQL) + PHP 7.2 en Docker Compose.
