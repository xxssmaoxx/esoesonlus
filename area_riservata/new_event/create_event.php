<?php
	require "../../utilities/connectDb.php";

	$titolo = $_POST["titolo"];
	$luogo = $_POST["luogo"];
	$indirizzo = $_POST["indirizzo"];
	$giorno = $_POST["giorno"];
	$tipo = $_POST["tipo"];
	
	echo $tipo;

	switch ($tipo) {
		case 0:
			$tipo = "S";
			break;
		
		default:
			$tipo = "A";
			break;
	}
	
	echo $giorno;	
	
	$conn = connectDb();	
	$stmt = $conn->prepare("INSERT INTO eventi (descrizione, luogo, indirizzo, giorno, tipo)
							VALUES(?, ?, ?, STR_TO_DATE(?, '%Y-%m-%d'), ?)");
	$stmt->bind_param("sssss", $titolo, $luogo, $indirizzo, $giorno, $tipo);
	if(!$stmt->execute()){
		//exit("Errore durante l'esecuzione della query : " . $stmt->error());
		var_dump($stmt);
	}else{
	  echo "0";
	}

?>
