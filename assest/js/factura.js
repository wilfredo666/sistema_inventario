/*==========
carrito
============*/
var arregloCarrito = []
var listaDetalle = document.getElementById("listaDetalle")

function agregarCarrito(id) {
  var obj = {
    idProducto: id
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
        cantProducto: 1,
      }

      arregloCarrito.push(objDetalle)
      dibujarTablaCarrito()
    }
  })

  //calcularTotal()
}

function dibujarTablaCarrito() {

  listaDetalle.innerHTML = ""
  arregloCarrito.forEach((detalle) => {
    let fila = document.createElement("tr")

    fila.innerHTML = '<td>' + detalle.descProducto + '</td>' +
      '<td><input type="number" class="form-control form-control-sm" id="cantPro_' + detalle.idProducto + '" value="' + detalle.cantProducto + '" onkeyup="cantidadProd(' + detalle.idProducto + ')">' + '</td>'

    let tdEliminar = document.createElement("td")
    let botonEliminar = document.createElement("button")
    botonEliminar.classList.add("btn", "btn-danger", "btn-sm", "borrar")
    let icono = document.createElement("i")
    icono.classList.add("fas", "fa-trash")
    botonEliminar.appendChild(icono)
    botonEliminar.onclick = () => {
      eliminarCarrito(detalle.idProducto)
    }

    tdEliminar.appendChild(botonEliminar)
    fila.appendChild(tdEliminar)

    listaDetalle.appendChild(fila)
  })

}

function eliminarCarrito(idProd) {
  arregloCarrito = arregloCarrito.filter((detalle) => {
    if (idProd != detalle.idProducto) {
      return detalle
    }
  })
  dibujarTablaCarrito()
}


function cantidadProd(idProd) {
  let cantPro = parseInt(document.getElementById("cantPro_" + idProd).value)
  arregloCarrito.map(function (dato) {
    if (dato.idProducto == idProd) {
      dato.cantProducto = cantPro
    }
    return dato
  })
}


