<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h4>Lista de Diseños</h4>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#ID</th>
          <th>Descripción Diseno</th>
          <td>
            <button class="btn btn-primary" onclick="MNuevoDiseno()">Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $diseno = ControladorDiseno::ctrInfoDisenos();

        foreach ($diseno as $value) {
        ?>
          <tr>
            <td><?php echo $value["id_diseno"]; ?></td>
            <td><?php echo $value["desc_diseno"]; ?></td>
            <td>
              <div class="btn-group">
                <button class="btn btn-sm btn-secondary" onclick="MEditDiseno(<?php echo $value['id_diseno']; ?>)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="MEliDiseno(<?php echo $value['id_diseno']; ?>)">
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