<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ESO ES Onlus | Eventi</title>
		<?php include "../imports_riservata.html"; ?>
        <?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html"; ?>
		<?php require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/importsCalendar.html"; ?>
		<?php require "../check_login.php"; ?>
		<?php
		require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";
		$conn = connectDb();
		$stmt = $conn->prepare("SELECT id, descrizione, luogo, indirizzo, data, ora_inizio FROM eventi");
		$res = $stmt->execute();
		$stmt->bind_result($event_id, $descrizione, $luogo, $indirizzo, $data, $ora_inizio);

		echo "<script type=\"text/javascript\">
				$(document).ready(function(){
					$('#calendario').fullCalendar({
						locale: 'it',
						themeSystem: 'jquery-ui',
						header: {
							left: 'prev',
							center: 'title',
							right: 'next'
						},
						events: [";

		
		
		
		
		while(!is_null($stmt->fetch())){
			echo "	{
						title: '$descrizione',
						start: '$data',
						ora: '$ora_inizio',
						luogo: '$luogo',
						indirizzo: '$indirizzo',
						id: '$event_id'
					},";
		}
		echo "],
			eventClick: function(event) {
				setPopupCont(event);
			}
		});
	});

		</script>"; ?>

	<link rel="stylesheet" type="text/css" href="./style.css">

	</head>
	<body>
		<div id="popup">
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
			<button class="btn btn-success sign-in">Registrati!</button>
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
		<script type="text/javascript">
		var popup = $("#popup");
		var hide = $("#btn-hide");
		var desc = $(".descrizione");
		var data = $(".data");
		var event_id = 0;

		hide.on("click", function(){
			popup.hide();
		});

		function setPopupCont(calEvent){
			desc.html(calEvent.title);
			$(".luogo").html(calEvent.luogo + "; " + calEvent.indirizzo);
			$(".ora_inizio").html(calEvent.ora);
			event_id = calEvent.id;
			popup.show();
		}

		$(".sign-in").on("click", function(){
			var req = new XMLHttpRequest();
			req.open("POST", "event.php");
			req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			req.onreadystatechange = function(){
				if(req.readyState == 4){
					console.log(req.responseText);
					if(req.responseText == "0"){
						alert("Sei stato iscritto all'evento: " + desc.html());
					}else{
						alert("non ok");
						alert(req.responseText);
					}
				}
			};
			req.send("id=" + event_id);
			popup.hide();
		});
		</script>
	</body>
</html>