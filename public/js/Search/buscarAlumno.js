      

      function buscarAlumno(){
        $.ajax({
                  url: 'persona/nombre/' + document.getElementById("nombreABuscar").value +'/'+ document.getElementById("apellidoABuscar").value,  //this is your uri
                  type: 'GET', //this is your method
                  data: { PNombre:'PNombre', ApPat:'ApPat' },
                  dataType: 'json',
                  success: function(response){
                  console.log(response) //en prueba
                    if(response.length != 0){
                        var htmltext = ''

                        //response.forEach(function(data)
                         
                        $.each(response, function(idx,data) {
                        htmltext = htmltext + '<tr><td>' + data['PNombre'] + '</td>'
                                             + '<td>' + data['ApPat'] + '</td>'
                                             + '<td>' + ((data['ApMat'] == null) ? "" : data['ApMat']  )  + '</td>'
                                             + '<td>' + data['rut'] + '</td>'
                                             + '<td>' + ((data['fechaNacimiento'] == null) ? "SIN INFORMACIÓN" : data['fechaNacimiento']  )  + '</td></tr>'  
                        })  
                        document.getElementById('alumnoContainer').innerHTML = htmltext;
                        document.getElementById("error").innerHTML = ""
                        

                    }else{
                        document.getElementById("error").innerHTML = "El nombre no existe en nuestros registros."
                        document.getElementById('alumnoContainer').innerHTML = "";   
                    }
                    

                  }
                  
                });
    }
   