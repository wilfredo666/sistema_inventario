<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h4>Lista de Proveedores</h4>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Razon Social</th>
          <th>N.I.T.</th>
          <th>Dirección</th>
          <th>Contactos</th>
          <!-- <th>Estado</th> -->
          <td>
            <button class="btn btn-primary" onclick="MNuevoProveedor()">Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $proveedor = ControladorProveedor::ctrInfoProveedors();

        foreach ($proveedor as $value) {
        ?>
          <tr>
            <td><?php echo $value["rs_proveedor"]; ?></td>
            <td><?php echo $value["nit_proveedor"]; ?></td>
            <td><?php echo $value["direccion_prov"]; ?></td>
            <td><?php echo $value["telefono_prov"]; ?></td>
            <td>
              <div class="btn-group">
                <button class="btn btn-sm btn-info" onclick="MVerProveedor(<?php echo $value["id_proveedor"]; ?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-sm btn-secondary" onclick="MEditProveedor(<?php echo $value["id_proveedor"]; ?>)">
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