<?php

require_once "../../controlador/ventaControlador.php";
require_once "../../modelo/ventaModelo.php";

$id = $_GET["id"];

$factura = ControladorVenta::ctrInfoFactura($id);
$productos = json_decode($factura["detalle_factura"], true);
?>
<div class="modal-header">
  <h4 class="modal-title">Información de Factura</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-sm-6">

      <table class="table">
        <tr>
          <th>#Factura</th>
          <td><?php echo $factura["codigo_factura"]; ?></td>
        </tr>

        <tr>
          <th>Cliente</th>
          <td><?php echo $factura["razon_social_cliente"]; ?></td>
        </tr>

        <tr>
          <th>Fecha</th>
          <td><?php echo $factura["fecha_emision"]; ?></td>
        </tr>

        <tr>
          <th>Emitido por</th>
          <td><?php echo $factura["nombre_usuario"]; ?></td>
        </tr>

        <tr>
          <th>Estado</th>
          <td><?php
              if ($factura["estado_factura"] == 0) {
              ?>
              <span class="badge badge-danger">Anulado</span>
            <?php
              } else {
            ?>
              <span class="badge badge-success">Emitido</span>
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
          <th>Precio U.</th>
          <th>Total</th>
        </thead>
        <tbody>
          <?php
          $total = 0;
          foreach ($productos as $value) {
          ?>
            <tr>
              <td><?php echo $value["descProducto"]; ?></td>
              <td><?php echo $value["cantProducto"]; ?></td>
              <td><?php echo $value["preUnitario"]; ?></td>
              <td><?php echo $value["preTotal"]; ?></td>
            </tr>
          <?php
            $total = $total + $value["preTotal"];
          }
          ?>
          <tr>
            <td colspan="3"><b>Sub Total</b></td>
            <td><?php echo $factura["total"]; ?></td>
          </tr>
          <tr>
            <td colspan="3"><b>Descuento</b></td>
            <td><?php echo $factura["descuento"]; ?></td>
          </tr>
          <tr>
            <td colspan="3"><b>Total</b></td>
            <td><?php echo $factura["neto"]; ?></td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>

</div>