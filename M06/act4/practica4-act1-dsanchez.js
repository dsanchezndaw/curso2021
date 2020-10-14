divs = document.querySelectorAll("#act1");
  for (i=0; i< divs.length; i++)
  {
      divs[i].addEventListener("mouseover", (event) => { 
        event.target.style.background = "red";  
        event.target.style.toUpperCase();  
      });

      divs[i].addEventListener("mouseout", (event) => { 
          
          event.target.style.background = "white";    
      });
  }

