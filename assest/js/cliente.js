function MNuevoCliente() {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/cliente/FNuevoCliente.php",
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function RegCliente() {

  var formData = new FormData($("#FormRegCliente")[0])

  $.ajax({
    type: "POST",
    url: "controlador/clienteControlador.php?ctrRegCliente",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El cliente ha sido registrado',
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
function MEditCliente(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/cliente/FEditCliente.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function EditCliente() {
  let rzCliente=document.getElementById("rzCliente").value

  var formData = new FormData($("#FormEditCliente")[0])

  $.ajax({
    type: "POST",
    url: "controlador/clienteControlador.php?ctrEditCliente",
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
          title: 'El cliente ha sido actualizado',
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


function MVerCliente(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/cliente/MVerCliente.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function MEliCliente(id) {
  var obj = {
    id: id
  }

  Swal.fire({
    title: '¿Esta seguro de eliminar este cliente?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/clienteControlador.php?ctrEliCliente",
        success: function (data) {
          console.log(data)
          /*if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Cliente eliminado',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: 'El cliente no puede ser eliminado debido a estar en uso',
              showConfirmButton: false,
              timer: 1500
            })
          }*/
        }
      })

    }
  })
}

function Comprobarcliente() {
  let logincliente = document.getElementById("logincliente").value
  var obj = {
    login: logincliente
  }
  $.ajax({
    type: "POST",
    data: obj,
    url: "controlador/clienteControlador.php?ctrBuscliente",
    success: function (data) {
      if (data == "1") {
        $("#error-login").addClass("text-danger")
        document.getElementById("error-login").innerHTML = "cliente en uso, intente con otro"
        $("#guardar").attr("disabled", true)
      } else {
        document.getElementById("error-login").innerHTML = ""
        $("#guardar").removeAttr("disabled")
      }
    }

  })
}