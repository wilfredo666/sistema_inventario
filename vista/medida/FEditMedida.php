<?php
require "../../controlador/medidaControlador.php";
require "../../modelo/medidaModelo.php";

$id = $_GET["id"];
$medida = ControladorMedida::ctrInfoMedida($id);
?>
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Editar Unidad de Medida</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditMedida">
  <div class="modal-body">
    <div class="form-group">
      <label for="">Descripción de la Unidad de Medida</label>
      <input type="text" class="form-control" id="descMedida" name="descMedida" value="<?php echo $medida["desc_medida"]; ?>">
      <input type="hidden" name="idMedida" id="idMedida" value="<?php echo $id; ?>">
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <!-- <button type="button" class="btn btn-primary" onclick="EditMedida()">Guardar</button> -->
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>
</form>

<script>
  $(function(){
    $.validator.setDefaults({
      
      submitHandler:function(){
        EditMedida()
      }
    })
    $(document).ready(function(){
      $("#FormEditMedida").validate({
      rules:{
        descMedida:{
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