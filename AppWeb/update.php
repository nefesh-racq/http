<?php
include "conexion.php";

$id = $_POST['id'];
$x = $_POST['x'];
$y = $_POST['y'];

/*
* verificamos que halla un id para poder actualzar 
* los datos no nos interesa si tiene o no coordenadas
**/
if (!empty($id)) {
  $getId = "update coord set x=".$x.", y=".$y." where id=".$id;
  $data = $conexion->query($getId);

  echo "datos actualizados";
}
else {
  echo "no hay datos para la actualizacion";
}

?>
