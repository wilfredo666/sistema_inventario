<div class="content-wrapper">
  <section class="content-header"></section>
  <section class="content">

    <!--encabezado-->
    <form id="FNotaEmpaque">
     <div class="card card-primary card-outline">
      <div class="card-header">
        <h4 class="card-title" style="font-size:20px;">Registrar Empaque</h4>
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


        <!--encabezado de datos para la nota-->
        <div class=" row">
          <div class="col-md-6">

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"># Nota de empaque</span>
              </div>
              <input type="text" class="form-control" name="codIngreso" id="codEmpaque" placeholder="Inserte el numero de empaque">
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Persona a cargo</span>
              </div>
              <select class="form-control select2bs4" name="personalEmpaque" id="personalEmpaque">
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
        </div>

        <!--tabla de productos seleccionados-->
        <div class=" row">
          <div class="col-md-12">

            <table class="table">
              <thead>
                <tr>
                  <th width=250px;>Descripción</th>
                  <th>Docenas</th>
                  <th>Unidades</th>
                  <th>Costo</th>
                  <th>Total<th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody id="listaDetalleNE">
              </tbody>

            </table>

          </div>
        </div>

      </div>

      <div class="card-footer">
        <button class="btn btn-success float-right">Guardar</button>
      </div>
      </div>
      
      <!--tabla donde elejir los productos-->
      <div class="card card-secondary card-outline">
      <div class="card-header">
        <h4 class="card-title" style="font-size:20px;">Elejir productos</h4>
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
        
        <div class="row">
          <div class="col-md-12">
            <div class="form-group col-md-12">
              <table id="DataTable_NVenta" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Cod. Producto</th>
                    <th>Descripción</th>
                    <th>Costo</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $producto = ControladorProducto::ctrInfoProductos();
                  foreach ($producto as $value) {
                  ?><tr>
                  <td class="pb-0 mb-0"><?php echo $value["cod_producto"]; ?></td>
                  <td class="pb-0 mb-0"><?php echo $value["nombre_producto"]." | ".$value["desc_grupo"]." | ". $value["desc_talla"]." | ".$value["desc_color"]; ?></td>
                  <td class="pb-0 mb-0"><?php echo $value["precio_costo"]; ?></td>
                  <td class="align-items-center text-center ">
                    <div class="btn-group ">
                      <button type="button" class="btn btn-info btn-sm" onclick="agregarCarritoNE(<?php echo $value["id_producto"]; ?>)">
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
        </div>
        
      </div>
      </div>
    </form>

  </section>
</div>

<script>
  //validacion para nota de salida
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        emitirNotaEmpaque()
      }
    });
    $("#FNotaEmpaque").validate({
      rules: {
        codEmpaque: {
          required: true,
          minlength: 1
        },
        personalEmpaque: {
          required: true
        }
      },

      errorElement: "span",
      errorPlacement: function(error, element) {
        error.addClass("invalid-feedback")
        element.closest(".input-group").append(error)
      },
      //destacar
      highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid")
      },

      //desmarcar
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass("is-invalid")
      }

    })
  })
</script>