var suma = 0;
var numero;
while (numero != 0){
    numero = prompt("Introduzca un numero: ","");
    numero = parseInt(numero);
    suma += numero;
}
alert("La suma de los numeros es: " + suma);