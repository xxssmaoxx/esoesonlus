var max_height;
var max_title_height;

function resize(){
	max_height = 0;
	max_title_height = 0;
	/*
	*---TITOLO---
	*calcolo l'altezza massima del titolo delle 3 carte della home page per dare a tutti la stessa altezza ed allineare di conseguenza il testo sottostante
	*/
	titolo.each(function() {
			//rimouvo l'altezza assegnata prima in modo da non avere l'altezza del titolo già assegnata
			$(this).attr("style", "");
			var height = $(this).height();
			max_title_height = (height > max_title_height)? height : max_title_height;
	});
	titolo.height(max_title_height);

	/*
	*---CARTE---
	*calcolo l'altezza massima delle 3 carte della home page per dare a tutte la stessa altezza
	*/
	carte.each(function() {
		//rimouvo l'altezza assegnata prima in modo da non avere l'altezza della carta già assegnata
		$(this).attr("style", "");
		var height = $(this).height();
		max_height = height > max_height ? height : max_height;
	});
	carte.height(max_height);
}

var cont = $(".contenitore");
var carte = $(".sezione");
var titolo = $(".titolo_card");
var win = $(window);
//al caricamento della pagina richiamo la funzione resize per settare le dimensioni delle carte
$(document).ready(resize);
//ad ogni ridimensionamento della pagina richiamo la funzione resize per settare le dimensioni delle carte
win.on("resize", resize);
