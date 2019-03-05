<?php
$hostname = 'localhost';
$database = 'AppWeb';
$username = 'appweb';
$password = '321654';

$conexion = new mysqli($hostname, $username, $password, $database);

if ($conexion->connect_errno) {
  echo "no se puede realizar la coneccion";
}
 ?>
