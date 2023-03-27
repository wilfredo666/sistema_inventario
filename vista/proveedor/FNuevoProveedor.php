
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Registrar nuevo Proveedor</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegProveedor">
  <div class="modal-body">
    <div class="form-group">
      <label for="">Razon Social</label>
      <input type="text" class="form-control" id="rzProveedor" name="rzProveedor" placeholder="Razón Social del proveedor">
      <p id="error-login"></p>
    </div>
    <div class="form-group">
      <label for="">N.I.T.</label>
      <input type="text" class="form-control" id="nitProveedor" name="nitProveedor">
    </div>
    <div class="form-group">
      <label for="">Dirección</label>
      <input type="text" class="form-control" id="dirProveedor" name="dirProveedor">
      <p class="text-danger" id="error-pass"></p>
    </div>
    
    <div class="form-group">
      <label for="">Teléfono del Proveedor</label>
      <input type="text" class="form-control" id="telProveedor" name="telProveedor">
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input type="email" class="form-control" id="emailProveedor" name="emailProveedor" placeholder="Dirección correo electrónico">
    </div>
    <div class="form-group">
      <label for="">URL Proveedor</label>
      <input type="text" class="form-control" id="urlProveedor" name="urlProveedor">
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
        RegProveedor()
      }
    })
    $(document).ready(function(){
      $("#FormRegProveedor").validate({
      rules:{
        rzProveedor:{
          required:true,
          minlength:5
        },
        nitProveedor:{
          required: true,
        },
        telProveedor:{
          required:true,
          minlength:7
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