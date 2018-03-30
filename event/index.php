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
		$stmt = $conn->prepare("SELECT descrizione, luogo, data, ora_inizio FROM eventi");
		$res = $stmt->execute();
		$stmt->bind_result($descrizione, $luogo, $data, $ora_inizio);

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
			#calendar {
				max-width: 900px;
				margin: 0 auto;
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
		<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
	</head>
	<body>
		<div id="popup">
			<div id="btn-hide" class="fa fa-angle-up"></div>
			<div class="descrizione bold"></div>
			<div class="evento">
				<div class="row">
					<p class="col-sm-4">Luogo: </p><p class="col-sm-8 data"></p>
				</div>
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

		hide.on("click", function(){
			popup.hide();
		});

		function setPopupCont(calEvent){
			desc.html(calEvent.title);
			$(".luogo").html(calEvent.luogo);
			$(".ora_inizio").html(calEvent.ora);
			data.html(calEvent.data);
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
						alert("ok");
					}else{
						alert("non ok");
						alert(req.responseText);
					}
				}
			};
			req.send("data=" + data.html() + "&titolo=" + desc.html());
			popup.hide();
		});
		</script>
	</body>
</html>