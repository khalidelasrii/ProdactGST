var naveBar= document.createElement("p");
// nav bar element 
var liste = document.createElement("ul");
var li = document.createElement("li");
var lien = document.createElement("a");
var text = document.createTextNode("Brand lixxxxxxxxxxx ");
lien.setAttribute("href","./pages/login_page.html");
lien.appendChild(text);
li.appendChild(lien);
liste.appendChild(li);
naveBar.appendChild(liste);
// Ajouter tout les element a la balaise body
var bodybalaise = document.querySelector("body");
bodybalaise.appendChild(naveBar);