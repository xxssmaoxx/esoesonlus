$(document).ready(function(){
	var profilo = $("#profilo");
	var insert_article = $("#insert-article");
	var edti_article = $("#edit-article");
	var add_clown = $("#add-clown");
	var add_event = $("#add-event");
	var event = $("#event");

	//recupero l'url della pagina corrente
	var location = window.location.href;
	//mi salvo l'url in un vettore dividendolo in singole stringhe ad ogni /
	var res = location.split("/");
	console.log(res);
	//recupero il nome della cartella che contiene il file index.php della pagina corrente.
	var index = res.length - 2;

	/*
	* Per ogni pagina del sito rimuovo la classe .active alla voce del menu che l'aveva prima e l'assegno alla voce del menu della pagina corrente.
	*/
	switch(res[index]){
		//index.php dell'area riservata, quindi la pagina "Il mio profilo".
		case "area_riservata":
			profilo.addClass("active");
		break;
		case "event":
			event.addClass("active");
		break;
		case "new_article":
			insert_article.addClass("active");
		break;
		case "edit_article":
			edti_article.addClass("active");
		break;
		case "add_card":
			add_clown.addClass("active");
		break;
		case "new_account":
			add_clown.addClass("active");
		break;
		case "new_event":
			add_event.addClass("active");
		break;

	};
})