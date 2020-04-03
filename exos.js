function enchere(nom,euros) {
		alert("Merci M/Mme " + nom + " votre proposition est :" + euros + " euros");
	}
function enchereNew(nom,euros) {
		chaine = "Merci M/Mme " + nom + " votre proposition est : " + euros + " euros";
		var res = document.getElementById("resultat");
		res.innerHTML = chaine;
	}

/**************************************************************************************************/
	// Variables globales :
	var p = 0; 				// no de la photo courante
	var nbPhotos = 5; 	// nombre de photos dans le dossier 
	
	function changerVue(){
		p = (p+1) % nbPhotos ; // on "avance" d'un la photo courante
		document.getElementById("vue").src = "images/photo" + p + ".jpg";
		// document.vue.src = "images/photo" + p + ".jpg"; // même résultat
	}
/**************************************************************************************************/
