<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ESO ES Onlus | Eventi</title>
        <?php include "../utilities/imports.html"; ?>
		<?php require "../utilities/importsCalendar.html"; ?>
		<?php
		require "../utilities/connectDb.php";
		$conn = connectDb();
		

		echo "<script type=\"text/javascript\">
				$(document).ready(function(){
					$('#calendario').fullCalendar({
						locale: 'it',
						themeSystem: 'jquery-ui',
						themeName: 'cupertino',
						header: {
							left: 'prev',
							center: 'title',
							right: 'next'
						},
						events: [";

		$stmt = $conn->prepare("SELECT descrizione, luogo, giorno, ora_inizio FROM eventi
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