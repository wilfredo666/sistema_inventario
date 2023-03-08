<?php
require "../../controlador/colorControlador.php";
require "../../modelo/colorModelo.php";

$id = $_GET["id"];
$color = ControladorColor::ctrInfoColor($id);
?>
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Editar Color</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditColor">
  <div class="modal-body pb-0 mb-0">
    <div class="row pb-0 mb-0">
      <div class="form-group col-md-8">
        <label for="">Descripción de Color</label>
        <input type="text" class="form-control" id="desColor" name="desColor" value="<?php echo $color["desc_color"]?>">
        <input type="hidden" class="form-control" id="idColor" name="idColor" value="<?php echo $color["id_color"]?>">
        <p id="error-login"></p>
      </div>

      <div class="form-group col-md-4">
        <label for="codigoColor" class="form-label">Color de referencia</label>
        <input type="color" class="form-control form-control-color" id="codigoColor" name="codigoColor" value="<?php echo $color["img_color"]?>" list="codigoColor" title="Seleccione su color">
        <datalist id="codigoColor">
          <option value="#00ffff">
          <option value="#ff00ff">
          <option value="#ffff00">
          <option value="#ffaa00">
        </datalist>
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
        EditColor()
      }
    })
    $(document).ready(function() {
      $("#FormEditColor").validate({
        rules: {
          desColor: {
            required: true,
          }
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
</script>