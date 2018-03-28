var width;
var width_img;
var height_img;
var max_height;
var info_max = 0;
var margin_top;
//imposto l'altezza dei margini interni alla carta
var margin = 10;
var n;
var cont_width;
/*
*La funzione resize() setta la larghezza e l'altezza delle immagini di profilo dei clown (altezza = larghezza), e poi setta la larghezza della carta stessa in modo che ce ne siano al massimo quattro affiancate e l'altezza in base all'altezza massima che assume il paragrafo che contiene la frase del clown, tenendo conto anche dell'altezza dell'immagine e di tutti i margini tra un elemento e l'altro.
*/
function resize(){
	n=4;
	info_max = 0;
	cont_width = cont.width();
	width = (cont_width-100)/n;
	while(width < 200 && n > 1){
		n--;
		width = (cont_width-100)/n;
	}
	if(width<200 && n==1){
		width = 200;
	}
	/*
	*l'immagine è 30 px più stretta della carta a causa dei margini. Setto larghezza e altezza dell'immagine uguali (l'immagine apparirà quadrata), ma salvo comunque l'altezza in un altra variabile di modo che sia più semplice un eventuale futura modifica.
	*/
	width_img = width - 30;
	//N.B.: L'immagine e in 4/3
	height_img = (width_img*3)/4;

	img.attr("width",width_img);
	img.attr("height",height_img);
	//setto la larghezza dell'immagine
	carte.width(width);
	//cerco la height massima del div .info che contiene l'immagine, il nome e la frase del clown
	$(".info").each(function() {
		//resetto l'altezza del div .info in modo da non recuperare sempre l'altezza assegnata in precedenza
		$(this).attr("style","");
		var height = $(this).height();
		info_max = height > info_max ? height : info_max;
	});
	/*
	*una volta salvata l'altezza massima del paragrafo .frase setto l'altezza della carta all'altezza massima al div .info (contiene immagine, nome e frase del clown) maggiorata dei margini
	*/
	max_height = info_max + margin;
	carte.height(max_height);
	$(".info").each(function() {
		//resetto l'altezza del div .info in modo da non recuperare l'altezza settata precedentemente
		$(this).attr("style","");
		var height = $(this).height();
		margin_top = (max_height - height)/2;
		$(this).attr("style","margin-top: " + margin_top + "px");
	});
}

var cont = $(".contenitore");
var carte = $(".carte");
var img = $(".img-clown");
var win = $(window);
//al caricamento della pagina richiamo la funzione resize per settare le dimensioni delle carte
$(document).ready(resize);
//ad ogni ridimensionamento della pagina richiamo la funzione resize per settare le dimensioni delle carte
win.on("resize", resize);

var max = -1;