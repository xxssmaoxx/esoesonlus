<?php
	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";
	session_start();

	$user = $_SESSION["user"];
	$event = $_POST["titolo"];
	$data = $_POST["data"];

	//Connessione al database

	$conn = connectDb();	

	//Query per recuperare l'id dell'evento
	$stmt = $conn->prepare("SELECT id FROM eventi WHERE descrizione = ? AND data = ?");

	$stmt->bind_param("ss", $event, $data);

	$stmt->execute();
	$stmt->bind_result($event_id);

	//Query per recuperare il nome clown
	/*
	$stmt = $conn->prepare("SELECT nome_clown FROM clown WHERE user = ?");

	$stmt->bind_param("s", $user);

	$stmt->execute();
	$stmt->bind_result($clown_name);

	echo $clown_name;	
	*/
	$stmt = $conn->prepare("INSERT INTO eventi (nome_clown, id_evento) VALUES(?, ?)");

	if($stmt){
		$stmt->bind_param('si', $user, $event_id);
	}else{
		echo $conn->error;
	}


	if(!$stmt->execute()){
		exit("Errore durante l'esecuzione della query : " . $stmt->error);
	}

	echo "0";
?>
