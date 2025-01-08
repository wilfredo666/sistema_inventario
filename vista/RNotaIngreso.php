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
          <th>#</th>
          <th>#Código Ingreso</th>
          <!-- <th>Concepto</th> -->
          <th>Fecha</th>
          <td>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $ingreso = ControladorVenta::ctrInfoIngresos();
        $c=0;
        foreach ($ingreso as $value) {
          $c=$c+1;
        ?>
          <tr>
            <td><?php echo $c ?></td>
            <td><?php echo $value["codigo"]; ?></td>
            <!-- <td><?php echo $value["concepto_ingreso"]; ?></td> -->
            <td><?php echo $value["fecha"]; ?></td>
            
            <td>
              <div class="btn-group">
                 <!-- funciones script en archivo reporte.js -->
                <!-- <button class="btn btn-sm btn-info" onclick="MVerNotaIngreso(<?php echo $value['id_nota_ingreso']; ?>)">
                  <i class="fas fa-eye"></i>
                </button> -->
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