/*
 * La fonction typeEffet fait apparaître le contenu d'une chaîne de caractère lettre par lettre.
 * Elle prend 2 paramètres : 1 élément html contenant du texte, 1 vitesse de défilement en ms
 * L'élément html choisi est d'abord vidé de son contenu.
 * On initialise un compteur à 0
 * On initialise un timer avec setInterval() qui déclenche 1 fonction toutes les 0.O6 sec.
 * A chaque tour de compteur, jusqu'à atteindre la longueur totale de la chaîne de caractère,
 * on rempli l'élément par une lettre
 * charAt()retourne le caractère de la chaîne correspondant à la position indiquée par le compteur i
 */

function typeEffect(element, speed){ 
	
	let text = element.innerHTML; 
	element.innerHTML = ""; 
	
	let i = 0; 
	
	let timer = setInterval(function() {
		if (i < text.length) {
      			element.append(text.charAt(i)); 
      			i++; 
    		} else {
      			clearInterval(timer);
    		}
  	}, speed);
}
// Définition des paramètres
const quote = document.getElementById('quote'); //Element html où appliquer la fonction
let speed = 60; // vitesse

// Appel fonction avec ses paramètres
typeEffect(quote, speed);

