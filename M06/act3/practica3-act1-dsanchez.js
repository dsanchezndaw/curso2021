function validaCorreu (gmail){
var gmail = prompt("Cual es tu correo: ")
    if (gmail.includes("@")){
        return true;
    }else if(gmail.includes("@@")){
        return false;
    }else if(!gmail.includes("@")){
        return false;
    }
}

if (validaCorreu(gmail)==true){
    alert("Funciona")
}else if (validaCorreu(gmail)=false){
    alert("No funciona")
}

