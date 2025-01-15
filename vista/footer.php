<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 1.0.0
  </div>
  <strong>Copyright &copy; 2024 <a href="https://ekesoft.es">Ekesoft</a>.</strong> Derechos reservados.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="assest/plugins/jquery/jquery.min.js"></script>
<!-- ChartJS -->
<script src="assest/plugins/chart.js/Chart.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="assest/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- Bootstrap 4 -->
<script src="assest/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assest/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="assest/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assest/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assest/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assest/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assest/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assest/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assest/plugins/jszip/jszip.min.js"></script>
<script src="assest/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assest/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assest/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assest/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assest/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- InputMask -->
<script src="assest/plugins/moment/moment.min.js"></script>
<script src="assest/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- SweetAlert2 -->
<script src="assest/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- date-range-picker -->
<!-- <script src="assest/plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="assest/dist/js/otros/jquery.min.js"></script>
<script type="text/javascript" src="assest/dist/js/otros/moment.min.js"></script> -->

<!-- Select2 -->
<script src="assest/plugins/select2/js/select2.full.min.js"></script>
<!-- dropzonejs -->
<script src="assest/plugins/dropzone/min/dropzone.min.js"></script>
<!-- toast -->
<script src="assest/plugins/toastr/toastr.min.js"></script>


<!-- Moment.js -->
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<!-- Date Range Picker JS -->
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<script>
  $(document).ready(function() {
    $('#daterange').daterangepicker({
      opens: 'right', // Muestra el selector a la derecha
      locale: {
        format: 'YYYY-MM-DD', // Formato de las fechas
        separator: ' a ', // Separador entre fechas
        applyLabel: 'Aplicar',
        cancelLabel: 'Cancelar',
        fromLabel: 'Desde',
        toLabel: 'Hasta',
        daysOfWeek: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
        monthNames: [
          'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
          'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ],
        firstDay: 1
      }
    });
  });
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
</script>

<script src="assest/js/usuario.js"></script>
<script src="assest/js/cliente.js"></script>
<script src="assest/js/producto.js"></script>
<script src="assest/js/categoria.js"></script>
<script src="assest/js/talla.js"></script>
<script src="assest/js/color.js"></script>
<script src="assest/js/medida.js"></script>
<script src="assest/js/factura.js"></script>
<script src="assest/js/proveedor.js"></script>
<script src="assest/js/reporte.js"></script>
<script src="assest/js/diseno.js"></script>
<script src="assest/js/grupo.js"></script>
<script src="assest/js/personal.js"></script>
<script src="assest/js/provInterno.js"></script>
<script src="assest/js/venta.js"></script>
<script src="assest/js/ventaOtros.js"></script>

<!--====================
seccion de modals
=====================-->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content" id="content-default">

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="content-lg">


    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-lg2">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="content-lg2">


    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-xl">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" id="content-xl">

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- jquery-validation -->
<script src="assest/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="assest/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="assest/plugins/jquery-validation/localization/messages_es.js"></script>

<script>
  /*dataTable generico*/
  $(function() {
    $("#DataTable").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"],
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      }
    }).buttons().container().appendTo('#DataTable_wrapper .col-md-6:eq(0)');

  });

  $(function() {
    $("#DataTable_producto").DataTable({
      "paging": true,
      "pageLength": 15,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "processing": true,
      //"serverSide": true, // Activar paginación del lado del servidor
      /*"ajax": {
        "url": "controlador/productoControlador.php?ctrInfoProductos", // Ruta al script del servidor que procesa la solicitud
        "type": "POST" // o "GET", según corresponda
      },*/
      "buttons": ["copy", "csv", "excel", "pdf", "print"],
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      }
    }).buttons().container().appendTo('#DataTable_producto_wrapper .col-md-6:eq(0)');

  });

  $(function() {
    $("#DataTableVenta").DataTable({
      "ordering": false,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"],
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      }
    }).buttons().container().appendTo('#DataTableVenta_wrapper .col-md-6:eq(0)');

  });

  $(function() {
    $("#DataTable_NVenta").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      }
    })

  });

  /*select2 para formulario NE*/
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>

<script>
  //validacion para Nota de venta
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        emitirFactura()
      }
    });
    $("#FNotaVenta").validate({
      rules: {
        nitCliente: {
          required: true
        },
        rsCliente: {
          required: true
        },
      },
      messages: {
        nitCliente: {
          required: "Inserte o seleccione un nit/ci"
        },
        rsCliente: {
          required: "El campo no puede estar vacio"
        },
      },

      //se crea el elemento span donde se escribira el mensaje
      errorElement: "span",
      errorPlacement: function(error, element) {
        error.addClass("invalid-feedback")
        element.closest(".input-group").append(error) //cambiar a .imput-group ya que es el elemento padre del input
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

  //validacion para nota de ingreso
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        emitirNotaIngreso()
      }
    });
    $("#FNotaIngreso").validate({
      rules: {
        codIngreso: {
          required: true,
          minlength: 1
        },
        conceptoIngreso: {
          required: true,
          minlength: 3
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

  //validacion para nota de salida
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        emitirNotaSalida()
      }
    });
    $("#FNotaSalida").validate({
      rules: {
        codSalida: {
          required: true,
          minlength: 1
        },
        conceptoSalida: {
          required: true,
          minlength: 3
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
<!-- ALERTAS TOAST -->
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: '../../dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });
</script>



</body>

</html>