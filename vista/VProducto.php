<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Lista de Productos
    </h5>
    <table id="DataTable_producto" class="table table-bordered">
      <thead>
        <tr>
          <th>Cod. Producto</th>
          <th>Nombre del Producto</th>
          <th>Talla</th>
          <th>Precio Venta</th>
          <th>Costo</th>
          <th>Stock[D|U]</th>
          <th>Estado</th>
          <td style="padding: 12px;">
            <button class="btn btn-block btn-primary btn-xs" onclick="MNuevoProducto()">Nuevo</button>
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
          <td><?php echo $value["precio_costo"]; ?></td>
          <td><span class="badge badge-warning"> <?php $stock = ControladorProducto::ctrStockProducto($value["id_producto"]);
          if ($stock != false) {
            echo $stock["docenas"] . " | " . $stock["unidades"];
          } else {
            echo "0|0";
          }

            ?>
            </span></td>

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
              <button class="btn btn-xs btn-info" onclick="MVerProducto(<?php echo $value["id_producto"]; ?>)">
                <i class="fas fa-eye"></i>
              </button>
              <button class="btn btn-xs btn-secondary" onclick="MEditProducto(<?php echo $value["id_producto"]; ?>)">
                <i class="fas fa-edit"></i>
              </button>
              <button class="btn btn-xs btn-danger" onclick="MEliProducto(<?php echo $value["id_producto"]; ?>)">
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