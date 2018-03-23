<?php
	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";

	$conn = connectDb();
	$stmt = $conn->prepare("SELECT src, titolo, testo FROM immagini JOIN pagine ON pagine.id_img = immagini.id JOIN articoli ON pagine.id = articoli.id_pagine WHERE pagine.tipo='A' ORDER BY pagine.id DESC");
	$res = $stmt->execute();
	$res = $stmt->get_result()->fetch_all();

	$lenght = count($res);

	//metto l'inizio del blocco degli articoli
	echo "<div class=\"block-article\">";

	for($i=0; $i<$lenght; $i++){
		$img = "/esoes/uploads/" . $res[$i][0];
		$titolo = $res[$i][1];
		$testo = $res[$i][2];

		echo "
		<div class=\"articolo\">
			<img class=\"img-articolo\" src=\"$img\">
			<div class=\"inline\">
				<h1 class=\"titolo bold\">$titolo</h1>
				<span class=\"fa fa-angle-double-down show-text\" id=\"show-text\"></span>
			</div>
			<p class=\"testo\" id=\"testo-$i\">$testo</p>
		</div>";

		//se il numero dell'articolo è divisibile per 10 allora metto il divisore
		if(($i + 1)%10 == 0){
			echo"<p class=\"divisor\"><span class=\"little-star\">&#9734;</span><span class=\"right-left\">&#9734;</span><span class=\"star\">&#9734;</span><span class=\"right-left\">&#9734;</span><span class=\"little-star\">&#9734;</span></p></div><div class=\"block-article\">";
		}
	}
	echo "</div>"
?>