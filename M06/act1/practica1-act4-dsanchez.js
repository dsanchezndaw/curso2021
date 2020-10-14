var estacion;
    estacion = (11 && 0 && 1 == "Estamos en Hinvierno", 2 && 3 && 4 == "Estamos en Primavera", 5 && 6 && 7 == "Estamos en Verano", 8 && 9 && 10 == "Estamos en Otoño");
var mes;
    mes = prompt("Expresa un mes en forma numerica: ");
    mes = parseInt(mes);
    if (mes==0 ){
        alert("Enero,");
    } else if (mes==1){
        alert("Febrero," +estacion);
    } else if (mes==2){ 
        alert("Marzo," +estacion);
    } else if (mes==3){
        alert("Abril," +estacion);  
    } else if (mes==4){
        alert("Mayo," +estacion);
    } else if (mes==5){
        alert("Junio," +estacion);
    } else if (mes==6){
        alert("Julio," +estacion);
    } else if (mes==7){
        alert("Agosto," +estacion);
    } else if (mes==8){
        alert("Septiembre," +estacion);
    } else if (mes==9){
        alert("Octubre," +estacion);
    } else if (mes==10){
        alert("Noviembre," +estacion);
    } else if (mes==11){
        alert("Diciembre," +estacion);
    }