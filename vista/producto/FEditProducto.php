<?php
require "../../controlador/productoControlador.php";
require "../../modelo/productoModelo.php";

$id = $_GET["id"];
$producto = ControladorProducto::ctrInfoProducto($id);

?>


<div class="modal-header encabezado">
  <h4 class="modal-title font-weight-light">Editar Producto</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<form action="" id="FormEditProducto" enctype="multipart/form-data">
  <div class="row">
    <div class="modal-body row col-8">
      <div class="form-group col-md-4">
        <label for="">Cód. Producto</label>
        <input type="text" class="form-control" id="codProducto" name="codProducto" value="<?php echo $producto["cod_producto"] ?>">
        <input type="hidden" value="<?php echo $producto["id_producto"] ?>" name="idProducto" id="idProducto">
      </div>
      <div class="form-group col-md-8">
        <label for="">Nombre del Producto</label>
        <input type="text" class="form-control" id="nomProducto" name="nomProducto" value="<?php echo $producto["nombre_producto"] ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="">Costo Producto</label>
        <input type="number" class="form-control" id="costoProducto" name="costoProducto" value="<?php echo $producto["precio_costo"] ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="">Precio Producto</label>
        <input type="number" class="form-control" id="precioProducto" name="precioProducto" value="<?php echo $producto["precio_venta"] ?>">
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
            <option value="<?php echo $value["id_talla"]; ?>" <?php if ($producto["id_talla"] == $value["id_talla"]) : ?> selected <?php endif; ?>><?php echo $value["desc_talla"]; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="">Categoría</label>
        <select class="form-control select2bs4" name="categoriaProducto" id="categoriaProducto">
          <option value="">Seleccionar Categoría</option>
          <?php
          require_once "../../controlador/categoriaControlador.php";
          require_once "../../modelo/categoriaModelo.php";
          $categoria = ControladorCategoria::ctrInfoCategorias();
          foreach ($categoria as $value) {
          ?>
            <option value="<?php echo $value["id_categoria"]; ?>" <?php if ($producto["id_categoria"] == $value["id_categoria"]) : ?> selected <?php endif; ?>><?php echo $value["desc_categoria"]; ?></option>
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
            <option value="<?php echo $value["id_medida"]; ?>" <?php if ($producto["id_medida"] == $value["id_medida"]) : ?> selected <?php endif; ?>><?php echo $value["desc_medida"]; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="">Color</label>
        <select class="form-control select2bs4" name="colorProducto" id="colorProducto">
          <option value="">Seleccionar Color</option>
          <?php
          require_once "../../controlador/colorControlador.php";
          require_once "../../modelo/colorModelo.php";
          $color = ControladorColor::ctrInfoColores();
          foreach ($color as $value) {
          ?>
            <option value="<?php echo $value["id_color"]; ?>" style="background-color:<?php echo $value["img_color"]; ?>" <?php if ($producto["id_color"] == $value["id_color"]) : ?> selected <?php endif; ?>><?php echo $value["desc_color"]; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="">Estado</label>
        <select name="estadoProducto" id="estadoProducto" class="form-control">
          <option value="1" <?php if ($producto["estado"] == 1) : ?> selected <?php endif; ?>>Disponible</option>
          <option value="0" <?php if ($producto["estado"] == 0) : ?> selected <?php endif; ?>>No disponible</option>
        </select>
      </div>

    </div>

    <div class="row col-4 mt-3">
      <div class="form-group">
        <label for="">Imagen del Producto</label>
        <input type="file" class="form-control" id="ImgProducto" name="ImgProducto" onchange="previsualizar()">
        <input type="hidden" id="imgActProducto" name="imgActProducto" value="<?php echo $producto["imagen_producto"]; ?>">
        <?php if ($producto["imagen_producto"] == "") {
        ?>
          <img src="assest/dist/img/productos/product_default.png" class="img-thumbnail previsualizar" width="200">
        <?php
        } else {
        ?>
          <img src="assest/dist/img/productos/<?php echo $producto["imagen_producto"]; ?>" class="img-thumbnail previsualizar" width="200px" height="200px">
        <?php
        }
        ?>
      </div>
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
        EditProducto()
      }
    })
    $(document).ready(function() {
      $("#FormEditProducto").validate({
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
          tallaProducto: "required"
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