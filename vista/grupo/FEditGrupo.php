<?php
require "../../controlador/grupoControlador.php";
require "../../modelo/grupoModelo.php";

$id = $_GET["id"];
$grupo = ControladorGrupo::ctrInfoGrupo($id);
?>
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Editar Grupo</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditGrupo">
  <div class="modal-body">
    <div class="form-group">
      <label for="">Descripción del Grupo</label>
      <input type="text" class="form-control" id="descGrupo" name="descGrupo" value="<?php echo $grupo["desc_grupo"]; ?>">
      <input type="hidden" name="idGrupo" id="idGrupo" value="<?php echo $id; ?>">
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <!-- <button type="button" class="btn btn-primary" onclick="EditGrupo()">Guardar</button> -->
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>
</form>

<script>
  $(function(){
    $.validator.setDefaults({
      
      submitHandler:function(){
        EditGrupo()
      }
    })
    $(document).ready(function(){
      $("#FormEditGrupo").validate({
      rules:{
        descGrupo:{
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