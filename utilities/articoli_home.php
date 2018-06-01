<?php 

	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";

	$conn = connectDb();
	$stmt = $conn->prepare("SELECT titolo, testo, src FROM articoli, pagine, immagini WHERE articoli.id_pagine = pagine.id AND pagine.id_img = immagini.id AND pagine.tipo = 'H' ");
	echo $conn->error;
	$stmt->execute();
	$stmt->bind_result($titolo, $testo, $src);
	while($stmt->fetch() != NULL){
		$content = substr($testo, 0, 300) . "...";
		echo "<div class='sezione'><img class='img-responsive' src='/esoes/uploads/$src'><p>&nbsp;</p><div><h4 class='bold titolo_card'>$titolo</h4><p class='small'>$content</p></div></div>";
	}
?>