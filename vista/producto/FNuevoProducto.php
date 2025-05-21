<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Registrar nuevo Producto</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegProducto" enctype="multipart/form-data">
  <div class="modal-body row">
    <div class="form-group col-md-4">
      <label for="">Cód. Producto</label>
      <input type="text" class="form-control" id="codProducto" name="codProducto">
    </div>
    <div class="form-group col-md-8">
      <label for="">Nombre del Producto</label>
      <input type="text" class="form-control" id="nomProducto" name="nomProducto">
    </div>
    <div class="form-group col-md-4">
      <label for="">Costo Producto</label>
      <input type="number" class="form-control" id="costoProducto" name="costoProducto" placeholder="0.00">
    </div>
    <div class="form-group col-md-4">
      <label for="">Precio Producto</label>
      <input type="number" class="form-control" id="precioProducto" name="precioProducto" placeholder="0.00">
    </div>
    <div class="form-group col-md-4">
      <label for="">Talla</label>
      <select class="form-control select2bs4" name="tallaProducto" id="tallaProducto">
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

    <div class="form-group col-md-4">
      <label for="">Grupo</label>
      <select class="form-control select2bs4" name="grupoProducto" id="grupoProducto">
        <option value="">Seleccionar grupo</option>
        <?php
        require_once "../../controlador/grupoControlador.php";
        require_once "../../modelo/grupoModelo.php";
        $grupo = ControladorGrupo::ctrInfoGrupos();
        foreach ($grupo as $value) {
        ?>
        <option value="<?php echo $value["id_grupo"]; ?>"><?php echo $value["desc_grupo"]; ?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="">Diseño</label>
      <select class="form-control select2bs4" name="disenoProducto" id="disenoProducto">
        <option value="">Seleccionar diseño</option>
        <?php
        require_once "../../controlador/disenoControlador.php";
        require_once "../../modelo/disenoModelo.php";
        $diseno = ControladorDiseno::ctrInfoDisenos();
        foreach ($diseno as $value) {
        ?>
        <option value="<?php echo $value["id_diseno"]; ?>"><?php echo $value["desc_diseno"]; ?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="">Color</label>
      <select class="form-control select2bs4" name="colorProducto" id="colorProducto">
        <option value="">Seleccionar Color</option>
        <?php
        require_once "../../controlador/colorControlador.php";
        require_once "../../modelo/colorModelo.php";
        $color = ControladorColor::ctrInfoColores();
        foreach ($color as $value) {
        ?>
        <option value="<?php echo $value["id_color"]; ?>" style="background-color:<?php echo $value["img_color"];?>"><?php echo $value["desc_color"]; ?></option>
        <!-- <option value="<?php echo $value["id_color"]; ?>" type="button" style="background-color:<?php echo $value['img_color'] ?>; width: 60px;" ></option> -->
        <?php
        }
        ?>
      </select>
    </div>

    <div class="form-group col-md-6">
      <label for="">Tipo Producto</label>
      <select class="form-control select2bs4" name="categoriaProducto" id="categoriaProducto">
        <option value="">Seleccionar Tipo Producto</option>
        <?php
        require_once "../../controlador/categoriaControlador.php";
        require_once "../../modelo/categoriaModelo.php";
        $categoria = ControladorCategoria::ctrInfoCategorias();
        foreach ($categoria as $value) {
        ?>
        <option value="<?php echo $value["id_categoria"]; ?>"><?php echo $value["desc_categoria"]; ?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="">U. de Medida</label>
      <select class="form-control select2bs4" name="medidaProducto" id="medidaProducto">
        <option value="">Seleccionar U Medida</option>
        <?php
        require_once "../../controlador/medidaControlador.php";
        require_once "../../modelo/medidaModelo.php";
        $medida = ControladorMedida::ctrInfoMedidas();
        foreach ($medida as $value) {
        ?>
        <option value="<?php echo $value["id_medida"]; ?>"><?php echo $value["desc_medida"]; ?></option>
        <?php
        }
        ?>
      </select>
    </div>

      <div class="form-group col-md-6">
        <label for="">Imagen del Producto</label>
        <input type="file" class="form-control" id="ImgProducto" name="ImgProducto" onchange="previsualizar()">
      </div>

      <div class="form-group col-md-6" style="text-align: center;">
        <img src="assest/dist/img/productos/product_default.png" class="img-thumbnail previsualizar" width="200">
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
        RegProducto()
      }
    })
    $(document).ready(function() {
      $("#FormRegProducto").validate({
        rules: {
          codProducto: {
            required: true,
            minlength: 3
          },
          nomProducto: {
            required: true,
            minlength: 3
          },
          precioProducto: {
            required: true,
          },
          tallaProducto:"required"
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