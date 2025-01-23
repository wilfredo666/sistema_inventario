<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div>
  </section>

  <section class="content">
    <h4>Lista de salidas por otros Conceptos</h4>
    <table id="DataTableVenta" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#Código Salida</th>
          <th>Concepto Salida</th>
          <th>Total Neto (Bs.)</th>
          <th>Fecha</th>
          <!-- <th>Estado</th> -->
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $salida = ControladorVenta::ctrInfoSalidasOtros();

        foreach ($salida as $value) {
        ?>
          <tr>
            <td><?php echo $value["codigo_salida_otros"]; ?></td>
            <td><?php echo $value["concepto_salida_otros"]; ?></td>
            <td><?php echo $value["neto_salida_otros"]; ?></td>
            <td><?php echo $value["fecha_salida_otros"]; ?></td>

            <!--  <?php
                  if ($value["estado_salida_otros"] == 1) {
                  ?>
              <td><span class="badge badge-success">aceptado</span></td>
            <?php
                  } else {
            ?>
              <td><span class="badge badge-danger">rechazado</span></td>
            <?php
                  }
            ?>
 -->

            <td>
              <!-- funciones script en archivo reporte.js -->
              <div class="btn-group">
                <button class="btn btn-sm btn-info" onclick="MVerNotaSalidaOtros(<?php echo $value['id_salida_otros']; ?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-sm  btn-danger">
                  <i class="fas fa-trash"></i>
                </button>
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