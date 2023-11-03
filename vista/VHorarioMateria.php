<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <p class="font-weight-light h4">Asignacion de Horarios a Materias</p>
    <table id="DataTable" class="display">

      <thead>
        <tr>
          <th>Materia</th>
          <th>Docente</th>
          <th>Días</th>
          <th>Horas</th>
          <th>Estado</th>
          <td>
            <button class="btn btn-primary btn-sm" onclick="MNuevoHorarioMateria()"> <i class="fas fa-plus"></i> Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $horario = ControladorMateria::ctrInfoHorarioMateria();

        foreach ($horario as $value) {
          $horaInicio = explode(":", $value['hora_inicio']);
          $horaFin = explode(":", $value['hora_fin']);
        ?>
          <tr>
            <td><?php echo $value["nombre_materia"]; ?></td>
            <td><?php echo $value["nombre_docente"]." ".$value["ap_pat_docente"]." ".$value["ap_mat_docente"]; ?></td>
            <td><?php echo $value["dias"]; ?></td>
            <td><?php echo $horaInicio[0] . ":" . $horaInicio[1] . " - " . $horaFin[0] . ":" . $horaFin[1]; ?></td>
            <?php
            if ($value["estado_horario"] == 1) {
            ?>
              <td><span class="badge badge-success">Activo</span></td>
            <?php
            } else {
            ?>
              <td><span class="badge badge-danger">Inactivo</span></td>
            <?php
            }
            ?>
            <td>
              <!-- FUNCIONES EN Horario.js -->
              <div class="btn-group">
                <button class="btn btn-sm btn-secondary" onclick="MEditHorarioMateria(<?php echo $value['id_horario']; ?>)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="MEliHorarioMateria(<?php echo $value['id_horario']; ?>)">
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