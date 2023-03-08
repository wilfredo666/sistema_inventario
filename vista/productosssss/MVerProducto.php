<?php
require "../../controlador/productoControlador.php";
require "../../modelo/productoModelo.php";

$id=$_GET["id"];
$producto=ControladorProducto::ctrInfoProducto($id);

?>
<div class="modal-header encabezado">
  <h4 class="modal-title font-weight-light">Información de producto</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">


  <div class="row">

    <div class="col-6">
      <table class="table">
        <tr>
          <th>Cod. Producto</th>
          <td><?php echo $producto["cod_producto"];?></td>
        </tr>

        <tr>
          <th>Descripción</th>
          <td><?php echo $producto["nombre_producto"];?></td>
        </tr>

        <tr>
          <th>Disponibilidad</th>
          <?php 
          if($producto["estado"]==1){
          ?>
          <td><span class="badge badge-success">Disponible</span></td>
          <?php
          }else{
          ?>
          <td><span class="badge badge-danger">No disponible</span></td>
          <?php
          }
          ?>

        </tr>

      </table>
    </div>
    <div class="col-6">
     
     <?php 
      if($producto["imagen_producto"]==""){
        ?>
        <img src="assest/dist/img/productos/product_default.png" alt="" width="300">
        <?php
      }else{
        ?>
        <img src="assest/dist/img/productos/<?php echo $producto["imagen_producto"];?>" alt="" width="300">
        <?php
      }
      ?>
      
    </div>

  </div>



</div>

