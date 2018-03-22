$(document).ready(function(){
	var profilo = $("#profilo");
	var insert_article = $("#insert-article");
	var edti_article = $("#edit-article");
	var add_clown = $("#add-clown");
	var add_event = $("#add-event");
	var event = $("#event");

	//imposto precedente al profilo perchè è la pagina su cui si viene indirizzati subito dopo l'accesso.
	var precedente = profilo;

	//recupero l'url della pagina corrente
	var location = window.location.href;
	//mi salvo l'url in un vettore dividendolo in singole stringhe ad ogni /
	var res = location.split("/");
	//recupero il nome della cartella che contiene il file index.php della pagina corrente.
	var length = res.length - 2;

	/*
	* Per ogni pagina del sito rimuovo la classe .active alla voce del menu che l'aveva prima e l'assegno alla voce del menu della pagina corrente.
	*/
	switch(res[length]){
		//index.php dell'area riservata, quindi la pagina "Il mio profilo".
		case "":
			precedente.removeClass("active");
			profilo.addClass("active");
		break;
		case "event":
			precedente.removeClass("active");
			event.addClass("active");
		break;
		case "new_article":
			precedente.removeClass("active");
			insert_article.addClass("active");
		break;
		case "edit_article":
			precedente.removeClass("active");
			edti_article.addClass("active");
		break;
		case "add_card":
			precedente.removeClass("active");
			add_clown.addClass("active");
		break;
		case "new_account":
			precedente.removeClass("active");
			add_clown.addClass("active");
		break;
		case "new_event":
			precedente.removeClass("active");
			add_event.addClass("active");
		break;

	};
})