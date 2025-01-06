function MNuevoProducto() {
  $("#modal-lg").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/producto/FNuevoProducto.php",
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
    }
  })
}

function RegProducto() {

  var formData = new FormData($("#FormRegProducto")[0])

  $.ajax({
    type: "POST",
    url: "controlador/productoControlador.php?ctrRegProducto",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Producto ha sido registrado',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'Erro de registro!!!',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })


}

function MEditProducto(id) {
  $("#modal-lg").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/producto/FEditProducto.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
    }
  })
}

function EditProducto() {

  var formData = new FormData($("#FormEditProducto")[0])

  $.ajax({
    type: "POST",
    url: "controlador/productoControlador.php?ctrEditProducto",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El producto ha sido actualizado',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'No se ha podido actualizar!!!',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })

}

function MVerProducto(id) {
  $("#modal-lg").modal("show")
  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/producto/MVerProducto.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
      /* console.log(data); */
    }
  })
}

function MEliProducto(id) {
  var obj = {
    id: id
  }

  Swal.fire({
    title: 'Esta seguro de eliminar este Producto?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/productoControlador.php?ctrEliProducto",
        success: function (data) {
          /* console.log(data) */
          if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Producto eliminado',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: 'El producto no puede ser eliminado, porque tiene registros',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })



    }
  })
}

function previsualizar() {
  let imagen = document.getElementById("ImgProducto").files[0]

  if (imagen["type"] != "image/png" && imagen["type"] != "image/jpeg" && imagen["type"] != "image/jpg") {
    $("#ImgProducto").val("")
    swal.fire({
      icon: "error",
      showConfirmButton: true,
      title: "La imagen debe ser formato PNG, JPG o JPEG"
    })
  } else if (imagen["size"] > 10000000) {
    $("#ImgProducto").val("")
    Swal.fire({
      icon: "error",
      showConfirmButton: true,
      title: "La imagen no debe superior a 10MB"
    })

  } else {
    let datosImagen = new FileReader
    datosImagen.readAsDataURL(imagen)

    $(datosImagen).on("load", function (event) {
      let rutaImagen = event.target.result
      $(".previsualizar").attr("src", rutaImagen)

    })
  }
}

function datosProducto(tipo) { //tipo [s, i] se refiere si es de tipo salida o ingreso de producto
  //seleccionado de un select con el ID de producto 
  var selectElement = document.getElementById("productoEmpaque");
  var id = selectElement.value;
  var obj = {
    id: id
  }
  $.ajax({
    type: "POST",
    data: obj,
    url: "controlador/productoControlador.php?ctrBuscarProducto",
    success: function (data) {
      // Parseamos los datos recibidos en formato JSON
      var datos = JSON.parse(data);

      // Obtenemos el elemento HTML donde mostraremos los resultados
      var codigoEAN = document.getElementById("codigoEAN");
      var ventaProducto = document.getElementById("ventaProducto");
      var costoProducto = document.getElementById("costoProducto");
      var descripcionProd = document.getElementById("descripcionProd");
      var stockDocenas = document.getElementById("stockDocenas");
      var stockUnidades = document.getElementById("stockUnidades");
      codigoEAN.value = datos.cod_producto;
      ventaProducto.value = datos.precio_venta;
      costoProducto.value = datos.precio_costo;
      descripcionProd.value = datos.nombre_producto;

      var stockTotal = parseInt(datos.diferencia)
      var docenaReales = datos.docenas
      var unidadReales = datos.unidades
      stockDocenas.value = docenaReales;
      stockUnidades.value = unidadReales;

      /* evaluando el stock para inserccion de datos*/
      if(tipo=="s"){

        if(stockTotal<=0 || isNaN(stockTotal)){

          document.getElementById("ingDocenas").readOnly=true
          document.getElementById("ingUnidades").readOnly=true
        }else{
          document.getElementById("ingDocenas").readOnly=false
          document.getElementById("ingUnidades").readOnly=false
        }
      }
    }
  })
}