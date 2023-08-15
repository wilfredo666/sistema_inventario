<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Lista - Registro de Empaques
    </h5>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead class="text-center">
        <tr>
          <th>#ID</th>
          <th>Producto</th>
          <th>Talla</th>
          <th>Color</th>
          <th>Docenas</th>
          <th>Unidades</th>
          <td>
           <a class="btn btn-primary" href="FNEmpaque">Nuevo</a>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $provInterno = ControladorProvInterno::ctrInfoProvInternos();

        foreach ($provInterno as $value) {
        ?>
          <tr>
            <td><?php echo $value["id_entrega"]; ?></td>
            <td><?php echo $value["nombre_producto"]; ?></td>
            <td><?php echo $value["desc_talla"]; ?></td>
            <td class="text-center"> <span style="background-color: <?php echo $value["img_color"] ?>; width: 150px; color:<?php echo $value["img_color"] ?>"> .....................</span></td>
            <td class="text-center"><?php echo $value["docenas"]; ?></td>
            <td class="text-center"><?php echo $value["unidades"]; ?></td>
            <td>
              <div class="btn-group">
                <button class="btn btn-sm btn-secondary" onclick="MEditProvInterno(<?php echo $value['id_entrega']; ?>)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger"  onclick="MEliProvInterno(<?php echo $value['id_entrega'];?>)">
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