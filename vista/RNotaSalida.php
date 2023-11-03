<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div>
  </section>

  <section class="content">
    <h4>Lista de las Ventas</h4>
    <table id="DataTableVenta" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#Código Venta</th>
          <th>Cliente</th>
          <th>Fecha</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $salida = ControladorVenta::ctrInfoSalidas();

        foreach ($salida as $value) {
        ?>
          <tr>
            <td><?php echo $value["codigo_venta"]; ?></td>
            <td><?php echo $value["razon_social_cliente"]; ?></td>
            <td><?php echo $value["fecha_emision"]; ?></td>

            <?php
            if ($value["estado_venta"] == 1) {
            ?>
              <td><span class="badge badge-success">aceptado</span></td>
            <?php
            } else {
            ?>
              <td><span class="badge badge-danger">rechazado</span></td>
            <?php
            }
            ?>


            <td>
              <!-- funciones script en archivo reporte.js -->
              <div class="btn-group">
                <button class="btn btn-sm btn-info" onclick="MVerNotaSalida(<?php echo $value['id_venta']; ?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-sm  btn-danger">
                  <i class="fas fa-trash"></i>
                </button>
                <a class="btn btn-sm btn-dark" href="vista/reporte/repVenta.php?id=<?php echo $value["id_venta"]; ?>" target="_blank">
                  <i class="far fa-file-powerpoint"></i>
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