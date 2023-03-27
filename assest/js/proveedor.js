function MNuevoProveedor() {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/proveedor/FNuevoProveedor.php",
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function RegProveedor() {

  var formData = new FormData($("#FormRegProveedor")[0])

  $.ajax({
    type: "POST",
    url: "controlador/proveedorControlador.php?ctrRegProveedor",
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
          title: 'El Proveedor ha sido registrado',
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
function MEditProveedor(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/proveedor/FEditProveedor.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function EditProveedor() {
  let rzProveedor=document.getElementById("rzProveedor").value

  var formData = new FormData($("#FormEditProveedor")[0])

  $.ajax({
    type: "POST",
    url: "controlador/proveedorControlador.php?ctrEditProveedor",
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
          title: 'El Proveedor ha sido actualizado',
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


function MVerProveedor(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/proveedor/MVerProveedor.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function MEliProveedor(id) {
  var obj = {
    id: id
  }

  Swal.fire({
    title: '¿Esta seguro de eliminar este Proveedor?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/ProveedorControlador.php?ctrEliProveedor",
        success: function (data) {

          if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Proveedor eliminado',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: 'El Proveedor no puede ser eliminado, porque esta en uso',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })

    }
  })
}

function ComprobarProveedor() {
  let loginProveedor = document.getElementById("loginProveedor").value
  var obj = {
    login: loginProveedor
  }
  $.ajax({
    type: "POST",
    data: obj,
    url: "controlador/ProveedorControlador.php?ctrBusProveedor",
    success: function (data) {
      if (data == "1") {
        $("#error-login").addClass("text-danger")
        document.getElementById("error-login").innerHTML = "Proveedor en uso, intente con otro"
        $("#guardar").attr("disabled", true)
      } else {
        document.getElementById("error-login").innerHTML = ""
        $("#guardar").removeAttr("disabled")
      }
    }

  })
}