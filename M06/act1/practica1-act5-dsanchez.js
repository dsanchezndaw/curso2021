var cont = 0;
var suma = 0;
var numero;
while (cont <= 4){
    numero = prompt("Introduzca un numero: ","");
    numero = parseInt(numero);
    suma += numero;
    cont += 1;
}
alert("La suma de los numeros es: " + suma);