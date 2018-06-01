<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ESO ES Onlus | Eventi</title>
        <?php 
        	include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html"; 
			require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/importsCalendar.html"; 
			require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";
			require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/get_eventi.php";
		?>
		<style>
			#calendario{
				max-width: 900px;
				margin: 0 auto;
			}
			.fc-view-container{
				background: white;
			}
			.descrizione{
				margin-bottom: 2%;
				font-size: 1.5em;
			}
			.conferma{
				margin-top: 3%;
			}
			#btn-hide{
				width: 30px;
				height: 30px;
				font-size: 1.8rem;
			}
			.evento{
				background-color: white;
				border-radius: 10px;
				padding: 3%;
			}
		</style>
	</head>
	<body>
		<div class="popup" id="popup">
			<div id="btn-hide" class="fa fa-angle-up"></div>
			<div class="descrizione bold"></div>
			<div class="evento">
				<div class="row">
					<p class="col-sm-4">Luogo: </p><p class="col-sm-8 luogo"></p>
				</div>
				<div class="row">
					<p class="col-sm-4">Indirizzo: </p><p class="col-sm-8 indirizzo"></p>
				</div>
				<div class="row">
					<p class="col-sm-4">Ora di inizio: </p><p class="col-sm-8 ora_inizio"></p>
				</div>
			</div>
		</div>
		<div class="esterno" id="esterno">
			<?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/menu.php"; ?>
	    	<div class="contenitore">
	        	<h2 class="text-center bold">Questi sono i nostri eventi futuri:</h2>
	            <p class="text-center">Scorri il calendario e iscriviti ai nostri allenamenti e spettacoli!</p>
				<div id = "calendario">
	        	</div>
			</div>
		</div>
		<?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/footer.html"; ?>
		<script type="text/javascript">
		var popup = $("#popup");
		var hide = $("#btn-hide");
		var desc = $(".descrizione");

		/*Quando si clicca sul bottone con la freccia in alto viene nascosto il popup*/
		hide.on("click", function(){
			popup.hide();
		});
		/*Imposto il contenuto del popup ricevendo l'evento che è stato cliccato*/
		function setPopupCont(calEvent){
			//imposto il titolo del popup con il titolo dell'evento
			desc.html(calEvent.title);
			//imposto il luogo
			$(".luogo").html(calEvent.luogo);
			//imposto l'indirizzo
			$(".indirizzo").html(calEvent.indirizzo);
			//imposto l'ora di inizio
			$(".ora_inizio").html(calEvent.ora);
			//mostro il popup
			popup.show();
		}
		</script>
	</body>
</html>