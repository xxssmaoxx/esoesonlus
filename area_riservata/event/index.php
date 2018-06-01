<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ESO ES Onlus | Eventi</title>
		<?php 
			/* SETTINGS */
			$permission = 3;
			$allenamenti = true;
			
        	include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html"; 
			include "../imports_riservata.html";
			require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/importsCalendar.html"; 
			require "../check_login.php";
			require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";			
			require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/get_eventi.php";
		?>

	<link rel="stylesheet" type="text/css" href="./style.css">
	<style>
		.fc-view-container{
			background: white;
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
					<p class="col-sm-4">Ora di inizio: </p><p class="col-sm-8 ora_inizio"></p>
				</div>
			</div>
			<p class="conferma">clicca qui per registrarti all'evento</p>
			<button class="btn sign-in"></button>
		</div>
		<div class="esterno" id="esterno">
			<?php include "../menu.php"; ?>
	    	<div class="contenitore">
	        	<h2 class="text-center bold">Questi sono i nostri eventi futuri:</h2>
	            <p class="text-center">Scorri il calendario e iscriviti ai nostri allenamenti e spettacoli!</p>
				<div id = "calendario">
	        	</div>
			</div>
		</div>
		<script type="text/javascript" src="./script.js"></script>
	</body>
</html>
