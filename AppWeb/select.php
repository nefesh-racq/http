<?php
include "conexion.php";

$id = $_GET['id'];

if (!empty($id)) {
  $sql = "select * from coord where id=".$id;
  $data = $conexion->query($sql);

  while ($row = $data->fetch_assoc()) {
    $coord[] = array_map('utf8_encode', $row);
  }

  /*
   * convertiendo el array en un objeto json
   * EL PRIMER echo QUE APARECE DEBE SER echo $json
   * oh da error, por que ese "echo" es el que muestra los datos
   * para que lo recupere la app
   *s
   */
  mysqli_close($conexion);

  $json = json_encode($coord);
  echo $json;

  
}
else {
  echo "no hay ningun dato";
}

?>
