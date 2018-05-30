<?php
	require "../../utilities/connectDb.php";

	$titolo = $_POST["titolo"];
	$luogo = $_POST["luogo"];
	$indirizzo = $_POST["indirizzo"];
	$giorno = $_POST["giorno"];
	$tipo = $_POST["tipo"];
	$ora = $_POST["ora"];	

	switch ($tipo) {
		case 0:
			$tipo = "S";
			break;
		
		default:
			$tipo = "A";
			break;
	}
	
	$conn = connectDb();	
	$stmt = $conn->prepare("INSERT INTO eventi (descrizione, luogo, indirizzo, data, tipo, ora_inizio)
							VALUES(?, ?, ?, STR_TO_DATE(?, '%d-%m-%Y'), ?, STR_TO_DATE(?, '%H:%i'))");
	$stmt->bind_param("ssssss", $titolo, $luogo, $indirizzo, $giorno, $tipo, $ora);
	if(!$stmt->execute()){
		//exit("Errore durante l'esecuzione della query : " . $stmt->error());
		echo $stmt->error;
	}else{
	  echo "0";
	}

?>
