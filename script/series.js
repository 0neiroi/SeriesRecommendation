// Load the table with no sorting
loadJSONDoc();


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
			console.log("coucou chargement");
			insert();
		}
	};

	// Initialize request
	xmlhttp.open("GET", "script/series.php", true);

	// Send
	xmlhttp.send();
}

/**
 * Insert the specified content (array of movies) in the specified table
 */
function insert(){
	var container = document.getElementById("affichageSeries");
	console.log("coucou insertion");
  	console.log(obj.series[0].id);
}

