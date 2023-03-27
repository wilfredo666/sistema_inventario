<?php
require "../../controlador/proveedorControlador.php";
require "../../modelo/proveedorModelo.php";

$id = $_GET["id"];
$proveedor = Controladorproveedor::ctrInfoproveedor($id);
?>
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Editar Proveedor</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditProveedor">
  <div class="modal-body">
    <div class="form-group">
      <label for="">Razon Social</label>
      <input type="text" class="form-control" id="rzProveedor" name="rzProveedor" value="<?php echo $proveedor["rs_proveedor"]; ?>">
      <input type="hidden" name="idProveedor" id="idProveedor" value="<?php echo $id; ?>">
    </div>
    <div class="form-group">
      <label for="">N.I.T.</label>
      <input type="text" class="form-control" id="nitProveedor" name="nitProveedor" value="<?php echo $proveedor["nit_proveedor"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Dirección</label>
      <input type="text" class="form-control" id="dirProveedor" name="dirProveedor" value="<?php echo $proveedor["direccion_prov"]; ?>">
    </div>

    <div class="form-group">
      <label for="">Teléfono del Proveedor</label>
      <input type="text" class="form-control" id="telProveedor" name="telProveedor" value="<?php echo $proveedor["telefono_prov"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input type="email" class="form-control" id="emailProveedor" name="emailProveedor" value="<?php echo $proveedor["email_proveedor"]; ?>">
    </div>
    <div class="row">
      <div class="form-group col-md-8">
        <label for="">URL Proveedor</label>
        <input type="text" class="form-control" id="urlProveedor" name="urlProveedor" value="<?php echo $proveedor["url_proveedor"]; ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="">Estado</label>
        <select name="estadoProveedor" id="estadoProveedor" class="form-control">
          <option value="1" <?php if ($proveedor["estado_proveedor"] == "1") : ?>selected<?php endif; ?>>Activo</option>
          <option value="0" <?php if ($proveedor["estado_proveedor"] == "0") : ?>selected<?php endif; ?>>Inactivo</option>
        </select>
      </div>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <!-- <button type="button" class="btn btn-primary" onclick="Editproveedor()">Guardar</button> -->
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>
</form>

<script>
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        EditProveedor()
      }
    })
    $(document).ready(function() {
      $("#FormEditProveedor").validate({
        rules: {
          rzProveedor: {
            required: true,
            minlength: 5
          },
          nitProveedor: {
            required: true,
          },
          telProveedor: {
            required: true,
            minlength: 7
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