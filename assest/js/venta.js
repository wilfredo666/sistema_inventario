//********************* NOTA DE VENTA ********************

/*======================
carrito nota de VENTA
========================*/
var arregloCarritoNV = []
var listaDetalleNV = document.getElementById("listaDetalleNV")

function agregarCarritoNV() {
  const selectElement = document.getElementById('productoEmpaque');
  const idProd = selectElement.value;

  if (arregloCarritoNV.some(item => item.idProducto === idProd)) {
      toastr.error('El Producto ya fue agregado, seleccione otro producto...!!!')
    return;
  }

  var obj = {
    idProducto: idProd
  }
  $.ajax({
    type: "POST",
    url: "controlador/productoControlador.php?ctrBusProducto",
    data: obj,
    dataType: "json",
    success: function (data) {
      let objDetalle = {
        idProducto: data["id_producto"],
        descProducto: data["nombre_producto"],
        costoProducto: parseFloat(document.getElementById("ventaProducto").value),
        cantProdDocena: document.getElementById("ingDocenas").value,
        cantProdUnidad: document.getElementById("ingUnidades").value,
        descuentoCliente: document.getElementById("descuentoCliente").value
      }
      arregloCarritoNV.push(objDetalle)
      dibujarTablaCarritoNV()
    }
  })
}
/*=========================
DINUJA EL CARRITO NOTA DE EMPAQUE
==========================*/
function dibujarTablaCarritoNV() {
  listaDetalleNV.innerHTML = ""
  arregloCarritoNV.forEach((detalle) => {
    let precioUnidad = detalle.costoProducto / 12;
    let totalUnidades = (((parseInt(detalle.cantProdDocena)) * 12) + parseInt(detalle.cantProdUnidad));
    let costoTotalProducto = (totalUnidades * precioUnidad).toFixed(2);
    //total menos el descuento
    let descuento = ((parseFloat(costoTotalProducto) * parseFloat(detalle.descuentoCliente)) / 100);
    let totalNeto = parseFloat(costoTotalProducto) - ((parseFloat(costoTotalProducto) * parseFloat(detalle.descuentoCliente)) / 100)
    let fila = document.createElement("tr")

    fila.innerHTML = '<td>' + detalle.idProducto + '</td>' +
      '<td>' + detalle.descProducto + '</td>' +
      '<td>' + detalle.cantProdDocena + '</td>' +
      '<td>' + detalle.cantProdUnidad + '</td>' +
      '<td>' + detalle.costoProducto + '</td>' +
      '<td>' + costoTotalProducto + '</td>' +
      '<td>' + descuento.toFixed(2) + '</td>' +
      /* '<td>' + detalle.descuentoCliente + ' % </td>' + */
      '<td>' + totalNeto.toFixed(2) + '</td>' +
      '<td>' + '<a class="btn btn-danger btn-sm" onclick="eliminarProductoNV(' + detalle.idProducto + ')"><i class="fas fa-times-circle"></i></a>' + '</td>'

    listaDetalleNV.appendChild(fila)

  })

  totalesCantidadNV();
  limpiarFormularioNV();
}
/*=========================
SUMA DE LOS TOTALES DE LA TABLA DETALLE PRODUCTOS - NOTA EMPAQUE
==========================*/
function totalesCantidadNV() {
  var tabla = document.getElementById("detalleNE");
  const totalDocenas = document.getElementById('totalDocenas');
  const totalUnidades = document.getElementById('totalUnidades');
  const sumaCostoTotal = document.getElementById('totalCell');
  const totalNeto = document.getElementById('totalNeto');
  const totalDescuento = document.getElementById('totalDescuento');

  var sumaUnidades = 0;
  var sumaDocenas = 0;
  var sumaTotalCosto = 0;
  var neto = 0;
  var descuento = 0;

  // menos la ultima fila de la tabla SUMA DE UNIDADES
  for (var i = 0; i < tabla.rows.length - 1; i++) {
    var valorCelda = parseInt(tabla.rows[i].cells[3].textContent);
    if (!isNaN(valorCelda)) {
      sumaUnidades += valorCelda;
    }
  }

  // menos la ultima fila de la tabla SUMA DE DOCENAS
  for (var i = 0; i < tabla.rows.length - 1; i++) {
    var valorCelda = parseInt(tabla.rows[i].cells[2].textContent);
    if (!isNaN(valorCelda)) {
      sumaDocenas += valorCelda;
    }
  }

  // menos la ultima fila de la tabla SUMA DEL COSTO TOTAL
  for (var i = 0; i < tabla.rows.length - 1; i++) {
    var valorCelda = parseFloat(tabla.rows[i].cells[5].textContent);
    if (!isNaN(valorCelda)) {
      sumaTotalCosto += valorCelda;
    }
  }

  // menos la ultima fila de la tabla SUMA DE NETO TOTAL
  for (var i = 0; i < tabla.rows.length - 1; i++) {
    var valorCelda = parseFloat(tabla.rows[i].cells[7].textContent);
    if (!isNaN(valorCelda)) {
      neto += valorCelda;
    }
  }

  // menos la ultima fila de la tabla DESCUENTO TOTAL
  for (var i = 0; i < tabla.rows.length - 1; i++) {
    var valorCelda = parseFloat(tabla.rows[i].cells[6].textContent);
    if (!isNaN(valorCelda)) {
      descuento += valorCelda;
    }
  }

  var sumaTotalUnidades = (sumaDocenas * 12) + sumaUnidades;
  var docenaReales = Math.floor(sumaTotalUnidades / 12);
  var unidadReales = sumaTotalUnidades - (docenaReales * 12);
  // ENVIAR LOS VALORES TOTALES
  totalDocenas.textContent = docenaReales;
  totalUnidades.textContent = unidadReales;
  sumaCostoTotal.textContent = sumaTotalCosto.toFixed(2);
  totalNeto.textContent = neto.toFixed(2);
  totalDescuento.textContent = descuento.toFixed(2);
}
/*=========================
LIMPIAR EL FORMULARIO DE INGRESO DE PRODUCTOS
==========================*/
function limpiarFormularioNV() {
  const productoEmpaque = document.getElementById('productoEmpaque');
  const ingDocenas = document.getElementById('ingDocenas');
  const ingUnidades = document.getElementById('ingUnidades');
  const costoProducto = document.getElementById('costoProducto');

  //productoEmpaque.value = '';
  ingDocenas.value = 0;
  ingUnidades.value = 0;
  costoProducto.value = '';
}
/*=========================
ELIMINAR UN REGISTRO DE NOTA DE EMPAQUE
==========================*/
function eliminarProductoNV(id) {
  arregloCarritoNV = arregloCarritoNV.filter(
    (detalle) => {
      if (id != detalle.idProducto) {
        return detalle
      }
    }
  )
  dibujarTablaCarritoNV();
}

