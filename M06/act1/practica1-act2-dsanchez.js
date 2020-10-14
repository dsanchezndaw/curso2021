var hora;
		hora = prompt("¿Que hora es?"); 
  		hora = parseInt(hora); 			
		if(hora>6 && hora<12) {
		   alert("Bon dia");
        } else if(hora>13 && hora<18) {
           alert("Bona tarda");
        } else {
           alert("Bona nit");	
        }			
