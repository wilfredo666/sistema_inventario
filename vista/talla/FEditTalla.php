<?php
require "../../controlador/tallaControlador.php";
require "../../modelo/tallaModelo.php";

$id = $_GET["id"];
$talla = ControladorTalla::ctrInfoTalla($id);
?>
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Editar Talla</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditTalla">
  <div class="modal-body">
    <div class="form-group">
      <label for="">Descripción de la Talla</label>
      <input type="text" class="form-control" id="descTalla" name="descTalla" value="<?php echo $talla["desc_talla"]; ?>">
      <input type="hidden" name="idTalla" id="idTalla" value="<?php echo $id; ?>">
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <!-- <button type="button" class="btn btn-primary" onclick="EditTalla()">Guardar</button> -->
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>
</form>

<script>
  $(function(){
    $.validator.setDefaults({
      
      submitHandler:function(){
        EditTalla()
      }
    })
    $(document).ready(function(){
      $("#FormEditTalla").validate({
      rules:{
        descTalla:{
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