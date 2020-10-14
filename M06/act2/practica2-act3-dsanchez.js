var numero = prompt("Escribe la frase que quieras: ");
var posicion = parseInt(prompt("Elige una posicion: "));
if (numero.length>posicion){
    alert(numero.charAt(posicion));
}else{
    alert("Esa posicion no existe")}
