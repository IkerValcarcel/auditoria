# EnlazadIN
## Que es
EnlazadIN es una pagina en la que puedes hacer criticas a tus compañeros de trbajao/jefes de forma anonima.
Solamente se podran realizar criticas constructivas, el uso de la pagina para enviar insultos y ofensas no esta permitido.
## Pasos para poner en marcha el sistema:
### 1 
Descargarse el archivo "EnlazadIN.zip" y descomprimirlo 

### 2
Descargarse el archivo "EnlazadIN.zip" y descomprimir dicho archivo en /home en una carpeta que se llama EnlazadIN

### 3 
Abrir la terminal en la carpeta previamente creada y ejecutar los siguientes comandos;

1- Se genera el contenedor docker:
```bash
$ sudo docker build -t="web" .
```
2- Se pone en marcha dicho contenedor con el comando 
```bash
$ sudo docker-compose up
```

3- Se abre el buscador mozilla firefox y se introduce la siguiente url
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

## Gracias a   

Edit de este [repositorio](https://github.com/celsocelante/docker-lamp/issues/2) de github. 
Utiliza Linux + Apache + MariaDB (MySQL) + PHP 7.2 en Docker Compose.
