<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Registrar Nueva Asignacion</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegAsignacion">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-12">
        <label for="">Nombre del Estudiante</label>
        <select class="form-control select2bs4" name="nomEstudiante" id="nomEstudiante">
          <option value="">Seleccionar estudiante</option>
          <?php
          require_once "../../../controlador/estudianteControlador.php";
          require_once "../../../modelo/estudianteModelo.php";
          $estudiante = controladorEstudiante::ctrInfoEstudiantes();
          foreach ($estudiante as $value) {
          ?>
            <option value="<?php echo $value["id_estudiante"]; ?>"><?php echo $value["nombre_estudiante"] . " " . $value["ap_pat_estudiante"] . " " . $value["ap_mat_estudiante"]; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-sm-8">
        <label for="">Nombre del Curso</label>
        <select class="form-control" name="nomCurso" id="nomCurso" onchange="MostrarCurso()">
          <option value="">Seleccionar Curso</option>
          <?php
          require_once "../../../controlador/cursoControlador.php";
          require_once "../../../modelo/cursoModelo.php";
          $curso = controladorCurso::ctrInfoCursos();
          foreach ($curso as $value) {
          ?>
            <option value="<?php echo $value["id_curso"]; ?>"><?php echo $value["titulo_curso"]; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-sm-4">
        <label for="">Asignar Grupo</label>
        <select class="form-control" name="nombreGrupo" id="nombreGrupo" disabled>

        </select>
      </div>
    </div>
    <div class="alert mt-0 mb-0" style="background-color: #C1EDF0;" role="alert">
      <strong>Nota: </strong>Seleccionar el curso para mostrar los grupos
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
  </div>
</form>


<script>
  $(function() {
    $.validator.setDefaults({

      submitHandler: function() {
        RegGrupoAsig()
      }
    })
    $(document).ready(function() {
      $("#FormRegAsignacion").validate({
        rules: {
          nomEstudiante: "required",
          nomCurso: "required",
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback')
          element.closest('.form-group').append(error)
        },

        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid')
          /* .is-invalid */
        },

        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid')
        }

      })
    })

  })

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>