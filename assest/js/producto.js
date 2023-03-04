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

function SinCatalogo() {
  var obj = {
    codigoAmbiente: 2,
    codigoPuntoVenta: 0,
    codigoPuntoVentaSpecified: true,
    codigoSistema: "71D7A7B740E994C89373447",
    codigoSucursal: 0,
    cuis: "2E8B5B9E",
    nit: 3726922011
  }

  $.ajax({
    type: "POST",
    url: "https://localhost:5001/Sincronizacion/listaproductosservicios?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJqd3JvYmxlcyIsImNvZGlnb1Npc3RlbWEiOiI3MUQ3QTdCNzQwRTk5NEM4OTM3MzQ0NyIsIm5pdCI6Ikg0c0lBQUFBQUFBQUFETTJOekt6TkRJeU1EUUVBSTlYR3pjS0FBQUEiLCJpZCI6NzEwNTQ5LCJleHAiOjE2NzUzODI0MDAsImlhdCI6MTY0Mzk0NTI1Niwibml0RGVsZWdhZG8iOjM3MjY5MjIwMTEsInN1YnNpc3RlbWEiOiJTRkUifQ.nS8t-EDaBi-e3PGtnbnTI-7PKPy_6Kia1zFPKdzZgDnZ6VfXlimlrTsEgTb8_iDKoJ7Hy-vLw_0o_vgpLqSltA",
    data: JSON.stringify(obj),
    cache: false,
    contentType: "application/json",
    success: function (data) {

      for (var i = 0; i < data["listaCodigos"].length; i++) {

        $("#CatProductos").append("<tr><td>" + data["listaCodigos"][i]["codigoActividad"] + "</td><td>" + data["listaCodigos"][i]["codigoProducto"] + "</td><td>" + data["listaCodigos"][i]["descripcionProducto"] + "</td><td></td></tr>")
      }

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
      console.log(data)
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
        url: "controlador/ProductoControlador.php?ctrEliProducto",
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

  if (imagen["type"] != "image/png" && imagen["type"] != "image/jpeg") {
    $("#ImgProducto").val("")
    swal.fire({
      icon: "error",
      showConfirmButton: true,
      title: "La imagen debe ser formato PNG o JPG"
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