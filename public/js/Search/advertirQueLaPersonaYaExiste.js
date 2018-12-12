
      function advertirQueExiste(){
        $.ajax({
                  url: 'persona/' + document.getElementById("rut").value,  //this is your uri
                  type: 'GET', //this is your method
                  data: { rut:'rut' },
                  dataType: 'json',
                  success: function(response){
                    if(response.rut != null ){
                      document.getElementById("error").innerHTML = "La persona con rut "+ document.getElementById("rut").value +" ya existe en nuestros registros, no la vuelva a agregar."
                     
                      document.getElementById("rellenarDatos").style.display = "none";
                    }else{
                      document.getElementById("error").innerHTML = ""
                      document.getElementById("rellenarDatos").style.display = "block";
                    }
                    

                  }
                  
                });
    }
   