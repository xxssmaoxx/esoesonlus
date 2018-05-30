<?php
	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";
	session_start();

	$user = $_SESSION['user'];
	$event_id = $_POST["id"];
	$elimina = $_POST["presenza"];
	if($elimina == "true"){
		$conn = connectDb();

		$stmt = $conn->prepare("DELETE FROM presenze WHERE user = ? AND id_evento = ?");

		if($stmt){
			$stmt->bind_param('si', $user, $event_id);
		}else{
			echo $conn->error;
		}

		if(!$stmt->execute()){
			exit("Errore durante l'esecuzione della query : " . $stmt->error);
		}

		echo "0";

	}else{

	    $conn = connectDb();

		$stmt = $conn->prepare("INSERT INTO presenze VALUES(?, ?)");

		if($stmt){
			$stmt->bind_param('si', $user, $event_id);
		}else{
			echo $conn->error;
		}

		if(!$stmt->execute()){
			exit("Errore durante l'esecuzione della query : " . $stmt->error);
		}

		echo "0";
	}

?>
