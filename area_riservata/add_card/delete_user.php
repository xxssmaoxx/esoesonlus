<?php
	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";

	$user = $_POST["user"];

	//Connessione al database

	$conn = connectDb();

	//Query inserimento utenti con prepared statement, la seconda analoga per le informazioni del clown.

	$stmt = $conn->prepare("SELECT mail FROM clown WHERE user = ?");

	if($stmt){
		$stmt->bind_param("s", $user);
	}else{
		echo $conn->error;
	}

	if(!$stmt->execute()){
		exit("Errore durante l'esecuzione della query : " . $stmt->error);
	}

	$mail = $stmt->get_result()->fetch_assoc()["mail"];

	$stmt = $conn->prepare("DELETE FROM utenti WHERE user = ?");

	if($stmt){
		$stmt->bind_param("s", $user);
	}else{
		echo $conn->error;
	}

	if(!$stmt->execute()){
		exit("Errore durante l'esecuzione della query : " . $stmt->error);
	}

	$stmt = $conn->prepare("DELETE FROM clown WHERE user = ?");

	if($stmt){
		$stmt->bind_param("s", $user);
	}else{
		echo $conn->error;
	}

	if(!$stmt->execute()){
		exit("Errore durante l'esecuzione della query : " . $stmt->error);
	}

/*
	$body = "Messaggio da EsoEs Onlus.\n Ciao " . $user . "\nIl tuo profilo è stato eliminato dal sito www.esoesonlus.org";

	if (mail($email, "Messaggio dal sito", $body)){
		echo 0;
	}else{
		echo -1;
	}
*/

	echo "0";
?>
