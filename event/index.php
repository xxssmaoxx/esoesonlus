<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ESO ES Onlus | Eventi</title>
        <?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html"; ?>
		<?php require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/importsCalendar.html"; ?>
		<?php
		require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";
		$conn = connectDb();
		$stmt = $conn->prepare("SELECT descrizione, luogo, indirizzo, data, ora_inizio FROM eventi WHERE tipo = 'S'");
		$res = $stmt->execute();
		$stmt->bind_result($descrizione, $luogo, $indirizzo, $data, $ora_inizio);

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
						data: '$data'
					},";
		}
		echo "],
			eventClick: function(event) {
				setPopupCont(event);
			}
		});
	});

		</script>"; ?>
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
		<div id="popup">
			<div id="btn-hide" class="fa fa-angle-up"></div>
			<div class="descrizione bold"></div>
			<div class="evento">
				<div class="row">
					<p class="col-sm-4">Luogo: </p><p class="col-sm-8 luogo"></p>
				</div>
				<div class="row">
					<p class="col-sm-4">indirizzo: </p><p class="col-sm-8 indirizzo"></p>
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

		hide.on("click", function(){
			popup.hide();
		});

		function setPopupCont(calEvent){
			desc.html(calEvent.title);
			$(".luogo").html(calEvent.luogo);
			$(".indirizzo").html(calEvent.indirizzo);
			$(".ora_inizio").html(calEvent.ora);
			popup.show();
		}
		</script>
	</body>
</html>