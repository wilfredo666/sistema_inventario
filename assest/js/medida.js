function MNuevoMedida() {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/medida/FNuevoMedida.php",
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function RegMedida() {

  var formData = new FormData($("#FormRegMedida")[0])

  $.ajax({
    type: "POST",
    url: "controlador/medidaControlador.php?ctrRegMedida",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'La Unidad de Medida ha sido Registrada',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'Error de registro!',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })
}
function MEditMedida(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/medida/FEditMedida.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function EditMedida() {
  var formData = new FormData($("#FormEditMedida")[0])

  $.ajax({
    type: "POST",
    url: "controlador/medidaControlador.php?ctrEditMedida",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      /* console.log(data) */
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'La Categoría ha sido actualizado',
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


function MVerMedida(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/Medida/MVerMedida.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function MEliMedida(id) {
  var obj = {
    id: id
  }

  Swal.fire({
    title: '¿Esta seguro de eliminar este Medida?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        dataType: "json", //importante indicar que se traen datos json
        url: "controlador/medidaControlador.php?ctrEliMedida",
        success: function (data) {

          if (data["status"] == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: data["message"],
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: data["message"],
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })

    }
  })
}

function ComprobarMedida() {
  let loginMedida = document.getElementById("loginMedida").value
  var obj = {
    login: loginMedida
  }
  $.ajax({
    type: "POST",
    data: obj,
    url: "controlador/MedidaControlador.php?ctrBusMedida",
    success: function (data) {
      if (data == "1") {
        $("#error-login").addClass("text-danger")
        document.getElementById("error-login").innerHTML = "Medida en uso, intente con otro"
        $("#guardar").attr("disabled", true)
      } else {
        document.getElementById("error-login").innerHTML = ""
        $("#guardar").removeAttr("disabled")
      }
    }

  })
}