function MNuevoGrupo() {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/grupo/FNuevoGrupo.php",
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function RegGrupo() {

  var formData = new FormData($("#FormRegGrupo")[0])

  $.ajax({
    type: "POST",
    url: "controlador/grupoControlador.php?ctrRegGrupo",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Grupo ha sido registrado',
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
function MEditGrupo(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/grupo/FEditGrupo.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function EditGrupo() {
  var formData = new FormData($("#FormEditGrupo")[0])

  $.ajax({
    type: "POST",
    url: "controlador/grupoControlador.php?ctrEditGrupo",
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
          title: 'La Grupo ha sido actualizado',
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


function MVerGrupo(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/Grupo/MVerGrupo.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function MEliGrupo(id) {
  var obj = {
    id: id
  }

  Swal.fire({
    title: '¿Esta seguro de eliminar este Grupo?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/GrupoControlador.php?ctrEliGrupo",
        success: function (data) {

          if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Grupo eliminado',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: 'El Grupo no puede ser eliminado, porque esta en uso',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })

    }
  })
}
