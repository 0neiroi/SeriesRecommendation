/**
 * Load a JSON document and process its content to fill the movie table.
 * @param sort - the type of sorting
 */
function loadJSONDoc(){
    // Create XMLHttpRequest object
	var xmlhttp;
	if (window.XMLHttpRequest){
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else{
		// code for IE5 and IE6
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}


	// Things to do when a response arrives
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			// Parse the response
			var obj = JSON.parse(xmlhttp.responseText);
			insert(obj);
		}
	};

	// Initialize request
	xmlhttp.open("GET", "http://localhost/githubProject/SeriesRecommendation/script/series.php", true);
	 /*VALERE*/ // ^^^^^^^^^^^^^^^^ 
  //  xmlhttp.open("GET", "script/series.php", true); il faut faire attention au chemin. ici, les deux scripts sont dans le même répertoire ;)
  // My bad, en fait il faut mettre le protocole et le chemin entier ... pourquoi ? je ne sais pas.

	// Send
	xmlhttp.send();
}

/**
 * Insert the specified content (array of movies) in the specified list
 */
function insert(obj){
	// pour chaque série présente dans le tableau retourné en JSON, on va afficher le titre de la série dans une liste
	for (var i=0;i<obj.project.length;i++){
		// on récupère la liste où seront affichées les séries
		var container = document.getElementById("listeSeries");
		// on crée une nouvelle puce dans la liste
		var newli = document.createElement("li");
		// on attribue à cette puce le nom de la série
		newli.innerHTML = obj.project[i].name;	
		/*VALERE*/ // ^^^^^^^^^^^^^^^^ 
		// newli.setAttribut("nom de l'attribut", valeur de l'attribue) sert à mettre des choses dans les balises 
		// on ajoute la puce dans la liste
		container.appendChild(newli);
	}

}

// Load the table with no sorting
loadJSONDoc();


