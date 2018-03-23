<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html" ?>
	<link href="./style.css" rel="stylesheet" />
	<link href="/esoes/css/carte.css" rel="stylesheet" />
	
	<title>EsoEs Onlus | I clown</title>
</head>
<body>
	<?php include "../utilities/menu.php" ?>	
	<div class="contenitore">
		<h3 class="title">Ecco a voi tutti i nostri <b class="red">clown</b> che con <b class="blue">entusiamo</b> e <b class="blue">passione</b> si dedicano al volontariato:</h3>
		<?php
		$_SESSION["riservata"] = false;
		require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/carte.php";
		?>
	</div>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/footer.html" ?>
	<script type="text/javascript">
		var width;
		var width_img;
		var height_img;
		var max_height;
		var info_max = 0;
		var margin_top;
		//imposto l'altezza dei margini interni alla carta
		var margin = 10;
		/*
		*La funzione resize() setta la larghezza e l'altezza delle immagini di profilo dei clown (altezza = larghezza), e poi setta la larghezza della carta stessa in modo che ce ne siano al massimo quattro affiancate e l'altezza in base all'altezza massima che assume il paragrafo che contiene la frase del clown, tenendo conto anche dell'altezza dell'immagine e di tutti i margini tra un elemento e l'altro.
		*/
		function resize(){
			width = (cont.width()-100)/4;
			//la larghezza minima della carta è 200px 
			if(width < 200){
				width = 200;
			}
			/*
			*l'immagine è 30 px più stretta della carta a causa dei margini. Setto larghezza e altezza dell'immagine uguali (l'immagine apparirà quadrata), ma salvo comunque l'altezza in un altra variabile di modo che sia più semplice un eventuale futura modifica.
			*/
			width_img = width - 30;
			height_img = (width_img*3)/4;

			img.attr("width",width_img);
			img.attr("height",height_img);
			//setto la larghezza dell'immagine
			carte.width(width);
			//cerco la height massima del div .info che contiene l'immagine, il nome e la frase del clown
			$(".info").each(function() {
				var height = $(this).height();
				info_max = height > info_max ? height : info_max;
			});
			/*
			*una volta salvata l'altezza massima del paragrafo .frase setto l'altezza della carta all'altezza massima al div .info (contiene immagine, nome e frase del clown) maggiorata dei margini
			*/
			max_height = info_max + margin;
			carte.height(max_height);

			$(".info").each(function() {
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
		$(document).ready(function(){
			resize();
		});
		//ad ogni ridimensionamento della pagina richiamo la funzione resize per settare le dimensioni delle carte
		win.on("resize", function(){
			resize();
		});

		var max = -1;
	</script>
</body>
</html>