<?php
//capturamos la url y separamos el id de usuario
$path = parse_url($_SERVER['REQUEST_URI']);
global $id;
$id = $path["query"];


function permiso($idPermiso)
{
  global $id;

  $permiso = ControladorUsuario::ctrUsuarioPermiso($id, $idPermiso);
  return $permiso;
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
  </div>

  <div class="content">
    <div class="container-fluid">

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Permisos habiles para: <?php echo ""; ?></h3>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group clearfix">

                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary1" <?php if (permiso(1) != false): ?>checked<?php endif; ?> onChange="actualizarPermiso(<?php echo $id ?>,1)">
                        <label for="checkboxPrimary1">
                          Usuarios
                        </label>
                      </div>

                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group clearfix">

                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary2" <?php if (permiso(2) != NULL): ?>checked<?php endif; ?> onChange="actualizarPermiso(<?php echo $id ?>,2)">
                        <label for="checkboxPrimary2">
                          Clientes
                        </label>
                      </div>

                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group clearfix">

                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary3" <?php if (permiso(3) != NULL): ?>checked<?php endif; ?> onChange="actualizarPermiso(<?php echo $id ?>,3)">
                        <label for="checkboxPrimary3">
                          Productos
                        </label>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group clearfix">

                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary4" <?php if (permiso(4) != NULL): ?>checked<?php endif; ?> onChange="actualizarPermiso(<?php echo $id ?>,4)">
                        <label for="checkboxPrimary4">
                          Salidas
                        </label>
                      </div>

                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group clearfix">

                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary5" <?php if (permiso(5) != NULL): ?>checked<?php endif; ?> onChange="actualizarPermiso(<?php echo $id ?>,5)">
                        <label for="checkboxPrimary5">
                          Ingresos
                        </label>
                      </div>

                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group clearfix">

                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary6" <?php if (permiso(6) != NULL): ?>checked<?php endif; ?> onChange="actualizarPermiso(<?php echo $id ?>,6)">
                        <label for="checkboxPrimary6">
                          Reportes
                        </label>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group clearfix">

                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary7" <?php if (permiso(7) != NULL): ?>checked<?php endif; ?> onChange="actualizarPermiso(<?php echo $id ?>,7)">
                        <label for="checkboxPrimary7">
                          Personal
                        </label>
                      </div>

                    </div>
                  </div>
                  <div class="col-sm-4">

                  </div>
                  <div class="col-sm-4">

                  </div>
                </div>

              </div>

            </div>

          </div>
          <div class="card-footer clearfix">

          </div>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->