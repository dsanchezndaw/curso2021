var gmail = prompt("Cual es tu correo: ")
if (gmail.includes("@")){
    alert("Tu correo es correcto")
}else if(gmail.includes("@","@")){
    alert("Hay mas de un @");
}else if(!gmail.includes("@")){
    alert()
}
