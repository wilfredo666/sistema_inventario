<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header pb-0">
    <div class="container-fluid">
      <h4>Reportes por Movimiento</h4>
    </div><!-- /.container-fluid -->
  </section>

  <div class="modal-body" style="padding-bottom: 0; padding-top: 1;">
    <div class="card">
      <!-- <form id="ReporteDePersonal"> -->
      <div class="card-body" style="padding-bottom: 0;">
        <div class="container col-md-12">
          <div class="row">
            <div class="form-group col-md-2">
              <label>Rango de Fechas</label>

              <div class="input-group">
                <div class="input-group">
                  <button type="button" class="btn btn-default float-right" name="daterange" id="daterange" onchange="reporteVentas()">
                    <span>
                      <i class="far fa-calendar-alt"></i> Rango de fecha
                    </span>
                    <i class="fas fa-caret-down"></i>
                  </button>
                </div>
              </div>
            </div>

            <div class="form-group col-md-5">
              <label>Lista de Productos</label>
              <div class="input-group mb-0">
                <div class="input-group-prepend">
                  <span class="input-group-text">Producto:</span>
                </div>
                <select class="form-control select2bs4" name="producto" id="producto">
                  <option value="0">Todos</option>
                  <?php
                  require_once "controlador/productoControlador.php";
                  require_once "modelo/productoModelo.php";
                  $producto = ControladorProducto::ctrInfoProductos();
                  foreach ($producto as $value) {
                  ?>
                    <option value="<?php echo $value["id_producto"]; ?>"><?php echo $value["nombre_producto"]; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>

            <!-- <div class="form-group col-md-4">
                <label>Tipo de Movimiento</label>
                <div class="input-group mb-0">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Tipo: </span>
                  </div>

                  <select class="form-control input-group-append" name="tipoMovimiento" id="tipoMovimiento">
                    <option value="NS"> NS </option>
                    <option value="NV"> Ventas </option>
                    <option value="NI"> NI </option>
                  </select>
                  <div class="input-group-append">
                    <button type="button" class="btn btn-navbar bg-secondary" onclick="consultaMovimiento()">
                      <i class="fas fa-search "></i>
                    </button>
                  </div>
                </div> -->
            <div class="d-flex align-items-center justify-content-center">
              <button type="button" class="btn btn-navbar bg-secondary " onclick="consultaMovMenorProd()" style="padding: 12px;">
                <i class="fas fa-search "></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!--contenedor de respuesta para la consulta-->
      <div id="respConsulta">

        <table id="DataTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#Código Venta</th>
              <th>Cliente</th>
              <th>Fecha</th>
              <th>Estado</th>
              <th>Total</th>
              <th>Descuento</th>
              <th>Neto</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $usuario = ControladorUsuario::ctrInfoUsuarios();

            foreach ($usuario as $value) {
            ?>
              <tr>
                <td><?php echo $value["id_usuario"]; ?></td>
                <td><?php echo $value["nombre_usuario"]; ?></td>
                <td><?php echo $value["login_usuario"]; ?></td>
                <td><?php echo $value["perfil"]; ?></td>
                <td><?php echo $value["ultimo_login"]; ?></td>
                <?php
                if ($value["estado"] == 1) {
                ?>
                  <td><span class="badge badge-success">Activo</span></td>
                <?php
                } else {
                ?>
                  <td><span class="badge badge-danger">Inactivo</span></td>
                <?php
                }
                ?>

                <td>
                  <div class="btn-group">

                    <button class="btn btn-sm dropdown-toggle" data-toggle="dropdown"></button>

                    <ul class="dropdown-menu">

                      <li>
                        <a href="permisos?<?php echo $value["id_usuario"]; ?>" class="dropdown-item" target="_blank">Permisos</a>
                      </li>
                      <li>
                        <a href="#" onclick="MVerUsuario(<?php echo $value["id_usuario"]; ?>)" class="dropdown-item">Información</a>
                      </li>

                    </ul>

                    <button class="btn btn-sm btn-secondary" onclick="MEditUsuario(<?php echo $value["id_usuario"]; ?>)">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" onclick="MEliUsuario(<?php echo $value["id_usuario"]; ?>)">
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

      </div>
    </div>
    <!-- </form> -->
  </div>
</div>
<!-- </div> -->

<script>
  $(function() {
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'DD/MM/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
  })
</script>