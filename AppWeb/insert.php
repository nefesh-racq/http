<?php
include "conexion.php";

$id = 1;
$x = $_POST['x'];
$y = $_POST['y'];

if (!empty($x) && !empty($y)) {
  $getId = "select id from coord order by id desc";
  $data = $conexion->query($getId);

  /*
  * si existe algun registro
  * se recupera el ultimo id para generar nuestro id
  * 
  */
  if ($data->num_rows > 0) {
    $row = $data->fetch_assoc();
    echo $row['id']."<br>";
    $id = $row['id'] + 1;
  }

  $sql = "insert into coord values(".$id.",".$x.",".$y.")";
  mysqli_query($conexion, $sql) or die (mysql_error());
  mysqli_close($conexion);

  echo "datos regitrados correctamente";
}
else {
  echo "no hay ningun dato";
}

?>
