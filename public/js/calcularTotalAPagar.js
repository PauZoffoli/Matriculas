
// SUMAR TODOS LOS VALORES DE LAS BECAS INDIVIDUALES SEGÚN SU PESO
// indexContrato.blade

//Get a list of input fields to sum
var becaPorAlumno = document.getElementsByName("beca");
var arancelPorAlumno = document.getElementsByName("alumno->curso['arancelAnual']");
var totalEscolaridadEnBrutoLBL = document.querySelector("#totalEscolaridadEnBruto");
var becaTotal = document.querySelector("#PorcentajeBeca");
var totalEscolaridadEnBrutoTXT = document.querySelector("#totalAPagar");

function totalAPagarSegunBecaTotal(){
     totalEscolaridadEnBrutoTXT.value = parseInt(
        totalEscolaridadEnBrutoLBL.innerText * 
        ( 1 - (becaTotal.value / 100 )) 
        );
}

//Function to sum the values and assign it to the last input field
function becaTotalSegunCadaBecaIndividual(){
    var sum = 0;
    for(var i=0; i < becaPorAlumno.length; i++){
       sum += parseFloat( 
        ( becaPorAlumno[i].value * 
        (arancelPorAlumno[i].innerText/totalEscolaridadEnBrutoLBL.innerText)) 
        , 10);
    }
    becaTotal.value = sum; //Cambiamos el valor del recuadro % Beca
    totalAPagarSegunBecaTotal(); //Cambiamos el valor del recuadro Total a Pagar
}

//Assign the keyup event handler
for(var i=0; i < becaPorAlumno.length; i++){
    becaPorAlumno[i].addEventListener("keyup", becaTotalSegunCadaBecaIndividual);
}
if (becaTotal) {
becaTotal.addEventListener("keyup", totalAPagarSegunBecaTotal);
}