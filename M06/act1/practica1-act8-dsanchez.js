var suma = 0;
var numero;
while (suma != 100){
    numero = prompt("Introduzca un numero: ","");
    numero = parseInt(numero);
    suma += numero;
}
alert("y has necesitado todos estos numeros: " + numero);
