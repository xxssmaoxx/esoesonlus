<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ESO ES Onlus | Eventi</title>
		<?php 
			$permission = 3;
        	include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html"; 
			include "../imports_riservata.html";
			require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/importsCalendar.html"; 
			require "../check_login.php";
			require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";
			$conn = connectDb();
			$stmt = $conn->prepare("SELECT id, descrizione, luogo, indirizzo, data, ora_inizio, (CASE presenze.user WHEN ? THEN 1 ELSE 0 END) FROM eventi LEFT JOIN presenze ON eventi.id = presenze.id_evento");
			echo $conn->error;
			$res = $stmt->bind_param("s", $_SESSION["user"]);
			$res = $stmt->execute();
			$stmt->bind_result($event_id, $descrizione, $luogo, $indirizzo, $data, $ora_inizio, $presenza);

			echo "<script type=\"text/javascript\">
					$(document).ready(function(){
						$('#calendario').fullCalendar({
							locale: 'it',
							themeSystem: 'bootstrap4',
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
							id: '$event_id',
							presenza: $presenza
						},";
			}
			echo "],
				eventClick: function(event) {
					setPopupCont(event);
				}
			});
		});

			</script>"; 
		?>

	<link rel="stylesheet" type="text/css" href="./style.css">
	<style>
		.fc-view-container{
			background: white;
		}
	</style>
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
		<script type="text/javascript" src="./script.js"></script>
	</body>
</html>