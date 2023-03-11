function MNuevoTalla() {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/talla/FNuevoTalla.php",
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function RegTalla() {

  var formData = new FormData($("#FormRegTalla")[0])

  $.ajax({
    type: "POST",
    url: "controlador/tallaControlador.php?ctrRegTalla",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Talla ha sido registrado',
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
function MEditTalla(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/talla/FEditTalla.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function EditTalla() {
  var formData = new FormData($("#FormEditTalla")[0])

  $.ajax({
    type: "POST",
    url: "controlador/tallaControlador.php?ctrEditTalla",
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
          title: 'La Talla ha sido actualizado',
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


function MVerTalla(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/Talla/MVerTalla.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function MEliTalla(id) {
  var obj = {
    id: id
  }

  Swal.fire({
    title: '¿Esta seguro de eliminar este Talla?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/TallaControlador.php?ctrEliTalla",
        success: function (data) {

          if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Talla eliminado',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: 'El Talla no puede ser eliminado, porque esta en uso',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })

    }
  })
}

function ComprobarTalla() {
  let loginTalla = document.getElementById("loginTalla").value
  var obj = {
    login: loginTalla
  }
  $.ajax({
    type: "POST",
    data: obj,
    url: "controlador/TallaControlador.php?ctrBusTalla",
    success: function (data) {
      if (data == "1") {
        $("#error-login").addClass("text-danger")
        document.getElementById("error-login").innerHTML = "Talla en uso, intente con otro"
        $("#guardar").attr("disabled", true)
      } else {
        document.getElementById("error-login").innerHTML = ""
        $("#guardar").removeAttr("disabled")
      }
    }

  })
}