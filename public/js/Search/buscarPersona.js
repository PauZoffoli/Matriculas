
      function buscarPersona(){
        $.ajax({
                  url: 'persona/' + document.getElementById("rutABuscar").value,  //this is your uri
                  type: 'GET', //this is your method
                  data: { rut:'rut' },
                  dataType: 'json',
                  success: function(response){
                    if(response.rut == null ){
                      document.getElementById("error").innerHTML = "El rut no existe en nuestros registros."
                      document.getElementById("rut").value = ""
                      document.getElementById("PNombre").value = ""
                      document.getElementById("ApPat").value =""
                    }else{
                      document.getElementById("error").innerHTML = ""
                      document.getElementById("rut").value = response.rut
                      document.getElementById("PNombre").value = response.PNombre
                      document.getElementById("ApPat").value = response.ApPat

                    }
                    

                  }
                  
                });
    }
   