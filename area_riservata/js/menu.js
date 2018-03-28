$(document).ready(function(){
	var profilo = $("#profilo");
	var insert_article = $("#insert-article");
	var edti_article = $("#edit-article");
	var add_clown = $("#add-clown");
	var add_event = $("#add-event");
	var event = $("#event");
	var menu = document.getElementsByClassName("list-group-item");
	//imposto precedente al profilo perchè è la pagina su cui si viene indirizzati subito dopo l'accesso.
	var precedente = profilo;
	for(var i=0; i<menu.length; i++){
		if(menu[i].href + "/" == location.href){
			$(menu[i]).toggleClass("active");
		}
	}
})