<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Lista del Personal
    </h5>
    <table id="DataTable" class="table table-bordered table-striped">

      <thead>
        <tr>
          <th>Nombres</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th>C.I.</th>
          <th>Cargo</th>
          <th>Contacto</th>
          <!-- <th>Estado</th> -->
          <td>
            <button class="btn btn-block btn-primary btn-sm" onclick="MNuevoPersonal()">
              <i class="fas fa-plus"></i>
              Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $personal = ControladorPersonal::ctrInformacionPersonal();
        foreach ($personal as $value) {
        ?>
          <tr>
            <td><?php echo $value["nombre_personal"]; ?></td>
            <td><?php echo $value["ap_pat_personal"]; ?></td>
            <td><?php echo $value["ap_mat_personal"]; ?></td>
            <td><?php echo $value["ci_personal"]; ?></td>
            <td><?php echo $value["cargo_personal"]; ?></td>
            <td><?php echo $value["contactos_personal"]; ?></td>
            <td>
              <div class="btn-group">
                <button class="btn btn-sm btn-info" onclick="MVerPersonal(<?php echo $value['id_personal']; ?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-sm btn-secondary" onclick="MEditPersonal(<?php echo $value['id_personal']; ?>)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="MEliPersonal(<?php echo $value['id_personal']; ?>)">
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