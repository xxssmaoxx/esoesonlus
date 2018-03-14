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
		$res = $stmt->get_result()->fetch_all();

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

		
		
		
		
		for($i=0; $i<count($res); $i++){

			$desc = $res[$i][0];
			$luogo = $res[$i][1];
			$data = $res[$i][2];
			$ora_inizio = $res[$i][3];
			echo "	{
						title: '$desc',
						start: '$data',
					},";
		}
		echo "],
			eventClick: function(event) {
				var sign = document.getElementById(\"sign\");
				sign.style.display = \"block\";
				sign.style.zIndex = \"2\"
				return false;
			}
		});
	});

		</script>"; ?>
		<style>
			table{
				position: absolute;
			}
			#calendar {
				max-width: 900px;
				margin: 0 auto;
			}
			.descrizione{
				margin-bottom: 2%;
			}
			.conferma{
				margin-top: 3%;
			}
			#sign{
				background-color: #CCC;
				border-radius: 15px;
				text-align: center;
				margin: 5% 30%;
				display: none;
				position: fixed;
				top:0;
				left:0;
				width: 40%;
				z-index: 1;
				padding: 2%;
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
		<div id="sign">
			<div class="descrizione">query per la descrizione dell'evento<div id="btn-hide" class="fa fa-angle-up"></div></div>
			<div class="evento">
				<div class="row">
					<p class="col-sm-4">Luogo: </p><p class="col-sm-8">query</p>
				</div>
				<div class="row">
					<p class="col-sm-4">Ora di inizio: </p><p class="col-sm-8">query</p>
				</div>
			</div>
			<p class="conferma">clicca qui per registrarti all'evento</p>
			<button class="btn btn-success">Registrati!</button>
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
			var hide = document.getElementById("btn-hide");
			hide.onclick = function(){
				sign.style.display = "none";
				sign.style.zIndex = "0";
			}
		</script>
	</body>
</html>