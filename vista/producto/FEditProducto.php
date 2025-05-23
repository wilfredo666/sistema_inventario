<?php
require "../../controlador/productoControlador.php";
require "../../modelo/productoModelo.php";

$id = $_GET["id"];
$producto = ControladorProducto::ctrInfoProducto($id);

?>

<form action="" id="FormEditProducto" enctype="multipart/form-data">
  <div class="modal-header bg-dark">
    <h4 class="modal-title font-weight-light">Editar Producto</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <div class="modal-body row">
    <div class="form-group col-md-4">
      <label for="">Cód. Producto</label>
      <input type="text" class="form-control" id="codProducto" name="codProducto" value="<?php echo $producto["cod_producto"] ?>">
      <input type="hidden" value="<?php echo $producto["id_producto"] ?>" name="idProducto" id="idProducto">
    </div>
    <div class="form-group col-md-8">
      <label for="">Nombre del Producto</label>
      <input type="text" class="form-control" id="nomProducto" name="nomProducto" value="<?php echo $producto["nombre_producto"] ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="">Costo Producto</label>
      <input type="number" class="form-control" id="costoProducto" name="costoProducto" value="<?php echo $producto["precio_costo"] ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="">Precio Producto</label>
      <input type="number" class="form-control" id="precioProducto" name="precioProducto" value="<?php echo $producto["precio_venta"] ?>">
    </div>
    <div class="form-group col-md-2">
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
    <div class="form-group col-md-4">
      <label for="">Tipo Producto</label>
      <select class="form-control select2bs4" name="categoriaProducto" id="categoriaProducto">
        <option value="">Seleccionar Tipo Producto</option>
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
      <label for="">Grupo</label>
      <select class="form-control select2bs4" name="grupoProducto" id="grupoProducto">
        <option value="">Seleccionar grupo</option>
        <?php
        require_once "../../controlador/grupoControlador.php";
        require_once "../../modelo/grupoModelo.php";
        $grupo = ControladorGrupo::ctrInfoGrupos();
        foreach ($grupo as $value) {
        ?>
        <option value="<?php echo $value["id_grupo"]; ?>" <?php if ($producto["id_grupo"] == $value["id_grupo"]) : ?> selected <?php endif; ?>><?php echo $value["desc_grupo"]; ?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="">Diseño</label>
      <select class="form-control select2bs4" name="disenoProducto" id="disenoProducto">
        <option value="">Seleccionar diseño</option>
        <?php
        require_once "../../controlador/disenoControlador.php";
        require_once "../../modelo/disenoModelo.php";
        $diseno = ControladorDiseno::ctrInfoDisenos();
        foreach ($diseno as $value) {
        ?>
        <option value="<?php echo $value["id_diseno"]; ?>" <?php if ($producto["id_diseno"] == $value["id_diseno"]) : ?> selected <?php endif; ?>><?php echo $value["desc_diseno"]; ?></option>
        <?php
        }
        ?>
      </select>
    </div>

    <div class="form-group col-md-4">
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
        <option value="<?php echo $value["id_color"]; ?>" style="background-color:<?php echo $value["img_color"]; ?>" <?php if ($producto["id_color"] == $value["id_color"]) : ?> selected <?php endif; ?>><?php echo $value["desc_color"]; ?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="">Estado</label>
      <select name="estadoProducto" id="estadoProducto" class="form-control">
        <option value="1" <?php if ($producto["estado"] == 1) : ?> selected <?php endif; ?>>Disponible</option>
        <option value="0" <?php if ($producto["estado"] == 0) : ?> selected <?php endif; ?>>No disponible</option>
      </select>
    </div>


    <div class="form-group col-md-6">
      <label for="">Imagen del Producto</label>
      <input type="file" class="form-control" id="ImgProducto" name="ImgProducto" onchange="previsualizar()">
      <input type="hidden" id="imgActProducto" name="imgActProducto" value="<?php echo $producto["imagen_producto"]; ?>">

    </div>

    <div class="form-group col-md-6" style="text-align: center;">
      <?php if (empty($producto["imagen_producto"]) || !preg_match("/\.(jpg|png)$/i", $producto["imagen_producto"])) {
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
</form>

<div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
  <button type="button" class="btn btn-primary" id="guardar" onclick="EditProducto()">Guardar</button>
</div>
