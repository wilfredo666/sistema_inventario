<?php
require "../../controlador/proveedorControlador.php";
require "../../modelo/proveedorModelo.php";

$id = $_GET["id"];
$proveedor = ControladorProveedor::ctrInfoProveedor($id);

?>
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Información de Proveedor</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-sm-12">
      <table class="table">
        <tr>
          <th>Razon Social</th>
          <td><?php echo $proveedor["rs_proveedor"]; ?></td>
        </tr>

        <tr>
          <th>Nit/Ci</th>
          <td><?php echo $proveedor["nit_proveedor"]; ?></td>
        </tr>

        <tr>
          <th>Dirección</th>
          <td><?php echo $proveedor["direccion_prov"]; ?></td>
        </tr>

        <tr>
          <th>Teléfono</th>
          <td><?php echo $proveedor["telefono_prov"]; ?></td>
        </tr>
        <tr>
          <th>Correo electrónico</th>
          <td><?php echo $proveedor["email_proveedor"]; ?></td>
        </tr>

        <tr>
          <th>Contactos</th>
          <td><?php echo $proveedor["url_proveedor"]; ?></td>
        </tr>
        <tr>
        <th>Estado</th>
        <?php
        if ($proveedor["estado_proveedor"] == 1) {
        ?>
          <td><span class="badge badge-success">Activo</span></td>
        <?php
        } else {
        ?>
          <td><span class="badge badge-danger">Inactivo</span></td>
        <?php
        }
        ?>
         </tr>

      </table>

    </div>
  </div>

</div>