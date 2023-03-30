<?php

require_once "../../controlador/ventaControlador.php";
require_once "../../modelo/ventaModelo.php";

$id = $_GET["id"];

$notaSalida = ControladorVenta::ctrInfoNotaSalida($id);
/* $productos=json_decode($factura["detalle_factura"],true); */
?>
<div class="modal-header">
  <h4 class="modal-title">Información de Nota de Salida</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-sm-6">

      <table class="table">
        <tr>
          <th>#Cod. Nota de Salida</th>
          <td><?php echo $notaSalida["cod_nota_salida"]; ?></td>
        </tr>

        <tr>
          <th>Concepto de Salida</th>
          <td><?php echo $notaSalida["concepto_salida"]; ?></td>
        </tr>

        <tr>
          <th>Detalle de Salida</th>
          <td><?php echo $notaSalida["detalle_nota_salida"]; ?></td>
        </tr>

        <tr>
          <th>Fecha</th>
          <td><?php echo $notaSalida["fecha_salida"]; ?></td>
        </tr>

        <tr>
          <th>Estado</th>
          <td><?php
              if ($notaSalida["estado_nota_salida"] == 0) {
              ?>
              <span class="badge badge-danger">Anulado</span>
            <?php
              } else {
            ?>
              <span class="badge badge-success">Aceptado</span>
            <?php
              } ?>
          </td>
        </tr>

      </table>

    </div>
    <div class="col-sm-6">
      <table class="table">
        <thead class="bg-gradient-dark">
          <th>Producto</th>
          <th>Cantidad</th>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $notaSalida["detalle_nota_salida"]; ?></td>
            <td><?php echo $notaSalida["detalle_nota_salida"]; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>