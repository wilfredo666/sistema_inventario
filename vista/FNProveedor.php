<div class="content-wrapper">
  <section class="content-header text-center pt-1 mt-1 pb-1 mb-1">
    <h4 class="align-item-center pt-0 mt-0 pb-0 mb-0 bg-dark">NOTA DE INGRESO POR PROVEEDORES EXTERNOS</h4>
  </section>
  <section class="content">

    <!--encabezado-->
    <form id="FNotaEmpaque">
      <div class="row">
        <div class="col-sm-6">
          <div class="card card-warning card-outline">
            <div class="card-header" style="background-color: #F4E280;">
              <h4 class="card-title" style="font-size:20px;">DATOS GENERALES</h4>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!--encabezado de datos para la nota-->
            <div class="card-body row pb-2 mb-2">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Fecha:</label>
                  <input type="date" class="form-control" name="fecha" id="fecha" value="<?php date_default_timezone_set('America/La_Paz'); echo date('Y-m-d'); ?>" readonly>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label>Proveedor Externo</label>
                  <input type="text" class="form-control" name="personal" id="personal" placeholder="Ingreso por Proveedor Externo">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Nro de Comprobante</label>
                  <?php
                  $item = null;
                  $valor = null;
                  $registros = ControladorProducto::ctrMostrarIngProv();

                  if ($registros == 0) {
                    echo '<input type="text" class="form-control" id="nroComprobante" name="nroComprobante" value="IP-1" readonly>';
                  } else {
                    $notaRegistro = ControladorProducto::ctrMostrarUltimaNPE();
                    $codigo = $notaRegistro["nro_comprobante_prov"];
                    $dividirCodigo = explode("-", $codigo);
                    $numeroCorrelativo = $dividirCodigo[1] + 1;

                    echo '<input type="text" class="form-control" id="nroComprobante" name="nroComprobante" value="IP-' . $numeroCorrelativo . '" readonly>';
                  }
                  ?>

                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label for="">Observación</label>
                  <textarea class="form-control" name="observacion" id="observacion" cols="30" rows="4" placeholder="Observaciones..."></textarea>
                </div>
              </div>
            </div>
            <!-- </div> -->
            <div class="card-footer text-right">
              <button type="button" class="btn btn-default bg-dark" onclick="location.reload();"><i class="fas fa-times"></i> Anular Nota</button>
              <a class="btn btn-success" onclick="GuardarNotaProv()"><i class="fas fa-download"></i> Guardar Nota</a>
            </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="card card-warning card-outline">
            <div class="card-header" style="background-color: #F4E280;">
              <h4 class="card-title" style="font-size:20px;">DETALLE DE ARTICULOS</h4>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!--encabezado de datos para la nota-->
            <div class="card-body row pb-0 mb-0">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Código EAN:</label>
                  <input type="text" class="form-control" name="codigoEAN" id="codigoEAN" placeholder="Código EAN" readonly>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label>Artículo / Descripción Porducto</label>
                  <select class="form-control select2bs4" name="productoEmpaque" id="productoEmpaque" onchange="datosProducto();">
                    <option value="">Seleccionar Artículo</option>
                    <?php
                    $producto = ControladorProducto::ctrInfoProductos();
                    foreach ($producto as $value) {
                    ?>
                    <option value="<?php echo $value["id_producto"]; ?>"><?php echo $value["nombre_producto"]; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <input type="hidden" name="descripcionProd" id="descripcionProd">
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Stock Docenas</label>
                  <input type="text" class="form-control" name="stockDocenas" id="stockDocenas" placeholder="0" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Stock Unidades</label>
                  <input type="text" class="form-control" name="stockUnidades" id="stockUnidades" placeholder="0" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Costo</label>
                  <input type="text" class="form-control" name="costoProducto" id="costoProducto" placeholder="0.00" readonly>
                  <input type="hidden" class="form-control" name="ventaProducto" id="ventaProducto" placeholder="0.00">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Ingreso Docenas</label>
                  <input type="text" class="form-control" name="ingDocenas" id="ingDocenas" placeholder="0" value="0">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Ingreso Unidades</label>
                  <input type="text" class="form-control" name="ingUnidades" id="ingUnidades" placeholder="0" value="0">
                </div>
              </div>
            </div>
            <!-- </div> -->
            <div class="card-footer text-right">
              <button type="button" class="btn btn-dark" onclick="validarFormularioNE()"><i class="fas fa-plus-circle"></i> Agregar Item</button>
            </div>
          </div>
        </div>
      </div>

      <!--tabla donde elejir los productos-->
      <div class="card card-warning card-outline">
        <div class="card-header bg-warning">
          <h4 class="card-title" style="font-size:20px;">DETALLE DE LA NOTA</h4>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>

        <div class="card-body">
          <style>
            td,
            th {
              border: #E7E7E7 1px solid;
            }

            .card-header {
              background-color: transparent;
              border-bottom: 1px solid rgba(0, 0, 0, 0.125);
              padding: 0.25rem 1.25rem;
              position: relative;
              border-top-left-radius: 0.25rem;
              border-top-right-radius: 0.25rem;
            }
          </style>
          <!--tabla de productos seleccionados-->
          <div class=" row">
            <div class="col-md-12">

              <table class="table" id="detalleNE">
                <thead class="text-center">
                  <tr>
                    <th>ID</th>
                    <th width=250px;>Descripción</th>
                    <th>Docenas</th>
                    <th>Unidades</th>
                    <th>Costo</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                    <!-- <th>&nbsp;</th> -->
                  </tr>
                </thead>
                <tbody class="text-center" id="listaDetalleNE">
                </tbody>
                <tfoot class="text-center">
                  <tr style="margin-right: 200px; padding-right: 500px;">
                    <td></td>
                    <th class="text-right">TOTALES:</th>
                    <td id="totalDocenas"></td>
                    <td id="totalUnidades"></td>
                    <td></td>
                    <td id="totalCell">0</td>
                    <td></td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </form>

  </section>
</div>