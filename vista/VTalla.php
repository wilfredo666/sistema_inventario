<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h4>Lista de Tallas</h4>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#ID</th>
          <th>Descripción Talla</th>
          <td>
            <button class="btn btn-primary" onclick="MNuevoTalla()">Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $talla = ControladorTalla::ctrInfoTallas();

        foreach ($talla as $value) {
        ?>
          <tr>
            <td><?php echo $value["id_talla"]; ?></td>
            <td><?php echo $value["desc_talla"]; ?></td>
            <td>
              <div class="btn-group">
                <!-- <button class="btn btn-sm btn-info" onclick="MVerTalla(<?php echo $value["id_talla"]; ?>)">
                  <i class="fas fa-eye"></i>
                </button> -->
                <button class="btn btn-sm btn-secondary" onclick="MEditTalla(<?php echo $value["id_talla"]; ?>)">
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