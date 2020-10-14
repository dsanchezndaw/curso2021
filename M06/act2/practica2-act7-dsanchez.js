var numero = prompt("Escribe un numero decimal con 7 digitos: ")
var x = (Math.round(numero * 100) / 100).toFixed(2);
alert(x)
