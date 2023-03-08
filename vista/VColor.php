<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h4>Lista de Colores</h4>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#ID</th>
          <th>Descripción del Color</th>
          <th>Color</th>
          <td>
            <button class="btn btn-primary" onclick="MNuevoColor()">Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $color = ControladorColor::ctrInfoColores();

        foreach ($color as $value) {
        ?>
          <tr>
            <td><?php echo $value["id_color"]; ?></td>
            <td><?php echo $value["desc_color"]; ?></td>
            <td ><input type="button" style="background-color:<?php echo $value['img_color']?>; width: 60px;" ></td>
            <td>
              <div class="btn-group">
                <!-- <button class="btn btn-sm btn-info" onclick="MVerColor(<?php echo $value["id_color"]; ?>)">
                  <i class="fas fa-eye"></i>
                </button> -->
                <button class="btn btn-sm btn-secondary" onclick="MEditColor(<?php echo $value["id_color"]; ?>)">
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