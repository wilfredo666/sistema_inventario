
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
