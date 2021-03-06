<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ESO ES Onlus | Eventi</title>
        <?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html"; ?>
		<?php require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/importsCalendar.html"; ?>
		<?php
		require "../utilities/connectDb.php";
		$conn = connectDb();
		

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

		$stmt = $conn->prepare("SELECT descrizione, luogo, data, ora_inizio FROM eventi
								WHERE tipo = 'S'");
		$res = $stmt->execute();
		$res = $stmt->get_result()->fetch_all();
		
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
		echo "]
		});
	});

		</script>"; ?>
		<style>
			#calendar {
				max-width: 900px;
				margin: 0 auto;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
	</head>
	<body>
		<?php include "../utilities/menu.php"; ?>
    	<div class="container">
        	<h2 class="text-center bold">Questi sono i nostri eventi futuri:</h2>
            <p class="text-center">scorri il calendario</p>
			<div id = "calendario">
        	</div>
		</div>
	</body>
</html>