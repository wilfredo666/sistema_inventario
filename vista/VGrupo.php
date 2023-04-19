<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h4>Lista de Grupos</h4>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#ID</th>
          <th>Descripción de Grupos</th>
          <td>
            <button class="btn btn-primary" onclick="MNuevoGrupo()">Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $grupo = ControladorGrupo::ctrInfoGrupos();

        foreach ($grupo as $value) {
        ?>
          <tr>
            <td><?php echo $value["id_grupo"]; ?></td>
            <td><?php echo $value["desc_grupo"]; ?></td>
            <td>
              <div class="btn-group">
                <!-- <button class="btn btn-sm btn-info" onclick="MVerGrupo(<?php echo $value["id_grupo"]; ?>)">
                  <i class="fas fa-eye"></i>
                </button> -->
                <button class="btn btn-sm btn-secondary" onclick="MEditGrupo(<?php echo $value['id_grupo']; ?>)">
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