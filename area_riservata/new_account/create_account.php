<?php
	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";

	$user = $_POST["user"];
	$clownName = $_POST["clownName"];
	$email = $_POST["email"];
	$permessi = $_POST["permessi"];
	$password = str_shuffle(bin2hex(openssl_random_pseudo_bytes(4)));
	$password_hash = sha1($password);

	//Connessione al database

	$conn = connectDb();	

	//Query inserimento utenti con prepared statement, la seconda analoga per le informazioni del clown.

	$stmt = $conn->prepare("INSERT INTO utenti (user, pwd, permessi) VALUES(?, ?, ?)");

	if($stmt){
		$stmt->bind_param("sss", $user, $password_hash, $permessi);
	}else{
		echo $conn->error;
	}

	if(!$stmt->execute()){
		exit("Errore durante l'esecuzione della query : " . $stmt->error);
	}


	$stmt = $conn->prepare("INSERT INTO clown (user, nome_clown, mail) VALUES(?, ?, ?)");

	if($stmt){
		$stmt->bind_param("sss", $user, $clownName, $email);
	}else{
		echo $conn->error;
	}	

	if(!$stmt->execute()){
		exit("Errore durante l'esecuzione della query : " . $stmt->error);
	}

/*
	$body = "Messaggio da EsoEs Onlus.\n Ciao " . $clownName . "\nIl tuo user " . $user . " è stato eliminato dal sito www.esoesonlus.org";

	if (mail($email, "Messaggio dal sito", $body)){
		echo 0;
	}else{
		echo -1;
	}
*/

	echo "0";
?>
