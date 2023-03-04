<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h4>Lista de Clientes</h4>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Razon Social</th>
          <th>N.I.T.</th>
          <th>Dirección</th>
          <th>Contactos</th>
          <!-- <th>Estado</th> -->
          <td>
            <button class="btn btn-primary" onclick="MNuevoCliente()">Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $cliente = ControladorCliente::ctrInfoClientes();

        foreach ($cliente as $value) {
        ?>
          <tr>
            <td><?php echo $value["razon_social_cliente"]; ?></td>
            <td><?php echo $value["nit_ci_cliente"]; ?></td>
            <td><?php echo $value["direccion_cliente"]; ?></td>
            <td><?php echo $value["telefono_cliente"]; ?></td>
            

            <td>
              <div class="btn-group">
                <button class="btn btn-sm btn-info" onclick="MVerCliente(<?php echo $value["id_cliente"]; ?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-sm btn-secondary" onclick="MEditCliente(<?php echo $value["id_cliente"]; ?>)">
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