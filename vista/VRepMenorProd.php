<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header pb-0">
    <div class="container-fluid">
      <h4>Reportes por Movimiento</h4>
    </div><!-- /.container-fluid -->
  </section>

  <div class="modal-body" style="padding-bottom: 0; padding-top: 1;">
    <div class="">
      <!-- <form id="ReporteDePersonal"> -->
      <div class="card-body" style="padding-bottom: 0;">
        <div class="container col-md-12">
          <div class="row">
            <div class="form-group col-md-3">

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
            
            <div class="form-group col-md-2">
            <a href="vista/KardexPro.php" class="btn btn-block btn-outline-success">
            <i class="fa fa-save"></i>
            Kardex
            </a>
            </div>
            
            <div class="form-group col-md-2"></div>
            
            <div class="form-group col-md-5">

              <div class="input-group my-colorpicker2 colorpicker-element">

                <div class="input-group-prepend">
                  <span class="input-group-text">
                    Productos:
                  </span>
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
                <div class="input-group-append">
                  <button class="input-group-text" onclick="consultaMovMenorProd()">
                    <i class="fas fa-search "></i>
                  </button>
                </div>
              </div>



            </div>


          </div>
        </div>
      </div>

      <!--contenedor de respuesta para la consulta-->
      <div id="respConsulta">

        <table id="DataTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#Código de Movimiento</th>
              <th>Cantidad [D|U]</th>
              <th>Fecha</th>
              <th>Tipo</th>
            </tr>
          </thead>
          <tbody>
            <div id="reporte">


            </div>
          </tbody>
        </table>

      </div>
    </div>
    <!-- </form> -->
  </div>
</div>
<!-- </div> -->