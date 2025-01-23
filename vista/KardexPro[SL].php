<?php
//aqui un ejemplo sin libreria
header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=datos-produscto.xlsx");
?>
 <table border="1">
  <caption>Reporte de productos</caption>
  <tr>
    <th>ID</th>
    <th>Descripcion</th>
    <th>Precio</th>
  </tr>
  
  <tr>
    <td>1</td>
    <td>zapatos</td>
    <td>10</td>
  </tr>
  
    <tr>
    <td>2</td>
    <td>camisas</td>
    <td>15</td>
  </tr>
  
    <tr>
    <td>3</td>
    <td>pantalones</td>
    <td>20</td>
  </tr>
</table>