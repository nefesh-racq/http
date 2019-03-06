<?php
/**
* test insert, select desde una app en android a un servidor
* usando apache2
*
*/
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="myStyles.css" type="text/css" >
    <title></title>
  </head>
  <body>
      <table>
        <tr>
          <th>NRO</th>
          <th>LATITUD</th>
          <th>LONGITUD</th>
        </tr>
        <?php
          include "conexion.php";

          $sql = "select * from coord";
          $data = $conexion->query($sql);

          if ($data->num_rows > 0) {
            while ($row = $data->fetch_assoc()) {
              echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['x']."</td>
                <td>".$row['y']."</td>
              </tr>";
            }
          }

          $conexion->close();
        ?>
      </table>
  </body>
</html>
