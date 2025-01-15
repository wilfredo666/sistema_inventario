function MVerNotaIngreso(id) {
  $("#modal-xl").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/ingresos_salidas/VerNotaIngreso.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-xl").html(data)
    }
  })
}

function MVerNotaSalida(id) {
  $("#modal-xl").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/ingresos_salidas/VerNotaSalida.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-xl").html(data)
    }
  })
}

function MVerNotaEntrega(id) {
  $("#modal-xl").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/factura/VerNotaEntrega.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-xl").html(data)
    }
  })
}
/* ====================================
REPORTE POR CLASIFICACIÓN
=======================================*/
function reporteClasificacion() {
  let form = new FormData($("#ReporteClasificacion")[0])

  $.ajax({
    type: "POST",
    url: "controlador/productoControlador.php?ctrRepClasificacion",
    data: form,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      /* $("#repServSolicitud").html(data) */
      console.log(data)
    }
  })
}

//de VRepMovimiento.php 
function consultaMovimiento(){
  let producto= document.getElementById("producto").value
  let reservation= document.getElementById("reservation").value
  let tipoMovimiento= document.getElementById("tipoMovimiento").value

  var obj = {
    producto:producto,
    reservation:reservation,
    tipoMovimiento:tipoMovimiento
  }
  
  $.ajax({
    type: "POST",
    url: "controlador/ventaControlador.php?ctrRepMovimiento",
    data: obj,
    success: function (data) {
      console.log(data)
    }
  })
}

/* ====================================
REPORTE MENOR POR PRODUCTO
=======================================*/
function consultaMovMenorProd() {
  const picker = $('#daterange').data('daterangepicker');
  const fechaInicial = picker.startDate.format('YYYY-MM-DD'); 
  const fechaFinal = picker.endDate.format('YYYY-MM-DD');

  let producto = document.getElementById('producto').value;

  var obj = {
      producto: producto,
      fechaInicial: fechaInicial,
      fechaFinal: fechaFinal
  };

  $.ajax({
      type: "POST",
      url: "controlador/ventaControlador.php?ctrRepMenorProd",
      data: obj,
      dataType: "json", 
      success: function (data) {
          if ($.fn.DataTable.isDataTable('#DataTable')) {
              $('#DataTable').DataTable().destroy();
          }
          $('#DataTable tbody').empty();

          data.forEach(item => {
            let tipoMovimiento = item.codigo.startsWith('S') ? 'Salida' : 
                                 item.codigo.startsWith('I') ? 'Ingreso' : 'Otro';

            $('#DataTable tbody').append(`
                <tr>
                    <td>${item.codigo}</td>
                    <td>${item.cantidad}</td>
                    <td>${item.fecha}</td>
                    <td>${tipoMovimiento}</td>
                </tr>
            `);
        });

          $('#DataTable').DataTable({
              responsive: true,
              lengthChange: false,
              autoWidth: false,
              buttons: ["copy", "csv", "excel", "pdf", "print"],
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
                      "last": "Último",
                      "next": "Siguiente",
                      "previous": "Anterior"
                  }
              }
          }).buttons().container().appendTo('#DataTable_wrapper .col-md-6:eq(0)');
      },
      error: function (xhr, status, error) {
          console.error('Error:', error);
          alert('Error al cargar los datos.');
      }
  });
}
