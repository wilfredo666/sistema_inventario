<?php
require "../../controlador/disenoControlador.php";
require "../../modelo/disenoModelo.php";

$id = $_GET["id"];
$diseno = ControladorDiseno::ctrInfoDiseno($id);
?>
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Editar Diseño</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditDiseno">
  <div class="modal-body">
    <div class="form-group">
      <label for="">Descripción del Diseno</label>
      <input type="text" class="form-control" id="descDiseno" name="descDiseno" value="<?php echo $diseno["desc_diseno"]; ?>">
      <input type="hidden" name="idDiseno" id="idDiseno" value="<?php echo $id; ?>">
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <!-- <button type="button" class="btn btn-primary" onclick="EditDiseno()">Guardar</button> -->
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>
</form>

<script>
  $(function(){
    $.validator.setDefaults({
      
      submitHandler:function(){
        EditDiseno()
      }
    })
    $(document).ready(function(){
      $("#FormEditDiseno").validate({
      rules:{
        descDiseno:{
          required:true,
        }       
      },
      errorElement:'span',
      errorPlacement:function(error, element){
        error.addClass('invalid-feedback')
        element.closest('.form-group').append(error)
      },

      highlight: function(element, errorClass, validClass){
        $(element).addClass('is-invalid')
        /* .is-invalid */
      },

      unhighlight: function(element, errorClass, validClass){
        $(element).removeClass('is-invalid')
      }

    })
    })

  })

</script>