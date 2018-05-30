<?php
	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";

	$conn = connectDb();
	$stmt = $conn->prepare("SELECT src, titolo, testo FROM immagini JOIN pagine ON pagine.id_img = immagini.id JOIN articoli ON pagine.id = articoli.id_pagine WHERE (pagine.tipo='A' OR pagine.tipo = 'H') ORDER BY pagine.id DESC");
	$res = $stmt->execute();
	$res = $stmt->bind_result($src, $titolo, $testo);

	//metto l'inizio del blocco degli articoli
	echo "<div class=\"block-article\">";

	for($i=0; !is_null($stmt->fetch()); $i++){
		$img = "/esoes/uploads/" . $src;

		echo "
		<div class=\"articolo\">
			<img class=\"img-articolo\" src=\"$img\">
			<div class=\"inline\">
				<h1 class=\"titolo bold\">$titolo</h1>
				<span class=\"black fa fa-angle-double-down show-text\" id=\"show-text\"></span>
			</div>
			<div class=\"testo\" id=\"testo-$i\">$testo</div>
		</div>";

		//se il numero dell'articolo è divisibile per 10 allora metto il divisore
		if(($i + 1)%10 == 0){
			echo"<p class=\"divisor\"><span class=\"little-star\">&#9734;</span><span class=\"right-left\">&#9734;</span><span class=\"star\">&#9734;</span><span class=\"right-left\">&#9734;</span><span class=\"little-star\">&#9734;</span></p></div><div class=\"block-article\">";
		}
	}

	echo "</div>";
?>