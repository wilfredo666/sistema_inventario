<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div>
  </section>

  <section class="content">
    <h4>Lista de Salidas</h4>
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
        $salida = ControladorVenta::ctrInfoSalidas();

        foreach ($salida as $value) {
        ?>
          <tr>
            <td><?php echo $value["cod_nota_salida"]; ?></td>
            <td><?php echo $value["concepto_salida"]; ?></td>
            <td><?php echo $value["fecha_salida"]; ?></td>
            
            <?php
            if ($value["estado_nota_salida"] == 1) {
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
                <button class="btn btn-sm btn-info" onclick="MVerNotaSalida(<?php echo $value['id_nota_salida']; ?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-sm  btn-danger" >
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