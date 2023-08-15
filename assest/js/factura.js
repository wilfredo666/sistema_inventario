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
      //dato.precioTotalPro = parseFloat(dato.precioProducto * cantPro).toFixed(2)
      dato.cantProducto = cantPro
    }
    return dato
  })
  //dibujarTablaCarrito()
}

/* function validarFormulario() {
  let numFactura = document.getElementById("numFactura").value

  if (numFactura == null || numFactura.length == 0 || /^\s+$/.test(numFactura)) {
    document.getElementById("error-numFactura").innerHTML = "El campo #Factura tiene datos incorrectos"
    return false
  }

  return true
} */

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
function busCliente(){
  let nitCliente=document.getElementById("nitCliente").value
  /*   console.log(nitCliente) */
  var obj={
    nitCliente:nitCliente
  }

  $.ajax({
    type:"POST",
    url:"controlador/clienteControlador.php?ctrBusCliente",
    data:obj,
    dataType:"json",
    success:function(data){
      /* console.log(data) */
      document.getElementById("rsCliente").value=data["razon_social_cliente"]
      document.getElementById("idCliente").value=data["id_cliente"]
      document.getElementById("descuentoVenta").value=data["descuento"]
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
    /* +
      '<td>'+detalle.precioProducto+'</td>'+
      '<td>'+detalle.precioTotalPro+'</td>' */

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
  document.getElementById("totalV_" + idProd).value=parseFloat(cantidad*preUnit)

  arregloCarrito2.map(function (dato) {
    //console.log(dato);
    if (dato.idProducto == idProd) {
      dato.preUnitario = preUnit
      dato.cantProducto = cantidad
      dato.preTotal = parseFloat(preUnit*cantidad)
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
  document.getElementById("totalVenta").value=(totalCarrito).toFixed(2)

  /*calculo del descuento (%)*/
  let descuento =(totalCarrito/100)*parseFloat(document.getElementById("descuentoVenta").value)

  document.getElementById("netoVenta").value=(totalCarrito-descuento).toFixed(2) 
}

function emitirFactura(){

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
      console.log(data);
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

function cmbEstadoVenta(id){
  var obj={
    idVenta:id
  }
  $.ajax({
    type:"POST",
    url:"controlador/ventaControlador.php?ctrCmbEstado",
    data:obj,
    cache: false,
    success:function(data){
      if(data=="ok"){
        document.getElementById("estadoFactura_"+id).innerHTML=""
        document.getElementById("estadoFactura_"+id).innerHTML='<span class="badge badge-success">Emitido</span>'
      }

    }
  })
}

function MAnularFactura(id){
  var obj={
    idVenta:id
  }

  Swal.fire({
    title:'Esta seguro de anular esta factura?',
    showDenyButton:true,
    showCancelButton:false,
    confirmButtonText:'Confirmar',
    denyButtonText:'Cancelar'    
  }).then((result)=>{
    if(result.isConfirmed){
      $.ajax({
        type:"POST",
        data:obj,
        url:"controlador/ventaControlador.php?ctrAnularVenta",
        success:function(data){

          if(data=="ok"){
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Factura anulada',
              timer: 1000
            })
            document.getElementById("estadoFactura_"+id).innerHTML=""
            document.getElementById("estadoFactura_"+id).innerHTML='<span class="badge badge-danger">Anulado</span>'
          }
        }
      })
    }
  })
}

/* PARA NOTA DE SALIDA */
function emitirNotaSalida(){

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
    //console.log(dato);
    if (dato.idProducto == idProd) {
      dato.cantProducto = cantidad
    }
    return dato 
  })
}

/*======================
carrito nota de ingreso
========================*/
var arregloCarritoNI=[]
var listaDetalleNI = document.getElementById("listaDetalleNI")
function agregarCarritoNI(id){
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

      '<td><input type="number" class="form-control form-control-sm" id="cantProV_' + detalle.idProducto + '" value="' + detalle.cantProducto + '" onkeyup="actCantidadNI(' + detalle.idProducto + ')">'  + '</td>'


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

//*********************nota de empaque********************

/*======================
carrito nota de empaque
========================*/
var arregloCarritoNE=[]
var listaDetalleNE = document.getElementById("listaDetalleNE")
function agregarCarritoNE(id){

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
        costoProducto: data["precio_costo"],
        cantProdDocena: 1,
        cantProducto: 1
      }

      arregloCarritoNE.push(objDetalle)
      dibujarTablaCarritoNE()
    }
  })
}

function dibujarTablaCarritoNE() {

  listaDetalleNE.innerHTML = ""
  arregloCarritoNE.forEach((detalle) => {
    let fila = document.createElement("tr")

    fila.innerHTML = '<td>' + detalle.descProducto + '</td>' +

      '<td><input type="number" class="form-control form-control-sm" id="cantProDocena_' + detalle.idProducto + '" value="' + detalle.cantProdDocena + '" onkeyup="actCantidadNE(' + detalle.idProducto + ')">'  + '</td>'+
      
      '<td><input type="number" class="form-control form-control-sm" id="cantProV_' + detalle.idProducto + '" value="' + detalle.cantProducto + '" onkeyup="actCantidadDocNE(' + detalle.idProducto + ')">'  + '</td>'+
      
      '<td><input type="number" class="form-control form-control-sm" id="costoProV_' + detalle.idProducto + '" value="' + detalle.costoProducto + '">'  + '</td>'+
      
      '<td><input type="number" class="form-control form-control-sm" id="totalProV_' + detalle.idProducto + '" value="0">'  + '</td>'


    let tdEliminar = document.createElement("td")
    let botonEliminar = document.createElement("button")
    botonEliminar.classList.add("btn", "btn-danger", "btn-sm", "borrar")
    let icono = document.createElement("i")
    icono.classList.add("fas", "fa-trash")
    botonEliminar.appendChild(icono)
    botonEliminar.onclick = () => {
      eliminarCarritoNE(detalle.idProducto)
    }

    tdEliminar.appendChild(botonEliminar)
    fila.appendChild(tdEliminar)

    listaDetalleNE.appendChild(fila)
  })
}

/*=========================
registro nota de empaque
==========================*/
function emitirNotaEmpaque(){
  let codEmpaque = document.getElementById("codEmpaque").value
  let personal = document.getElementById("personalEmpaque").value

  let obj = {
    "codEmpaque": codEmpaque,
    "personal": personal,
    "productosEmpaque": JSON.stringify(arregloCarritoNE)
  }

  $.ajax({
    type: "POST",
    url: "controlador/ventaControlador.php?ctrRegEmpaque",
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
function emitirNotaIngreso(){

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

