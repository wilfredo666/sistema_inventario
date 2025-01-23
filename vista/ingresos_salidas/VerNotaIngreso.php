<?php

require_once "../../controlador/ventaControlador.php";
require_once "../../modelo/ventaModelo.php";

$id = $_GET["id"];
$codigo = $_GET["codigo"];

$notaIngreso = ControladorVenta::ctrInfoNotaIngreso($id, $codigo);
$productos = json_decode($notaIngreso["detalle"], true);

?>
<div class="modal-header">
  <h4 class="modal-title">Información de Nota de Ingreso</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-sm-12">

      <table class="table">
        <tr>
          <th>#Cod. Nota de Ingreso</th>
          <td><?php echo $notaIngreso["codigo"]; ?></td>
        </tr>

        <tr>
          <th>Fecha</th>
          <td><?php echo $notaIngreso["fecha"]; ?></td>
        </tr>

        <tr>
          <th>Observación</th>
          <td><?php echo $notaIngreso["observacion"]; ?></td>
        </tr>

        <!--  <tr>
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
        </tr> -->

      </table>

    </div>

  </div>
  <div class="col-sm-12">
    <table class="table">
      <thead class="bg-gradient-dark text-center">
        <th>Producto</th>
        <th>Docenas</th>
        <th>Unidades</th>
        <th>P/Docena</th>
        <th>Total</th>
      </thead>
      <tbody>
        <?php
        foreach ($productos as $producto) {
          $precioUnidad = $producto['costoProducto'] / 12;
          $totalUnidad = ($producto['cantProdDocena'] * 12) + $producto['cantProdUnidad'];
          $subTotal = $totalUnidad * $precioUnidad;
        ?>
          <tr class="text-center">
            <td><?php echo $producto['descProducto'] ?></td>
            <td><?php echo $producto['cantProdDocena'] ?></td>
            <td><?php echo $producto['cantProdUnidad'] ?></td>
            <td><?php echo $producto['costoProducto'] ?></td>
            <td><?php echo number_format(round($subTotal, 2), 2) ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

</div>