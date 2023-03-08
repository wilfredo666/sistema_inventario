function MNuevoColor() {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/color/FNuevoColor.php",
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function RegColor() {

  var formData = new FormData($("#FormRegColor")[0])

  $.ajax({
    type: "POST",
    url: "controlador/colorControlador.php?ctrRegColor",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      /* console.log(data); */
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Color ha sido registrado',
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
function MEditColor(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/color/FEditColor.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function EditColor() {
  var formData = new FormData($("#FormEditColor")[0])

  $.ajax({
    type: "POST",
    url: "controlador/colorControlador.php?ctrEditColor",
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
          title: 'La Color ha sido actualizado',
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


function MVerColor(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/Color/MVerColor.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function MEliColor(id) {
  var obj = {
    id: id
  }

  Swal.fire({
    title: '¿Esta seguro de eliminar este Color?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/ColorControlador.php?ctrEliColor",
        success: function (data) {

          if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Color eliminado',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: 'El Color no puede ser eliminado, porque esta en uso',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })

    }
  })
}

function ComprobarColor() {
  let loginColor = document.getElementById("loginColor").value
  var obj = {
    login: loginColor
  }
  $.ajax({
    type: "POST",
    data: obj,
    url: "controlador/ColorControlador.php?ctrBusColor",
    success: function (data) {
      if (data == "1") {
        $("#error-login").addClass("text-danger")
        document.getElementById("error-login").innerHTML = "Color en uso, intente con otro"
        $("#guardar").attr("disabled", true)
      } else {
        document.getElementById("error-login").innerHTML = ""
        $("#guardar").removeAttr("disabled")
      }
    }

  })
}