function MVerFactura(id) {
  $("#modal-xl").modal("show")
  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/factura/VerFactura.php?id=" + id,
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

/* Buscar datos del cliente */
function busCliente() {
  let nitCliente = document.getElementById("nitCliente").value
  var obj = {
    nitCliente: nitCliente
  }
  $.ajax({
    type: "POST",
    url: "controlador/clienteControlador.php?ctrBusCliente",
    data: obj,
    dataType: "json",
    success: function (data) {
      /* console.log(data) */
      document.getElementById("rsCliente").value = data["razon_social_cliente"]
      document.getElementById("idCliente").value = data["id_cliente"]
      document.getElementById("descuentoVenta").value = data["descuento"]
    }
  })
}

/*===================================
carrito2 - formmulario Nota de venta
====================================*/
var arregloCarrito2 = []
var listaDetalle2 = document.getElementById("listaDetalle2")
function agregarCarrito2(id) {
  var obj = {
    idProducto: id
  }
  $.ajax({
    type: "POST",
    url: "controlador/productoControlador.php?ctrBusProducto",
    data: obj,
    dataType: "json",
    success: function (data) {
      let objDetalle = {
        idProducto: parseInt(data["id_producto"]),
        descProducto: data["nombre_producto"],
        cantProducto: 0,
        preUnitario: parseFloat(data["precio_venta"]),
        preTotal: 0,
      }
      arregloCarrito2.push(objDetalle)
      dibujarTablaCarrito2()
    }
  })
}

function dibujarTablaCarrito2() {
  listaDetalle2.innerHTML = ""
  arregloCarrito2.forEach((detalle) => {
    let fila = document.createElement("tr")

    fila.innerHTML = '<td>' + detalle.descProducto + '</td>' +

      '<td><input type="number" class="form-control form-control-sm" id="cantProV_' + detalle.idProducto + '" value="' + detalle.cantProducto + '" onkeyup="calcularPreProdVenta(' + detalle.idProducto + ')">' + '</td>' +

      '<td><input type="number" class="form-control form-control-sm" id="preUnitV_' + detalle.idProducto + '" value="' + detalle.preUnitario + '" onkeyup="calcularPreProdVenta(' + detalle.idProducto + ')">' + '</td>' +


      '<td><input type="number" class="form-control form-control-sm" id="totalV_' + detalle.idProducto + '" value="' + detalle.preTotal + '" readonly>' + '</td>'

    let tdEliminar = document.createElement("td")
    let botonEliminar = document.createElement("button")
    botonEliminar.classList.add("btn", "btn-danger", "btn-sm", "borrar")
    let icono = document.createElement("i")
    icono.classList.add("fas", "fa-trash")
    botonEliminar.appendChild(icono)
    botonEliminar.onclick = () => {
      eliminarCarrito2(detalle.idProducto)
    }

    tdEliminar.appendChild(botonEliminar)
    fila.appendChild(tdEliminar)

    listaDetalle2.appendChild(fila)
  })
}

function eliminarCarrito2(idProd) {
  arregloCarrito2 = arregloCarrito2.filter((detalle) => {
    if (idProd != detalle.idProducto) {
      return detalle
    }
  })
  dibujarTablaCarrito2()
  calcularTotal()
}
/* arreglar funcion calcular precio total */
function calcularPreProdVenta(idProd) {
  let cantidad = parseInt(document.getElementById("cantProV_" + idProd).value)
  let preUnit = parseFloat(document.getElementById("preUnitV_" + idProd).value)
  //let total = parseFloat(document.getElementById("totalV_" + idProd).value)
  document.getElementById("totalV_" + idProd).value = parseFloat(cantidad * preUnit)

  arregloCarrito2.map(function (dato) {
    //console.log(dato);
    if (dato.idProducto == idProd) {
      dato.preUnitario = preUnit
      dato.cantProducto = cantidad
      dato.preTotal = parseFloat(preUnit * cantidad)
    }
    return dato
  })
  //dibujarTablaCarrito2()
  calcularTotal()
}

function descPreProducto() {
  let descProducto = parseFloat(document.getElementById("descProducto").value)
  let preUnitActual = parseFloat(document.getElementById("preUnitActual").value)
  document.getElementById("preUnitario").value = parseFloat(preUnitActual - descProducto)
  calcularPreProd()
}

function calcularTotal() {
  let totalCarrito = 0
  for (var i = 0; i < arregloCarrito2.length; i++) {
    totalCarrito = totalCarrito + parseFloat(arregloCarrito2[i].preTotal)
  }
  /*subtotal sin descuento*/
  document.getElementById("totalVenta").value = (totalCarrito).toFixed(2)
  /*calculo del descuento (%)*/
  let descuento = (totalCarrito / 100) * parseFloat(document.getElementById("descuentoVenta").value)
  document.getElementById("netoVenta").value = (totalCarrito - descuento).toFixed(2)
}

function emitirFactura() {
  let numFactura = document.getElementById("numFactura").value
  let idCliente = document.getElementById("idCliente").value
  let rsCliente = document.getElementById("rsCliente").value
  let totalVenta = document.getElementById("totalVenta").value
  let descuentoVenta = document.getElementById("descuentoVenta").value
  let netoVenta = document.getElementById("netoVenta").value

  let obj = {
    "numFactura": numFactura,
    "idCliente": idCliente,
    "totalVenta": totalVenta,
    "descuentoVenta": descuentoVenta,
    "netoVenta": netoVenta,
    "productos": JSON.stringify(arregloCarrito2)
  }

  $.ajax({
    type: "POST",
    url: "controlador/ventaControlador.php?ctrRegNotaVenta",
    data: obj,
    cache: false,
    success: function (data) {
      /* console.log(data); */
      if (data != "ok") {
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
}

function cmbEstadoVenta(id) {
  var obj = {
    idVenta: id
  }
  $.ajax({
    type: "POST",
    url: "controlador/ventaControlador.php?ctrCmbEstado",
    data: obj,
    cache: false,
    success: function (data) {
      if (data == "ok") {
        document.getElementById("estadoFactura_" + id).innerHTML = ""
        document.getElementById("estadoFactura_" + id).innerHTML = '<span class="badge badge-success">Emitido</span>'
      }

    }
  })
}

function MAnularFactura(id) {
  var obj = {
    idVenta: id
  }

  Swal.fire({
    title: 'Esta seguro de anular esta factura?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/ventaControlador.php?ctrAnularVenta",
        success: function (data) {

          if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Factura anulada',
              timer: 1000
            })
            document.getElementById("estadoFactura_" + id).innerHTML = ""
            document.getElementById("estadoFactura_" + id).innerHTML = '<span class="badge badge-danger">Anulado</span>'
          }
        }
      })
    }
  })
}

