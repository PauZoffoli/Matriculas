
var ingresoTXT = document.getElementById("fichaAlumno[0][ingresoFamiliarM]") 
function deleteDot(n){
   ingresoTXT.value = ingresoTXT.value.trim().replace(/\./g, '').replace(/\,/g, '')
}
document.getElementById("submit").addEventListener("click", deleteDot);

/*function validate(s) {
    var rgx = /^[0-9]*\.?[0-9]*$/;
    return s.trim().match(rgx);
}

function formatNumberAfter3Digits(n) {

	if(n.target.value.trim() != ""){
		if(!validate(n.target.value)){
			n.target.value = n.target.value.trim().replace(/[^0-9.]/g, "");
		    return "";
		}
		numero = n.target.value
		numero = parseInt(numero.trim().replace(',', '.')).toLocaleString('de-DE')
		return n.target.value = numero
	}
}

function formatNumberAfter3DigitsOnLoad() {

	n = ingresoTXT	
	if(n.value.trim() != ""){
		if(!validate(n.value)){

			n.value = n.value.trim().replace(/[^0-9.]/g, "");
		    return "";
		}
		numero = n.value
		numero = parseInt(numero).toLocaleString('de-DE')
		return n.value = numero
	}
}



ingresoTXT.addEventListener("keyup", formatNumberAfter3Digits);
document.getElementById("submit").addEventListener("click", deleteDot);
window.addEventListener('DOMContentLoaded', formatNumberAfter3DigitsOnLoad , false);*/
