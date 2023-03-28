<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div>
  </section>

  <section class="content">
    <h4>Lista de Ventas Realizadas</h4>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#Factura</th>
          <th>Cliente</th>
          <th>Fecha</th>
          <th>Total</th>
          <th>Usuario</th>
          <th>Estado</th>
          <td>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $factura = ControladorVenta::ctrInfoVentas();

        foreach ($factura as $value) {
        ?>
          <tr>
            <td><?php echo $value["codigo_factura"]; ?></td>
            <td><?php echo $value["razon_social_cliente"]; ?></td>
            <td><?php echo $value["fecha_emision"]; ?></td>
            <td><?php echo $value["total"]; ?></td>
            <td><?php echo $value["login_usuario"]; ?></td>


            <?php
            if ($value["estado_factura"] == 1) {
            ?>
              <td><span class="badge badge-success">emitido</span></td>
            <?php
            } else {
            ?>
              <td><span class="badge badge-danger">Anulado</span></td>
            <?php
            }
            ?>


            <td>
              <div class="btn-group">
                <button class="btn btn-sm btn-info" onclick="MVerFactura(<?php echo $value["id_factura"]; ?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-sm  btn-danger" onclick="MAnularFactura(<?php echo $value["id_factura"]; ?>)">
                  <i class="fas fa-trash"></i>
                </button>
                <a href="vista/reporte/impNotaVenta.php?id=<?php echo $value["id_factura"]; ?>" class="btn btn-success" target="_blank">
                  <i class="fas fa-print"></i>
                </a>
              </div>
            </td>
          </tr>

        <?php
        }
        ?>

      </tbody>
    </table>

  </section>
</div>