/* PARA NOTA DE SALIDA */
function emitirNotaSalida() {

  let codSalida = document.getElementById("codSalida").value
  let conceptoSalida = document.getElementById("conceptoSalida").value

  let obj = {
    "codSalida": codSalida,
    "conceptoSalida": conceptoSalida,
    "productos": JSON.stringify(arregloCarritoNS)
  }

  $.ajax({
    type: "POST",
    url: "controlador/ventaControlador.php?ctrRegNotaSalida",
    data: obj,
    cache: false,
    success: function (data) {
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Nota de Salida registrada',
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
}

/*==========
carrito - nota de salida
============*/
var arregloCarritoNS = []
var listaDetalleNS = document.getElementById("listaDetalleNS")

function agregarCarritoNS(id) {
  var obj = {
    idProducto: id
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
        cantProducto: 1,
      }
      arregloCarritoNS.push(objDetalle)
      dibujarTablaCarritoNS()
    }
  })
}

function dibujarTablaCarritoNS() {
  listaDetalleNS.innerHTML = ""
  arregloCarritoNS.forEach((detalle) => {
    let fila = document.createElement("tr")

    fila.innerHTML = '<td>' + detalle.descProducto + '</td>' +
      '<td><input type="number" class="form-control form-control-sm" id="cantProV_' + detalle.idProducto + '" value="' + detalle.cantProducto + '" onkeyup="actCantidadNS(' + detalle.idProducto + ')">' + '</td>'

    let tdEliminar = document.createElement("td")
    let botonEliminar = document.createElement("button")
    botonEliminar.classList.add("btn", "btn-danger", "btn-sm", "borrar")
    let icono = document.createElement("i")
    icono.classList.add("fas", "fa-trash")
    botonEliminar.appendChild(icono)
    botonEliminar.onclick = () => {
      eliminarCarritoNS(detalle.idProducto)
    }

    tdEliminar.appendChild(botonEliminar)
    fila.appendChild(tdEliminar)

    listaDetalleNS.appendChild(fila)
  })
}

function eliminarCarritoNS(idProd) {
  arregloCarritoNS = arregloCarritoNS.filter((detalle) => {
    if (idProd != detalle.idProducto) {
      return detalle
    }
  })
  dibujarTablaCarritoNS()
}

function actCantidadNS(idProd) {
  let cantidad = parseInt(document.getElementById("cantProV_" + idProd).value)
  arregloCarritoNS.map(function (dato) {
    if (dato.idProducto == idProd) {
      dato.cantProducto = cantidad
    }
    return dato
  })
}

/*======================
carrito nota de ingreso
========================*/
var arregloCarritoNI = []
var listaDetalleNI = document.getElementById("listaDetalleNI")
function agregarCarritoNI(id) {
  var obj = {
    idProducto: id
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
        cantProducto: 1,
      }
      arregloCarritoNI.push(objDetalle)
      dibujarTablaCarritoNI()
    }
  })
}


function dibujarTablaCarritoNI() {
  listaDetalleNI.innerHTML = ""
  arregloCarritoNI.forEach((detalle) => {
    let fila = document.createElement("tr")

    fila.innerHTML = '<td>' + detalle.descProducto + '</td>' +
      '<td><input type="number" class="form-control form-control-sm" id="cantProV_' + detalle.idProducto + '" value="' + detalle.cantProducto + '" onkeyup="actCantidadNI(' + detalle.idProducto + ')">' + '</td>'

    let tdEliminar = document.createElement("td")
    let botonEliminar = document.createElement("button")
    botonEliminar.classList.add("btn", "btn-danger", "btn-sm", "borrar")
    let icono = document.createElement("i")
    icono.classList.add("fas", "fa-trash")
    botonEliminar.appendChild(icono)
    botonEliminar.onclick = () => {
      eliminarCarritoNI(detalle.idProducto)
    }

    tdEliminar.appendChild(botonEliminar)
    fila.appendChild(tdEliminar)

    listaDetalleNI.appendChild(fila)
  })
}

//********************* NOTA DE EMPAQUE ********************

/*======================
carrito nota de empaque
========================*/
var arregloCarritoNE = []
var listaDetalleNE = document.getElementById("listaDetalleNE")

