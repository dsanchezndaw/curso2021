divs = document.querySelectorAll("#tabla");
  for (i=0; i< divs.length; i++){
    var colores = ["red","green","blue","black","orange","yellow","brown","pink","purple","grey"];
    divs[i].addEventListener("mouseover", (event) => { 
        var a = [Math.floor(Math.random()*10)];
        event.target.style.background=colores[a];

    });
    divs[i].addEventListener("mouseout", (event) => { 
        event.target.style.background = "white"; 
      });
}