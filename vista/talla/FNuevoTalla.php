
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Registrar nueva Talla</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegTalla">
  <div class="modal-body">
    <div class="form-group">
      <label for="">Descripción de Talla</label>
      <input type="text" class="form-control" id="descTalla" name="descTalla">
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
        RegTalla()
      }
    })
    $(document).ready(function(){
      $("#FormRegTalla").validate({
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