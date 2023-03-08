<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h4>Lista de Medidas</h4>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#ID</th>
          <th>Descripción Medida</th>
          <td>
            <button class="btn btn-primary" onclick="MNuevoMedida()">Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $medida = ControladorMedida::ctrInfoMedidas();

        foreach ($medida as $value) {
        ?>
          <tr>
            <td><?php echo $value["id_medida"]; ?></td>
            <td><?php echo $value["desc_medida"]; ?></td>
            <td>
              <div class="btn-group">
                <!-- <button class="btn btn-sm btn-info" onclick="MVerMedida(<?php echo $value["id_medida"]; ?>)">
                  <i class="fas fa-eye"></i>
                </button> -->
                <button class="btn btn-sm btn-secondary" onclick="MEditMedida(<?php echo $value["id_medida"]; ?>)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger">
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