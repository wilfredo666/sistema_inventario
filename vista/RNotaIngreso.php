<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div>
  </section>

  <section class="content">
    <h4>Lista de Ingresos</h4>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#Código</th>
          <th>Concepto</th>
          <th>Fecha</th>
          <th>Estado</th>
          <td>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $ingreso = ControladorVenta::ctrInfoIngresos();

        foreach ($ingreso as $value) {
        ?>
          <tr>
            <td><?php echo $value["cod_nota_ingreso"]; ?></td>
            <td><?php echo $value["concepto_ingreso"]; ?></td>
            <td><?php echo $value["fecha_ingreso"]; ?></td>
            
            <?php
            if ($value["estado_nota_ingreso"] == 1) {
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
              <div class="btn-group">
                 <!-- funciones script en archivo reporte.js -->
                <button class="btn btn-sm btn-info" onclick="MVerNotaIngreso(<?php echo $value['id_nota_ingreso']; ?>)">
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