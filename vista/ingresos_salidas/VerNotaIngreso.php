<?php

require_once "../../controlador/ventaControlador.php";
require_once "../../modelo/ventaModelo.php";

$id = $_GET["id"];

$notaIngreso = ControladorVenta::ctrInfoNotaIngreso($id);
/* $productos=json_decode($factura["detalle_factura"],true); */
?>
<div class="modal-header">
  <h4 class="modal-title">Información de Nota de Ingreso</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-sm-6">

      <table class="table">
        <tr>
          <th>#Cod. Nota de Ingreso</th>
          <td><?php echo $notaIngreso["cod_nota_ingreso"]; ?></td>
        </tr>

        <tr>
          <th>Concepto de Ingreso</th>
          <td><?php echo $notaIngreso["concepto_ingreso"]; ?></td>
        </tr>

        <tr>
          <th>Detalle de Ingreso</th>
          <td><?php echo $notaIngreso["detalle_ingreso"]; ?></td>
        </tr>

        <tr>
          <th>Fecha</th>
          <td><?php echo $notaIngreso["fecha_ingreso"]; ?></td>
        </tr>

        <tr>
          <th>Estado</th>
          <td><?php
              if ($notaIngreso["estado_nota_ingreso"] == 0) {
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
            <td><?php echo $notaIngreso["detalle_ingreso"]; ?></td>
            <td><?php echo $notaIngreso["detalle_ingreso"]; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>