<?php
/*
* hecho por epsilon.
*
**/

$hostname = 'localhost';	
$database = 'AppWeb';		
$username = 'appweb';		// usuario creado para manejar la db AppWeb
$password = '321654';		// clave asignada al usuario creado

$conexion = new mysqli($hostname, $username, $password, $database);

if ($conexion->connect_errno) {
  echo "no se puede realizar la coneccion";
}

?>
