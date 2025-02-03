function MVerNotaIngreso(id,codigo) {
  $("#modal-xl").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/ingresos_salidas/VerNotaIngreso.php?id=" + id + "&codigo=" + codigo,
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

function MVerNotaSalidaOtros(id) {
  $("#modal-xl").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/ingresos_salidas/VerNotaSalidaOtros.php?id=" + id,
    data: obj,
    success: function (data) {
      console.log(data);

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
      console.log(data);


      if ($.fn.DataTable.isDataTable('#DataTable')) {
        $('#DataTable').DataTable().destroy();
      }
      $('#DataTable tbody').empty();

      data.forEach(item => {
        let tipoMovimiento = item.codigo.startsWith('S') ? 'Salida' : 
        item.codigo.startsWith('I') ? 'Ingreso' : 'Otro';

        let docenas = Math.floor(item.cantidad / 12);
        let unidades = Math.floor(item.cantidad % 12);

        let cantidad = `${docenas}  | ${unidades} `;

        $('#DataTable tbody').append(`
<tr>
<td>${item.codigo}</td>
<td>${cantidad}</td>
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

/* ====================================
Data picker - VRepMenorProd
=======================================*/

$("#dataCancelPicker").on("click" ,function(){
  window.location="VRepMenorProd"
})

var etiquetaY=[]
var etiquetaX=[]
//Date range as a button
$('#daterange-rmp').daterangepicker(
  {
    ranges   : {
      'Hoy'  : [moment(), moment()],
      'Ayer' : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Ultimos 7 Días' : [moment().subtract(6, 'days'), moment()],
      'Ultimos 30 Días': [moment().subtract(29, 'days'), moment()],
      'Este Mes'  : [moment().startOf('month'), moment().endOf('month')],
      'El mes pasado'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment().subtract(29, 'days'),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-rmp span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))


    /*    var fechaInicial=start.format('YYYY-MM-DD')
    var fechaFinal=end.format('YYYY-MM-DD')

    var fechaRmp={
      incio:fechaInicial,
      final:fechaFinal
    }*/


  }
) 

/* ====================================
Kardex de VRepMenorPro
es para sacar el inventario de productos por ITE
=======================================*/
function kardexPro(){
  const picker = $('#daterange-rmp').data('daterangepicker');
  const fechaInicial = picker.startDate.format('YYYY-MM-DD'); 
  const fechaFinal = picker.endDate.format('YYYY-MM-DD');

  let producto = document.getElementById('producto').value;

    // Construir la URL con parámetros
    let url = `vista/kardexPro.php?producto=${producto}&fechaInicial=${fechaInicial}&fechaFinal=${fechaFinal}`;
    
    // Redirigir a la URL para iniciar la descarga
    window.location.href = url;
}

/* ====================================
Data picker - inicio
=======================================*/
$("#dataCancelPicker") .on("click" ,function(){
  window.location="inicio"
})

var etiquetaY=[]
var etiquetaX=[]
//Date range as a button
$('#daterange-btn').daterangepicker(
  {
    ranges   : {
      'Hoy'  : [moment(), moment()],
      'Ayer' : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Ultimos 7 Días' : [moment().subtract(6, 'days'), moment()],
      'Ultimos 30 Días': [moment().subtract(29, 'days'), moment()],
      'Este Mes'  : [moment().startOf('month'), moment().endOf('month')],
      'El mes pasado'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment().subtract(29, 'days'),
    endDate  : moment()
  },

  function (start, end) {
    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))

    var fechaInicial=start.format('YYYY-MM-DD')
    var fechaFinal=end.format('YYYY-MM-DD')

    var obj={
      incio:fechaInicial,
      final:fechaFinal
    }

    $.ajax({
      type:"POST",
      //url:"controlador/facturaControlador.php?ctrReporteVentas",
      data:obj,
      dataType:"json",
      success:function(data){

        for(var i=0; i<data.length; i++){
          let year=data[i]["fecha_emision"].split(" ")

          etiquetaX.push(year[0])
          etiquetaY.push(parseFloat(data[i]["total"]))

        }
        graficoVentas(etiquetaX, etiquetaY)
      }
    })


  }
) 

function graficoVentas(etiquetaX, etiquetaY){

  // Sales graph chart
  var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d')
  // $('#revenue-chart').get(0).getContext('2d');

  var salesGraphChartData = {
    labels: etiquetaX,
    datasets: [
      {
        label: 'Digital Goods',
        fill: false,
        borderWidth: 2,
        lineTension: 0,
        spanGaps: true,
        borderColor: '#efefef',
        pointRadius: 3,
        pointHoverRadius: 7,
        pointColor: '#efefef',
        pointBackgroundColor: '#efefef',
        data: etiquetaY
      }
    ]
  }

  var salesGraphChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        ticks: {
          fontColor: '#efefef'
        },
        gridLines: {
          display: false,
          color: '#efefef',
          drawBorder: false
        }
      }],
      yAxes: [{
        ticks: {
          stepSize: 5000,
          fontColor: '#efefef'
        },
        gridLines: {
          display: true,
          color: '#efefef',
          drawBorder: false
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var salesGraphChart = new Chart(salesGraphChartCanvas, { // lgtm[js/unused-local-variable]
    type: 'line',
    data: salesGraphChartData,
    options: salesGraphChartOptions
  })

  }

function test(){
    let obj = ""

  $.ajax({
    type: "POST",
    url: "controlador/productoControlador.php?ctrInfoStockProducto",
    data: obj,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      console.log(data)
    }
  })
}