/*=========================
REGISTRO Y GUARDADO DE NOTA DE EMPAQUE
==========================*/
function GuardarNotaVenta() {
  //evaluando si hay algo en el carrito para guardar
  if (arregloCarritoNV.length != 0) {

    let fecha = document.getElementById("fecha").value
    let cliente = document.getElementById("cliente").value
    let nroComprobante = document.getElementById("nroComprobante").value
    let observacion = document.getElementById("observacion").value
    let total = document.getElementById("totalCell").innerHTML
    let totalNeto = document.getElementById("totalNeto").innerHTML
    let totalDescuento = document.getElementById("totalDescuento").innerHTML

    let obj = {
      "fecha": fecha,
      "cliente": cliente,
      "nroComprobante": nroComprobante,
      "observacion": observacion,
      "subTotal": total,
      "totalNeto": totalNeto,
      "totalDescuento": totalDescuento,
      "detalle": JSON.stringify(arregloCarritoNV)
    }

    $.ajax({
      type: "POST",
      url: "controlador/ventaControlador.php?ctrRegVenta",
      data: obj,
      cache: false,
      success: function (data) {
        /* console.log(data) */
        if (data == "ok") {
          Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            title: 'Nota de Venta registrada',
            timer: 1000
          })
          setTimeout(function () {
            location.reload()
          }, 1200)
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Error de registro',
            showConfirmButton: false,
            timer: 1500
          })
        }
      }
    })
  } else {
    document.getElementById("aviso").innerHTML = "*Nada que enviar"
  }
}