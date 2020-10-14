var a1 = new Date();
var pregunta = prompt("¿Cuanto pesa una molecula de hidrogeno?");
var a2 = new Date();
var a3 = ((a2-a1)/1000).toFixed(2);
var a4 = ("Has tardado " + a3 + "segundos");
    alert (a4);
