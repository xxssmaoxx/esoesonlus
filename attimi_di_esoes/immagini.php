<?php

	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";

	$conn = connectDb();
	$stmt = $conn->prepare("SELECT src FROM immagini WHERE tipo IN ('P', 'F', 'A') ORDER BY id DESC");
	$res = $stmt->execute();
	$res = $stmt->bind_result($img);

	$i = 1;
	//Si apre il primo blocco di immagini 
	echo "<div class=\"block-img\">";
	/*l'indice del ciclo for deve partire da 1 altrimenti mette il divisore dopo la prima immagine.*/
	while(!is_null($stmt->fetch())){
		$img = "/esoes/uploads/" . $img;

		echo "<img class=\"img\" src=\"$img\">";

		//ogni 25 immagini metto il divisore, chiudo il blocco di immagini e apro un nuovo blocco.
		if($i%25 == 0){
			echo "<div class=\"divisor\"><span class=\"line\">______ </span><span class=\"fa fa-chevron-down\"></span><span class=\"line\"> ______</span></div></div>
			<div class=\"block-img\">";
		}
		$i++;
	}

	echo "</div>";
?>