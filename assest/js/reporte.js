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
    producto:producto,
    fechaInicial:fechaInicial,
    fechaFinal:fechaFinal
   }

   $.ajax({
    type: "POST",
    url: "controlador/ventaControlador.php?ctrRepMenorProd",
    data: obj,
    success: function (data) {
      console.log(data)
    }
  })

}