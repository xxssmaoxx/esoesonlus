<?php
	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";
	session_start();

	$user = $_SESSION['user'];
	$event_id = $_POST["id"];

	//Query per recuperare il nome clown
	$conn = connectDb();
    $stmt = $conn->prepare("SELECT nome_clown FROM clown WHERE user=?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($clown_name);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    $conn = connectDb();

	$stmt = $conn->prepare("INSERT INTO presenze VALUES(?, ?)");

	if($stmt){
		$stmt->bind_param('si', $clown_name, $event_id);
	}else{
		echo $conn->error;
	}

	if(!$stmt->execute()){
		exit("Errore durante l'esecuzione della query : " . $stmt->error);
	}

	echo "0";
?>
