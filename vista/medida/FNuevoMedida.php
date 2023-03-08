
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Registrar nueva Unidad de Medida</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegMedida">
  <div class="modal-body">
    <div class="form-group">
      <label for="">Descripción de Unidad de Medida</label>
      <input type="text" class="form-control" id="descMedida" name="descMedida">
      <p id="error-login"></p>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
  </div>
</form>


<script>
  $(function(){
    $.validator.setDefaults({
      submitHandler:function(){
        RegMedida()
      }
    })
    $(document).ready(function(){
      $("#FormRegMedida").validate({
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