
/*SI AL CARGAR LOS CAMPOS TIENEN UN RUT 160000000-0 O 160000001-9 los campos se bloquearán. */

if(document.getElementsByName("madre[rut]")[0].value === '160000001-9'){
  document.getElementById("tieneMadre").checked = true;
}
if(document.getElementsByName("padre[rut]")[0].value === '160000000-0'){
   document.getElementById("tienePadre").checked = true;
}

function fillFieldsIfDoNotHaveParents($parent){
        document.getElementsByName($parent + "[PNombre]")[0].value = 'NO TIENE';
        document.getElementsByName($parent + "[SNombre]")[0].value = 'NO TIENE';
        document.getElementsByName($parent + "[TNombre]")[0].value = 'NO TIENE';
        document.getElementsByName($parent + "[ApPat]")[0].value = 'NO TIENE';
        document.getElementsByName($parent + "[ApMat]")[0].value = 'NO TIENE';
        document.getElementsByName($parent + "[fonoFijo]")[0].value = '';
        document.getElementsByName($parent + "[fonoCelu]")[0].value = '123123123';
        document.getElementsByName($parent + "[rut]")[0].value = '160000000-0';
        document.getElementsByName($parent + "[genero]")[0].value = 'Hombre';
        document.getElementsByName($parent + "[email]")[0].value = '';
        document.getElementsByName($parent + "[estadoCivil]")[0].value = 'Soltero/a';
        document.getElementsByName($parent +"[nivelEducacional]")[0].value = 'Sin estudios';
        document.getElementsByName($parent +"[paisDeOrigen]")[0].value = 'Chile';
        document.getElementsByName($parent +"[profesion]")[0].value = 'Sin Ocupación';
        document.getElementsByName($parent +"[fechaNacimiento]")[0].value = "1960-01-01";

        document.getElementsByName($parent +"[direccion][idComuna]")[0].value = 104;
        document.getElementsByName($parent +"[direccion][calle]")[0].value = 'NO TIENE';
        document.getElementsByName($parent +"[direccion][nroCalle]")[0].value = 'NO TIENE';
        document.getElementsByName($parent +"[direccion][dpto]")[0].value = "";
        document.getElementsByName($parent +"[direccion][bloqueTorre]")[0].value = "";



        if($parent == "madre"){
          document.getElementsByName("madre[rut]")[0].value = '160000001-9';
          document.getElementsByName("madre[genero]")[0].value = 'Mujer';
        }
}

function clearOutFormOfParents($parent){
   let parentFields = document.querySelectorAll('[name^=' + $parent + '\\[' + ']')
  var i;
  for (i = 0; i < parentFields.length; i++) {
    if(i != parentFields.length-1){ // No borra el último por que el último es el parentesco
      parentFields[i].value = "";
    }
    
  }
}

function blockfieldsOrNotParents($parent, $blockOrNot){
  let parentFields = document.querySelectorAll('[name^=' + $parent + '\\[' + ']')
  var i;
  for (i = 0; i < parentFields.length; i++) {
   //parentFields[i].disabled = $blockOrNot; //no entra con los parámetros escritos al request
   parentFields[i].readOnly = $blockOrNot; //entra al request con los parametros
   if(parentFields[i].tagName === 'SELECT'){
    if(i != parentFields.length-1){ //Evitamos que se borren los datos de parentesco madre y padre
       parentFields[i].disabled = $blockOrNot;
    }
       
   }
  }
}


function actionsOfCheckboxParents($parent, $checkBox){
   if ($checkBox.checked == true){ //si no tiene padre los datos se rellenan automáticamente
        fillFieldsIfDoNotHaveParents($parent)
        blockfieldsOrNotParents($parent, true)
    } else {
        clearOutFormOfParents($parent)
        blockfieldsOrNotParents($parent, false)
    }
}


/*ESTOS SON LAS FUNCIONES LLAMADAS POR LOS CHECKBOXES*/
function sinPadre() {
    var checkBox = document.getElementById("tienePadre");
    actionsOfCheckboxParents('padre', checkBox)
}


function sinMadre() {
    var checkBox = document.getElementById("tieneMadre");
    actionsOfCheckboxParents('madre', checkBox)
}
