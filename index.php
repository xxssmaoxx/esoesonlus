<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<?php include "./utilities/imports.html"; ?>
        <link rel="stylesheet" href="./css/home.css">
		
		<title>ESO ES Onlus</title>
	</head>
	<body>
		<?php include "./utilities/menu.php"; ?>
		<div class="container">
        	<div class="jumbotron text-center animated zoomIn">
			<br>
			<br>
			<h5 class="bold">ESO ES ONLUS</h5>
			<p>&nbsp;</p>
			<p class="">clownterapia, animazione socio-teatrale&nbsp;in contesti di disagio&nbsp;e performance artistiche a sostegno&nbsp;di&nbsp;cause sociali e progetti di solidarietà internazionale!</p>
            <p>&nbsp;</p>
			<p><a href="/esoes/chi_siamo"><button class="button pointer animated bounceHover">APPROFONDISCI!</button></a></p>
            </div>
		</div>
		<div id="container">
			<?php
				require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";

				$conn = connectDb();
				$stmt = $conn->prepare("SELECT titolo, testo, src FROM articoli, pagine, immagini WHERE articoli.id_pagine = pagine.id AND pagine.id_img = immagini.id AND pagine.tipo = 'H' ");
				echo $conn->error;
				$stmt->execute();
				$stmt->bind_result($titolo, $testo, $src);
				while($stmt->fetch() != NULL){
					$content = substr($testo, 0, 300) . "...";
					echo "<div class='sezione'><img class='img-responsive' src='/esoes/uploads/$src'><p>&nbsp;</p><h4 class='bold titolo_card'>$titolo</h4><p class='small'>$content</p></div>";
				}
			?>
		</div>
		<?php include "./utilities/footer.html"; ?>	
		<script type="text/javascript" src="./js/home.js">
			/*
			*In questo file c'è lo script che serve per dare alle 3 sezioni la stessa altezza.
			*Inoltre è anche presente il ridimensionamento del titolo, che permette di allineare il testo sottostante
			*/
		</script>
	</body>
</html>