function agregarCarritoNE() {
  const selectElement = document.getElementById('productoEmpaque');
  const idProd = selectElement.value;
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
        //costoProducto: data["precio_costo"],
        costoProducto: parseFloat(document.getElementById("costoProducto").value),
        cantProdDocena: document.getElementById("ingDocenas").value,
        cantProdUnidad: document.getElementById("ingUnidades").value
      }
      arregloCarritoNE.push(objDetalle)
      dibujarTablaCarritoNE()
    }
  })
}
/*=========================
DINUJA EL CARRITO NOTA DE EMPAQUE
==========================*/
function dibujarTablaCarritoNE() {
  listaDetalleNE.innerHTML = ""
  arregloCarritoNE.forEach((detalle) => {
    //console.log(detalle);
    let precioUnidad = detalle.costoProducto / 12;
    let totalUnidades = (((parseInt(detalle.cantProdDocena)) * 12) + parseInt(detalle.cantProdUnidad));
    let costoTotalProducto = (totalUnidades * precioUnidad).toFixed(2);
/*console.log(precioUnidad)
console.log(totalUnidades)
console.log(costoTotalProducto)*/
    let fila = document.createElement("tr")

    fila.innerHTML = '<td>' + detalle.idProducto + '</td>' +
      '<td>' + detalle.descProducto + '</td>' +
      '<td>' + detalle.cantProdDocena + '</td>' +
      '<td>' + detalle.cantProdUnidad + '</td>' +
      '<td>' + detalle.costoProducto + '</td>' +
      '<td>' + costoTotalProducto + '</td>' +
      '<td>' + '<a class="btn btn-danger btn-sm" onclick="eliminarProducto(' + detalle.idProducto + ')"><i class="fas fa-times-circle"></i></a>' + '</td>'

    listaDetalleNE.appendChild(fila)

  })

  totalesCantidad();
  limpiarFormulario();
}
/*=========================
SUMA DE LOS TOTALES DE LA TABLA DETALLE PRODUCTOS - NOTA EMPAQUE
==========================*/
function totalesCantidad() {
  var tabla = document.getElementById("detalleNE");
  const totalDocenas = document.getElementById('totalDocenas');
  const totalUnidades = document.getElementById('totalUnidades');
  const sumaCostoTotal = document.getElementById('totalCell');

  var sumaUnidades = 0;
  var sumaDocenas = 0;
  var sumaTotalCosto = 0;

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

  var sumaTotalUnidades = (sumaDocenas * 12) + sumaUnidades;
  var docenaReales = Math.floor(sumaTotalUnidades / 12);
  var unidadReales = sumaTotalUnidades - (docenaReales * 12);
  // ENVIAR LOS VALORES TOTALES
  totalDocenas.textContent = docenaReales;
  totalUnidades.textContent = unidadReales;
  sumaCostoTotal.textContent = sumaTotalCosto.toFixed(2);
}
/*=========================
LIMPIAR EL FORMULARIO DE INGRESO DE PRODUCTOS
==========================*/
function limpiarFormulario() {
  const productoEmpaque = document.getElementById('productoEmpaque');
  const ingDocenas = document.getElementById('ingDocenas');
  const ingUnidades = document.getElementById('ingUnidades');
  const costoProducto = document.getElementById('costoProducto');

  //productoEmpaque.value = '';
  ingDocenas.value = 0;
  ingUnidades.value = 0;
  //costoProducto.value = '';
}
/*=========================
ELIMINAR UN REGISTRO DE NOTA DE EMPAQUE
==========================*/
function eliminarProducto(id) {
  arregloCarritoNE = arregloCarritoNE.filter(
    (detalle) => {
      if (id != detalle.idProducto) {
        return detalle
      }
    }
  )
  dibujarTablaCarritoNE();
}

