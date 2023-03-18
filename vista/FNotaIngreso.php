<div class="content-wrapper">
  <section class="content-header"></section>
  <section class="content">

    <!--encabezado-->
    <form id="FNotaSalida" class="card card-primary card-outline">
      <div class="card-header">
        <h4 class="card-title" style="font-size:20px;">Nota de Ingreso</h4>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>

      <div class="card-body row">

        <div class="col-md-6">
          <div class="form-group col-md-12">
            <table id="DataTable_NVenta" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Cod. Producto</th>
                  <th>Descripción</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $producto = ControladorProducto::ctrInfoProductos();
                foreach ($producto as $value) {
                ?><tr>
                    <td class="pb-0 mb-0"><?php echo $value["cod_producto"]; ?></td>
                    <td class="pb-0 mb-0"><?php echo $value["nombre_producto"]; ?></td>
                    <td class="align-items-center text-center ">
                      <div class="btn-group ">
                        <button type="button" class="btn btn-info btn-sm" onclick="agregarCarrito3(<?php echo $value["id_producto"]; ?>)">
                          <i class="fas fa-plus"></i>
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
        <div class="col-md-6">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Código de Ingreso</span>
            </div>
            <input type="text" class="form-control" name="codSalida" id="codSalida" placeholder="Ingrese el código de ingreso">
            <p class="text-danger" id="error-numFactura"></p>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Concepto de Ingreso</span>
            </div>
            <input type="text" class="form-control" name="conceptoSalida" id="conceptoSalida" placeholder="Ingrese el concepto de ingreso">
            <p class="text-danger" id="error-numFactura"></p>
          </div>



          <table class="table">
            <thead>
              <tr>
                <th width=250px;>Descripción</th>
                <th>Cantidad</th>
                <!-- <th>P.Unitario</th>
                <th width=100px;>Total</th> -->
                <td>&nbsp;</td>
              </tr>
            </thead>
            <tbody id="listaDetalle3">
            </tbody>
            <tfooter>
              <!-- <tr>
                <td colspan="2"></td>
                <td colspan="3">
                  <div class="input-group sm-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="padding:0.15rem 0.5rem">Subtotal</span>
                    </div>
                    <input type="text" class="form-control form-control-sm" name="totalVenta" id="totalVenta" value="0.00" readonly style="text-align:right">
                  </div>

                  <div class="input-group sm-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="padding:0.15rem 0.5rem">Descuento</span>
                    </div>
                    <input type="text" id="descuentoVenta" class="form-control form-control-sm" onkeyup="calcularTotal()" value="0.00" style="text-align:right">
                  </div>

                  <div class="input-group sm-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="padding:0.15rem 0.5rem">Total</span>
                    </div>
                    <input type="text" id="netoVenta" readonly class="form-control form-control-sm" style="text-align:right" value="0.00">
                  </div>
                </td>
              </tr> -->
            </tfooter>

          </table>

        </div>

      </div>
      <div class="card-footer">
        <button class="btn btn-success float-right">Guardar</button>
      </div>
    </form>

  </section>
</div>