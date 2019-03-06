<?php
include "conexion.php";

$id = $_POST['id'];

/*
* verificamos que halla un id para ejecutar la accion
* oh de lo contrario no hacer nada
*
**/
if (!empty($id)) {
  $getId = "delete from coord where id=".$id;
  $data = $conexion->query($getId);

  echo "datos eliminados";
}
else {
  echo "no hay datos para la eliminacion";
}

?>
