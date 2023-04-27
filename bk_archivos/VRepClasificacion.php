<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header pb-0">
        <div class="container-fluid">
            <h4>Reportes por Clasificación</h4>
        </div><!-- /.container-fluid -->
    </section>

    <div class="modal-body" style="padding-bottom: 0; padding-top: 1;">
        <div class="card">
            <!-- <form id="ReporteDePersonal"> -->
            <div class="card-body" style="padding-bottom: 0;">
                <div class="container col-md-12">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Tallas</label>
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tallas:</span>
                                </div>
                                <select class="form-control select2bs4" name="talla" id="talla">
                                    <option value="">Seleccionar talla</option>
                                    <?php
                                    require_once "controlador/tallaControlador.php";
                                    require_once "modelo/tallaModelo.php";
                                    $tallas = ControladorTalla::ctrInfoTallas();
                                    foreach ($tallas as $value) {
                                    ?>
                                        <option value="<?php echo $value["id_talla"]; ?>"><?php echo $value["desc_talla"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Grupos</label>
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Grupos:</span>
                                </div>
                                <select class="form-control select2bs4" name="grupo" id="grupo">
                                    <option value="">Seleccionar grupo</option>
                                    <?php
                                    require_once "controlador/grupoControlador.php";
                                    require_once "modelo/grupoModelo.php";
                                    $grupos = Controladorgrupo::ctrInfogrupos();
                                    foreach ($grupos as $value) {
                                    ?>
                                        <option value="<?php echo $value["id_grupo"]; ?>"><?php echo $value["desc_grupo"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Diseños</label>
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Diseño:</span>
                                </div>
                                <select class="form-control select2bs4" name="diseño" id="diseño">
                                    <option value="">Seleccionar diseño</option>
                                    <?php
                                    require_once "controlador/disenoControlador.php";
                                    require_once "modelo/disenoModelo.php";
                                    $disenos = Controladordiseno::ctrInfodisenos();
                                    foreach ($disenos as $value) {
                                    ?>
                                        <option value="<?php echo $value["id_diseno"]; ?>"><?php echo $value["desc_diseno"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Color</label>
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Color:</span>
                                </div>
                                <select class="form-control select2bs4" name="color" id="color">
                                    <option value="">Seleccionar color</option>
                                    <?php
                                    require_once "controlador/colorControlador.php";
                                    require_once "modelo/colorModelo.php";
                                    $colors = ControladorColor::ctrInfocolores();
                                    foreach ($colors as $value) {
                                    ?>
                                        <option value="<?php echo $value["id_color"]; ?>"><?php echo $value["desc_color"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Tipo</label>
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tipo:</span>
                                </div>
                                <select class="form-control select2bs4" name="categoriaProducto" id="categoriaProducto">
                                    <option value="">Seleccionar Tipo Producto</option>
                                    <?php
                                    require_once "controlador/categoriaControlador.php";
                                    require_once "modelo/categoriaModelo.php";
                                    $categoria = ControladorCategoria::ctrInfoCategorias();
                                    foreach ($categoria as $value) {
                                    ?>
                                        <option value="<?php echo $value["id_categoria"]; ?>"><?php echo $value["desc_categoria"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="input-group-append butonEnviar">
                            <button type="button" class="btn btn-navbar bg-secondary" style="    height: min-content; width: 120px; margin-top: 15px; align-self: center;">
                                <i class="fas fa-search "></i> Buscar
                            </button>
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