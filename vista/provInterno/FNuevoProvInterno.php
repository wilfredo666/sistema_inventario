<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Registrar nuevo ProvInterno</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegProvInterno">
  <div class="modal-body row">
    <div class="form-group col-md-7">
      <label for="">Producto</label>
      <select class="form-control select2bs4" name="producto" id="producto">
        <option value="">Seleccionar Producto</option>
        <?php
        require_once "../../controlador/productoControlador.php";
        require_once "../../modelo/productoModelo.php";
        $producto = ControladorProducto::ctrInfoProductos();
        foreach ($producto as $value) {
        ?>
          <option value="<?php echo $value["id_producto"]; ?>"><?php echo $value["nombre_producto"]; ?></option>
        <?php
        }
        ?>
      </select>
    </div>

    <div class="form-group col-md-5">
      <label for="">Talla</label>
      <select class="form-control select2bs4" name="talla" id="talla">
        <option value="">Seleccionar talla</option>
        <?php
        require_once "../../controlador/tallaControlador.php";
        require_once "../../modelo/tallaModelo.php";
        $talla = ControladorTalla::ctrInfoTallas();
        foreach ($talla as $value) {
        ?>
          <option value="<?php echo $value["id_talla"]; ?>"><?php echo $value["desc_talla"]; ?></option>
        <?php
        }
        ?>
      </select>
    </div>

    <div class="form-group col-md-6">
      <label for="">Color</label>
      <select class="form-control select2bs4" name="color" id="color">
        <option value="">Seleccionar Color</option>
        <?php
        require_once "../../controlador/colorControlador.php";
        require_once "../../modelo/colorModelo.php";
        $color = ControladorColor::ctrInfoColores();
        foreach ($color as $value) {
        ?>
          <option value="<?php echo $value["id_color"]; ?>" style="background-color:<?php echo $value["img_color"]; ?>"><?php echo $value["desc_color"]; ?></option>
          <!-- <option value="<?php echo $value["id_color"]; ?>" type="button" style="background-color:<?php echo $value['img_color'] ?>; width: 60px;" ></option> -->
        <?php
        }
        ?>
      </select>
    </div>

    <div class="form-group col-md-3">
      <label for="">Docenas</label>
      <input type="number" class="form-control" id="docenas" name="docenas" placeholder="0">
    </div>

    <div class="form-group col-md-3">
      <label for="">Unidades</label>
      <input type="number" class="form-control" id="unidades" name="unidades" placeholder="0">
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
        RegProvInterno()
      }
    })
    $(document).ready(function() {
      $("#FormRegProvInterno").validate({
        rules: {
          producto: "required",
          docenas: {
            required: true
          },
          unidades: {
            required: true,
          },
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