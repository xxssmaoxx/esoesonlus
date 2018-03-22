<?php
	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";

	$conn = connectDb();
	$stmt = $conn->prepare("SELECT src FROM immagini WHERE tipo IN ('P', 'F', 'A') ");
	$res = $stmt->execute();
	$res = $stmt->get_result()->fetch_all();

	$lenght = count($res) + 1;
	
	//Si apre il primo blocco di immagini 
	echo "<div class=\"block-img\">";
	/*l'indice del ciclo for deve partire da 1 altrimenti mette il divisore dopo la prima immagine.*/
	for($i=1; $i<$lenght; $i++){
		//sono costretto a decrementare l'indice quando recupero l'immagine dal vettore se no perdo la prima.
		$img = "/esoes/uploads/" . $res[$i-1][0];

		echo "<img class=\"img\" src=\"$img\">";

		//ogni 25 immagini metto il divisore, chiudo il blocco di immagini e apro un nuovo blocco.
		if($i%25 == 0){
			echo "</div><div class=\"divisor\"><span class=\"line\">______ </span><span class=\"fa fa-chevron-down\"></span><span class=\"line\"> ______</span></div>
			<div class=\"block-img\">";
		}
	}

	echo "</div>";
	
?>