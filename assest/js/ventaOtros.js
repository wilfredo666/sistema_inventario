/*=========================
REGISTRO Y GUARDADO DE NOTA DE SALIDA POR DIFERENTES CONCEPTOS
==========================*/
function GuardarNotaVentaOtros() {
    //evaluando si hay algo en el carrito para guardar
    if(arregloCarritoNV.length!=0){
  
      let fecha = document.getElementById("fecha").value
      let cliente = document.getElementById("cliente").value
      let nroComprobante = document.getElementById("nroComprobante").value
      let observacion = document.getElementById("observacion").value
      let concepto_salida = document.getElementById("concepto_salida").value
      let total = document.getElementById("totalCell").innerHTML
      let totalNeto = document.getElementById("totalNeto").innerHTML
      let totalDescuento = document.getElementById("totalDescuento").innerHTML
  
      let obj = {
        "fecha": fecha,
        "cliente": cliente,
        "nroComprobante": nroComprobante,
        "observacion": observacion,
        "concepto_salida": concepto_salida,
        "subTotal": total,
        "totalNeto": totalNeto,
        "totalDescuento": totalDescuento,
        "detalle": JSON.stringify(arregloCarritoNV)
      }
  
      $.ajax({
        type: "POST",
        url: "controlador/ventaControlador.php?ctrRegVentaOtros",
        data: obj,
        cache: false,
        success: function (data) {
          /* console.log(data) */
          if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Nota de Venta registrada',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!',
              text: 'Error de registro',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })
    }else{
      document.getElementById("aviso").innerHTML="*Nada que enviar"
    }
  }