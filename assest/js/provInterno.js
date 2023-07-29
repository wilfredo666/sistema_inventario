function MNuevoProvInterno() {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/provInterno/FNuevoProvInterno.php",
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function RegProvInterno() {

  var formData = new FormData($("#FormRegProvInterno")[0])

  $.ajax({
    type: "POST",
    url: "controlador/provInternoControlador.php?ctrRegProvInterno",
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
          title: 'El Ingreso de empaque, ha sido registrado',
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

function MEditProvInterno(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/provInterno/FEditProvInterno.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function EditProvInterno() {

  var formData = new FormData($("#FormEditProvInterno")[0])

  $.ajax({
    type: "POST",
    url: "controlador/provInternoControlador.php?ctrEditProvInterno",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Ingreso de empaque, ha sido actualizado',
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

function MEliProvInterno(id) {
  var obj = {
    id: id
  }

  Swal.fire({
    title: 'Esta seguro de eliminar este registro de Empaque?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/provInternoControlador.php?ctrEliProvInterno",
        success: function (data) {
          /* console.log(data) */
          if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Registro de Empaque eliminado',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: 'El Registro de Empaque no puede ser eliminado',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })
    }
  })
}
