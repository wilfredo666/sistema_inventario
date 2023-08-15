<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <form action="" id="FormVenta">
        <div class="card">
          <div class="card-header bg-dark">
            <h2 class="card-title">Registrar nuevo Empaque</span></h2>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-sm-9 row">
              <div class="form-group col-md-3">
                <label for="">#Empaque</label>
                <input type="numer" class="form-control" name="numFactura" id="numFactura" readonly>
              </div>

              <div class="form-group col-md-9">
                <label for="">Personal</label>
                <select class="form-control select2bs4" name="personal" id="personal">
                  <option value="">Seleccionar Persona a cargo</option>
                  <?php

                  $producto = ControladorPersonal::ctrInformacionPersonal();
                  foreach ($producto as $value) {
                  ?>
                  <option value="<?php echo $value["id_personal"]; ?>"><?php echo $value["nombre_personal"]." ".$value["ap_pat_personal"]." ".$value["ap_mat_personal"]; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>

            </div>
            <div class="col-sm-3">
              <div class="card" style="backgroud-color:#f2f2f2">
                <div class="input-group sm-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Subtotal</span>
                  </div>
                  <input type="text" class="form-control" name="subTotal" id="subTotal" value="0.00" readonly style="text-align:right">
                </div>

                <div class="input-group sm-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Descuento</span>
                  </div>
                  <input type="text" class="form-control" name="descAdicional" id="descAdicional" value="0.00" style="text-align:right" onkeyup="calcularTotal()">
                </div>

                <div class="input-group sm-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Total</span>
                  </div>
                  <input type="text" class="form-control" name="totApagar" id="totApagar" value="0.00" readonly style="text-align:right">
                </div>

              </div>

            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success float-right">Guardar</button>
        </div>
        </div>
      </form>

    <!--agregar carrito-->
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">Agregar Productos</h2>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>

      </div>

      <div class="card-body">
        <div class="row">
          <div class="form-group col-md-2">
            <label for="">Cod. Producto</label>
            <div class="input-group">
              <input list="listaProductos" type="text" class="form-control" name="codProducto" id="codProducto" placeholder="Ingrese codigo">
              <input type="hidden" id="codProductoSin" name="codProductoSin">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" onclick="busProducto()">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>

            <datalist id="listaProductos">

            </datalist>
          </div>

          <div class="form-group col-md-6">
            <label for="">Descripcion</label>
            <input type="text" class="form-control" name="conceptoProducto" id="conceptoProducto">
          </div>

          <div class="form-group col-md-1">
            <label for="">Cantidad</label>
            <input type="text" class="form-control" name="cantProducto" id="cantProducto" value="0" onkeyup="calcularPrePro()">
          </div>

          <div class="form-group col-md-1">
            <label for="">P. Unit</label>
            <input type="text" class="form-control" name="preUnitario" id="preUnitario" value="0.00" readonly>
          </div>

          <div class="form-group col-md-1">
            <label for="">Total</label>
            <input type="text" class="form-control" name="preTotal" id="preTotal" value="0.00" readonly>
          </div>

          <div class="form-group col-md-1">
            <label for="">&nbsp;</label>
            <div class="input-group form-group">
              <button class="btn btn-info btn-circle form-control" onclick="agregarCarrito()">
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>

        </div>
        
        <div class="row">
          <div class="col-sm-12">
            <table class="table">
              <thead>
                <tr>
                  <th>Descripción</th>
                  <th>Cantidad</th>
                  <th>P. Unitario</th>
                  <th>P. Total</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>

              <tbody id="listaDetalle"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    </div><!-- /.container-fluid -->
  </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->