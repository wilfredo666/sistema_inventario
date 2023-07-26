<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Registrar nuevo Cliente</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegPersonal">
  <div class="modal-body row">
    <div class="form-group col-md-12">
      <label for="">Nombres</label>
      <input type="text" class="form-control" id="nomPersonal" name="nomPersonal">
    </div>
    <div class="form-group col-md-6">
      <label for="">Apellido Paterno</label>
      <input type="text" class="form-control" id="patPersonal" name="patPersonal">
    </div>
    <div class="form-group col-md-6">
      <label for="">Apellido Materno</label>
      <input type="text" class="form-control" id="matPersonal" name="matPersonal">
    </div>
    <div class="form-group col-md-6">
      <label for="">N.I.T. / C.I.</label>
      <input type="text" class="form-control" id="ciPersonal" name="ciPersonal">
    </div>
    <div class="form-group col-md-6">
      <label for="">Fecha Nacimiento</label>
      <input type="date" class="form-control" id="nacPersonal" name="nacPersonal">
    </div>
    <div class="form-group col-md-6">
      <label for="">Cargo Personal</label>
      <input type="text" class="form-control" id="cargoPersonal" name="cargoPersonal">
    </div>
    <div class="form-group col-md-6">
      <label for="">Teléfono</label>
      <input type="text" class="form-control" id="telPersonal" name="telPersonal">
    </div>
    <div class="form-group col-md-12">
      <label for="">Dirección</label>
      <input type="text" class="form-control" id="dirPersonal" name="dirPersonal">
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
        RegPersonal()
      }
    })
    $(document).ready(function() {
      $("#FormRegPersonal").validate({
        rules: {
          nomPersonal: {
            required: true,
            minlength: 3
          },
          ciPersonal: {
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

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>