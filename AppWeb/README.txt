PROGRAMAS.
==========
apache2, php7.1, mariadb
bajo debian 9


BASE DE DATOS.
**************
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
