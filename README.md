# bakcendtest
Para instalar el proyecto se necesitan las siguientes herramientas
-php versión 8.0
-composer versión 2+ 
-node js versión 14+

También es necesario tener un motor de base de datos mysql por lo cual se recomienda tener instalado algún servidor de aplicaciones como xampp, wampserver o el de su preferencia.

para descargar el proyecto se debe clonar desde git con el siguiente comando 

-git clone --branch master https://github.com/josueco123/bakcendtest.git

una vez descargado el proyecto se ingresa a la carpeta principal desde cualquier terminal con el comando 
-cd  bakcendtest

con el composer y el node ya instalados procedemos a instalar los paquetes necesarios para su funcionamiento con los siguientes comandos

-composer install

-npm install

con estos comandos se tiene instalados todos los paquetes necesarios para ejecutar la app, luego se tiene que configurar la aplicación para esto se debe crear una base de datos e importar el archivo sql enviado, después debes modificar en el archivo .env se el usuario y clave de la base de datos.

como paso siguiente se compila y ejecuta la app, para esto vamos a utilizar los siguientes comandos.

-npm run dev

-npm run watch

desde otro termina sin cerrar el proceso creado por el comando run watch ejecutamos el comando

-php artisan serve

con esto se podra ver el proyecto en la ruta http://localhost:8000/ o el puerto que hayas definido para ejecutar el servidor de php.



