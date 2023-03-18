<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h4>Lista de Productos</h4>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Cod. Producto</th>
          <th>Nombre del Producto</th>
          <th>Talla</th>
          <th>Precio Venta</th>
          <th>Stock</th>
          <th>Imagen</th>
          <th>Estado</th>
          <td>
            <button class="btn btn-primary" onclick="MNuevoProducto()">Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $producto = ControladorProducto::ctrInfoProductos();

        foreach ($producto as $value) {
        ?>
          <tr>
            <td><?php echo $value["cod_producto"]; ?></td>
            <td><?php echo $value["nombre_producto"]; ?></td>
            <td><?php echo $value["desc_talla"]; ?></td>
            <td><?php echo $value["precio_venta"]; ?></td>
            <td><span class="badge badge-warning"> 50 docenas </span></td>
            <td><?php
                if ($value["imagen_producto"] == "") {
                ?>
                <img src="assest/dist/img/productos/product_default.png" width='100'>
              <?php
                } else {
              ?>
                <img src='assest/dist/img/productos/<?php echo $value["imagen_producto"]; ?>' width='100' height="100">
              <?php
                }
              ?>
            </td>
            <?php
            if ($value["estado"] == 1) {
            ?>
              <td><span class="badge badge-success">Disponible</span></td>
            <?php
            } else {
            ?>
              <td><span class="badge badge-danger">No disponible</span></td>
            <?php
            }
            ?>

            <td>
              <div class="btn-group">
                <button class="btn btn-sm btn-info" onclick="MVerProducto(<?php echo $value["id_producto"]; ?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-sm btn-secondary" onclick="MEditProducto(<?php echo $value["id_producto"]; ?>)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>

        <?php
        }
        ?>


      </tbody>
    </table>

  </section>
</div>