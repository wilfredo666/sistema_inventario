<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Asignar Horario a Materia</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegHorarioMateria">
  <div class="modal-body">
    <div class="alert mt-0 mb-2" style="background-color: #FAFAB9;" role="alert">
      <strong>Nota: </strong>Seleccionar el curso para mostrar los grupos disponibles
    </div>
    <div class="row">
      <div class="form-group col-sm-8">
        <label for="">Nombre del Curso</label>
        <select class="form-control" name="nomCurso" id="nomCurso" onchange="MostrarCurso()">
          <option value="">Seleccionar Curso</option>
          <?php
          require_once "../../controlador/cursoControlador.php";
          require_once "../../modelo/cursoModelo.php";
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

      <div class="form-group col-sm-12">
        <label for="">Nombre de la Materia</label>
        <select class="form-control select2bs4" name="nomMateria" id="nomMateria">
          <option value="">Seleccionar Materia</option>
          <?php
          require_once "../../controlador/materiaControlador.php";
          require_once "../../modelo/materiaModelo.php";
          $Horario = controladorMateria::ctrInfoListaMaterias();
          foreach ($Horario as $value) {
          ?>
            <option value="<?php echo $value["id_materia"]; ?>"><?php echo $value["nombre_materia"]; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-sm-12">
        <label for="">Nombre del Docente</label>
        <select class="form-control select2bs4" name="nomDocente" id="nomDocente">
          <option value="">Seleccionar Docente</option>
          <?php
          require_once "../../controlador/docenteControlador.php";
          require_once "../../modelo/docenteModelo.php";
          $docente = controladorDocente::ctrInfoDocentes();
          foreach ($docente as $value) {
          ?>
            <option value="<?php echo $value["id_docente"]; ?>"><?php echo $value["nombre_docente"] . " " . $value["ap_pat_docente"] . " " . $value["ap_mat_docente"]; ?></option>
          <?php
          }
          ?>
        </select>
      </div>

      <div class="form-group col-sm-12 mb-0">
        <label for="">Días de Clases</label><br>
        <div class="form-control border-0">
          <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Lunes" name="diaclase[]">
            <label class="form-check-label" for="inlineCheckbox1">Lunes</label>
          </div>
          <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Martes" name="diaclase[]">
            <label class="form-check-label" for="inlineCheckbox2">Martes</label>
          </div>
          <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Miercoles" name="diaclase[]">
            <label class="form-check-label" for="inlineCheckbox3">Miércoles</label>
          </div>
        </div>
      </div>
      <div class="form-group col-sm-12 form-control pt-0 mt-0 border-0">
        <div class="form-check form-check-inline ml-5">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Jueves" name="diaclase[]">
          <label class="form-check-label" for="inlineCheckbox4">Jueves</label>
        </div>
        <div class="form-check form-check-inline ml-5">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Viernes" name="diaclase[]">
          <label class="form-check-label" for="inlineCheckbox5">Viernes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Sabado" name="diaclase[]">
          <label class="form-check-label" for="inlineCheckbox6">Sábado</label>
        </div>
      </div>
      <div class="form-group col-sm-4">
        <label for="">Hora Inicio</label>
        <input type="time" class="form-control" id="horaInicio" name="horaInicio">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Hora Final</label>
        <input type="time" class="form-control" id="horaFin" name="horaFin">
      </div>
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
        RegHorarioMateria()
      }
    })
    $(document).ready(function() {
      $("#FormRegHorarioMateria").validate({
        rules: {},
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