function MNuevoUsuario(){
    $("#modal-default").modal("show")
  
    var obj=""
    $.ajax({
      type:"POST",
      url:"vista/usuario/FNuevoUsuario.php",
      data:obj,
      success:function(data){
        $("#content-default").html(data)
      }
    })
  }
  
  function RegUsuario(){
    let passUsuario=document.getElementById("passUsuario").value
    let passUsuario2=document.getElementById("passUsuario2").value
  
    if(passUsuario==passUsuario2){
  
      var formData= new FormData($("#FormRegUsuario")[0])
  
      $.ajax({
        type:"POST",
        url:"controlador/usuarioControlador.php?ctrRegUsuario",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data){
            console.log(data);
          if(data=="ok"){
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'El usuario ha sido registrado',
              timer: 1000
            })
            setTimeout(function(){
              location.reload()
            },1200)
          }else{
            Swal.fire({
              icon:'error',
              title:'Error!',
              text:'El usuario ya esta en uso',
              showConfirmButton: false,
              timer:1500
            })
          }
        }
      })
    }else{
      document.getElementById("error-pass").innerHTML="Los campos de contraseña no coinciden"
    }
  }
  
  function MEditUsuario(id){
    $("#modal-default").modal("show")
  
    var obj=""
    $.ajax({
      type:"POST",
      url:"vista/usuario/FEditUsuario.php?id="+id,
      data:obj,
      success:function(data){
        $("#content-default").html(data)
      }
    })
  }
  
  function EditUsuario(){
    let passUsuario=document.getElementById("passUsuario").value
    let passUsuario2=document.getElementById("passUsuario2").value
  
    if(passUsuario==passUsuario2){
  
      var formData= new FormData($("#FormEditUsuario")[0])
  
      $.ajax({
        type:"POST",
        url:"controlador/usuarioControlador.php?ctrEditUsuario",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data){
          if(data=="ok"){
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'El usuario ha sido actualizado',
              timer: 1000
            })
            setTimeout(function(){
              location.reload()
            },1200)
          }else{
            Swal.fire({
              icon:'error',
              title:'Error!',
              text:'No se ha podido actualizar!!!',
              showConfirmButton: false,
              timer:1500
            })
          }
        }
      })
    }else{
      document.getElementById("error-pass").innerHTML="Los campos de contraseña no coinciden"
    }
  
  }
  
  function MVerUsuario(id){
    $("#modal-default").modal("show")
  
    var obj=""
    $.ajax({
      type:"POST",
      url:"vista/usuario/MVerUsuario.php?id="+id,
      data:obj,
      success:function(data){
        $("#content-default").html(data)
      }
    })
  }
  
  function MEliUsuario(id){
    var obj={
      id:id
    }
  
    Swal.fire({
      title:'¿Esta seguro de eliminar este usuario?',
      showDenyButton:true,
      showCancelButton:false,
      confirmButtonText:'Confirmar',
      denyButtonText:'Cancelar'    
    }).then((result)=>{
      if(result.isConfirmed){
        $.ajax({
          type:"POST",
          data:obj,
          url:"controlador/usuarioControlador.php?ctrEliUsuario",
          success:function(data){
  
            if(data=="ok"){
              Swal.fire({
                icon: 'success',
                showConfirmButton: false,
                title: 'Usuario eliminado',
                timer: 1000
              })
              setTimeout(function(){
                location.reload()
              },1200)
            }else{
              Swal.fire({
                icon:'error',
                title:'Error!!!',
                text:'El usuario no puede ser eliminado, porque esta en uso',
                showConfirmButton:false,
                timer:1500
              })
            }
          }
        })
  
      }
    })
  }
  
  function ComprobarUsuario(){
    let loginUsuario=document.getElementById("loginUsuario").value
    var obj={
      login:loginUsuario
    }
    $.ajax({
      type: "POST",
      data: obj,
      url: "controlador/usuarioControlador.php?ctrBusUsuario",
      success:function(data){
        if(data=="1"){
          $("#error-login").addClass("text-danger")
          document.getElementById("error-login").innerHTML="Usuario en uso, intente con otro"
          $("#guardar").attr("disabled", true)
        }else{
          document.getElementById("error-login").innerHTML=""
          $("#guardar").removeAttr("disabled")
        }
      }
  
    })
  }