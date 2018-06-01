<?php
	require "connectDb.php";
	//connessione al DB
	$conn = connectDb();
	//preparazione della query
	$stmt = $conn->prepare("SELECT src, nome_clown, user, frase FROM clown 
							JOIN immagini ON (clown.id_img = immagini.id) 
							ORDER BY nome_clown");
	//esecuzione della query
	$res = $stmt->execute();
	$res = $stmt->get_result()->fetch_all();
	//ciclo che recupera il risultato della query
	for($i=0; $i<count($res); $i++){
		/*per ogni record trovato ricavo le informazioni del clown e poi genero la sua carta*/
		$img = "/esoes/uploads/" . $res[$i][0];
		$name = $res[$i][1];
		$user = $res[$i][2];
		$frase = $res[$i][3];

		echo "
		<div class=\"carte animated pulseHover\">
			<div class=\"x\"><span class=\"fa fa-times-circle delete-user\" id=\"$user\"></span></div>
			<div class=\"info\">
				<img class=\"img-clown\" src=\"$img\">
				<p class=\"name\">$name</p>
				<p class=\"frase\">$frase</p>
			</div>
		</div>";	
	}
?>