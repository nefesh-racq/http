EJEMPLO INSERT, SELECT, UPDATE, DELETE DESDE UNA APP A UN SERVIDOR 


PROGRAMAS. bajo debian 9.
*************************
apache2, php7.1, mariadb, android studio 3.0


BASE DE DATOS.
**************

ACCEDER A MARIADB.
******************
sudo mysql -u root -p


CREAR DB Y TABLA. DB=AppWeb  TABLE=coord(id, x, y).
***************************************************


create database AppWeb;

use AppWeb;

create table coord(id int, x double, y double);


CREAR USUARIO PARA LA DB.  USUARIO = appweb   PASSW = 321654
************************************************************

create user 'appweb' identified by '321654';

PERMISOS DE ACCESO LOCAL.
*************************

grant usage on *.* to 'appweb'@localhost identified by '321654';


PRIVILEGIOS PARA MANEJO DE LA DB.
*********************************

grant all privileges on AppWeb.* to 'appweb'@localhost;


APLICAR LOS CAMBIOS.
********************

flush privileges;


VERIFICAR LOS CAMBIOS.
**********************

show grants for 'appweb'@localhost;

YA PODEMOS SALIR E INGRASAR CON EL USUARIO appweb.
**************************************************

mysql -u appweb -p


COPIAR LA CARPETA AppWeb AL DIRECTORIO DEL SERVIDOR /var/www/html/
******************************************************************
