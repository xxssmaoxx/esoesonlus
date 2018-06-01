<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<?php include("./utilities/imports.html"); ?>
        <link rel="stylesheet" href="./css/home.css">
		
		<title>ESO ES Onlus</title>
	</head>
	<body>
		<?php include("./utilities/menu.php"); ?>
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
				include("./utilities/articoli_home.php");
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