/*=========================
REGISTRO Y GUARDADO DE NOTA DE EMPAQUE
==========================*/
function GuardarNotaEmp() {
  let fechaEmpaque = document.getElementById("fechaEmpaque").value
  let personalEmpaque = document.getElementById("personalEmpaque").value
  let nroEmpaque = document.getElementById("nroEmpaque").value
  let observacionEmpaque = document.getElementById("observacionEmpaque").value

  let obj = {
    "fechaEmpaque": fechaEmpaque,
    "personalEmpaque": personalEmpaque,
    "nroEmpaque": nroEmpaque,
    "observacionEmpaque": observacionEmpaque,
    "detalle": JSON.stringify(arregloCarritoNE)
  }

  $.ajax({
    type: "POST",
    url: "controlador/ventaControlador.php?ctrRegEmpaque",
    data: obj,
    cache: false,
    success: function (data) {
      //console.log(data)
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Nota de Ingreso registrada',
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
}


//**********************nota de ingreso************************

function actCantidadNI(idProd) {
  let cantidad = parseInt(document.getElementById("cantProV_" + idProd).value)

  arregloCarritoNI.map(function (dato) {
    //console.log(dato);
    if (dato.idProducto == idProd) {
      dato.cantProducto = cantidad
    }
    return dato
  })
}

function eliminarCarritoNI(idProd) {

  arregloCarritoNI = arregloCarritoNI.filter((detalle) => {
    if (idProd != detalle.idProducto) {
      return detalle
    }
  })
  dibujarTablaCarritoNI()
}

/*=========================
registro nota de ingreso
==========================*/
function emitirNotaIngreso() {

  let codIngreso = document.getElementById("codIngreso").value
  let conceptoIngreso = document.getElementById("conceptoIngreso").value

  let obj = {
    "codIngreso": codIngreso,
    "conceptoIngreso": conceptoIngreso,
    "productos": JSON.stringify(arregloCarritoNI)
  }

  $.ajax({
    type: "POST",
    url: "controlador/ventaControlador.php?ctrRegNotaIngreso",
    data: obj,
    cache: false,
    success: function (data) {
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Nota de Ingreso registrada',
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
}

/*=========================
REGISTRO Y GUARDADO DE NOTA DE DEVOLUCIONES
==========================*/
function GuardarNotaDev() {
  let fechaDev = document.getElementById("fechaDev").value
  let personal = document.getElementById("personal").value
  let nroDevolucion = document.getElementById("nroDevolucion").value
  let observacion = document.getElementById("observacion").value

  let obj = {
    "fechaDev": fechaDev,
    "personal": personal,
    "nroDevolucion": nroDevolucion,
    "observacion": observacion,
    "detalle": JSON.stringify(arregloCarritoNE)
  }

  $.ajax({
    type: "POST",
    url: "controlador/ventaControlador.php?ctrRegDevolucion",
    data: obj,
    cache: false,
    success: function (data) {
      console.log(data)
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Nota de Ingreso registrada',
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
}

/*=========================
REGISTRO Y GUARDADO DE NOTA DE INGRESO POR PROVEEDORES EXTERNOS
==========================*/
function GuardarNotaProv() {
  let fecha = document.getElementById("fecha").value
  let personal = document.getElementById("personal").value
  let nroComprobante = document.getElementById("nroComprobante").value
  let observacion = document.getElementById("observacion").value

  let obj = {
    "fecha": fecha,
    "personal": personal,
    "nroComprobante": nroComprobante,
    "observacion": observacion,
    "detalle": JSON.stringify(arregloCarritoNE)
  }

  $.ajax({
    type: "POST",
    url: "controlador/ventaControlador.php?ctrRegProvExterno",
    data: obj,
    cache: false,
    success: function (data) {
      console.log(data)
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Nota de Ingreso registrada',
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
}

/*=========================
REGISTRO Y GUARDADO DE NOTA DE INGRESO POR PROVEEDORES EXTERNOS
==========================*/
function GuardarNotaIngAjuste() {
  let fecha = document.getElementById("fecha").value
  let personal = document.getElementById("personal").value
  let nroComprobante = document.getElementById("nroComprobante").value
  let observacion = document.getElementById("observacion").value

  let obj = {
    "fecha": fecha,
    "personal": personal,
    "nroComprobante": nroComprobante,
    "observacion": observacion,
    "detalle": JSON.stringify(arregloCarritoNE)
  }

  $.ajax({
    type: "POST",
    url: "controlador/ventaControlador.php?ctrRegAjusteInventario",
    data: obj,
    cache: false,
    success: function (data) {
      console.log(data)
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Nota de Ingreso registrada',
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
}

/*=========================
REGISTRO Y GUARDADO DE NOTA DE INGRESO POR OTROS INGRESOS
==========================*/
function GuardarNotaOtrosIng() {
  let fecha = document.getElementById("fecha").value
  let personal = document.getElementById("personal").value
  let nroComprobante = document.getElementById("nroComprobante").value
  let observacion = document.getElementById("observacion").value

  let obj = {
    "fecha": fecha,
    "personal": personal,
    "nroComprobante": nroComprobante,
    "observacion": observacion,
    "detalle": JSON.stringify(arregloCarritoNE)
  }

  $.ajax({
    type: "POST",
    url: "controlador/ventaControlador.php?ctrRegOtrosIngresos",
    data: obj,
    cache: false,
    success: function (data) {
      console.log(data)
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Nota de Ingreso registrada',
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
}



