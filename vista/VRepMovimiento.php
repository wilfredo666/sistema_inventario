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
                        <!-- Date range -->
                        <div class="form-group col-md-3">
                            <label>Rango de Fechas</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" id="reservation" name="reservation">
                            </div>
                            <!-- /.input group -->
                        </div>

                        <div class="form-group col-md-5">
                            <label>Lista de Productos</label>
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Producto:</span>
                                </div>
                                <select class="form-control select2bs4" name="producto" id="producto">
                                    <option value="">Seleccionar producto</option>
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

                        <div class="form-group col-md-4">
                            <label>Tipo de Movimiento</label>
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tipo: </span>
                                </div>

                                <select class="form-control input-group-append" name="tipoMovimiento" id="tipoMovimiento">
                                    <option value="">-- Seleccionar --</option>
                                    <option value="NS"> NS </option>
                                    <option value="NV"> NV </option>
                                    <option value="NI"> NI </option>
                                </select>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-navbar bg-secondary">
                                        <i class="fas fa-search "></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>

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