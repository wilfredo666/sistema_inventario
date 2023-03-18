<?php
require "../../controlador/clienteControlador.php";
require "../../modelo/clienteModelo.php";

$id = $_GET["id"];
$cliente = ControladorCliente::ctrInfoCliente($id);
?>
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Editar Cliente</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditCliente">
  <div class="modal-body">
    <div class="form-group">
      <label for="">Razon Social Cliente</label>
      <input type="text" class="form-control" id="rzCliente" name="rzCliente" value="<?php echo $cliente["razon_social_cliente"]; ?>">
      <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $id; ?>">
    </div>
    <div class="form-group">
      <label for="">N.I.T. / C.I.</label>
      <input type="text" class="form-control" id="nitCliente" name="nitCliente" value="<?php echo $cliente["nit_ci_cliente"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Dirección</label>
      <input type="text" class="form-control" id="dirCliente" name="dirCliente" value="<?php echo $cliente["direccion_cliente"]; ?>">
      <p class="text-danger" id="error-pass"></p>
    </div>
    <div class="form-group">
      <label for="">Nombre del Cliente</label>
      <input type="text" class="form-control" id="nomCliente" name="nomCliente" value="<?php echo $cliente["nombre_cliente"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Teléfono del Cliente</label>
      <input type="text" class="form-control" id="telCliente" name="telCliente" value="<?php echo $cliente["telefono_cliente"]; ?>">
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <!-- <button type="button" class="btn btn-primary" onclick="Editcliente()">Guardar</button> -->
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>
</form>

<script>
  $(function(){
    $.validator.setDefaults({
      submitHandler:function(){
        EditCliente()
      }
    })
    $(document).ready(function(){
      $("#FormEditCliente").validate({
      rules:{
        rzCliente:{
          required:true,
          minlength:5
        },
        nitCliente:{
          required: true,
        },
        telCliente:{
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