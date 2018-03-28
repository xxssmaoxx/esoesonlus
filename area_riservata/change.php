<?php 
require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";
session_start();

$conn = connectDb();

if(isset($_POST["name"])){	
	$name = $_POST["name"];
	$stmt = $conn->prepare("UPDATE clown SET nome_clown=? WHERE user=?");
	$stmt->bind_param("ss", $name, $_SESSION['user']);
	if(!$stmt->execute()){
		exit("Errore durante l'esecuzione della query : " . $stmt->error());
	}
	echo "0";
}

if(isset($_POST["frase"])){
	$frase = $_POST["frase"];	
	$stmt = $conn->prepare("UPDATE clown SET frase=? WHERE user=?");
	$stmt->bind_param("ss", $frase, $_SESSION['user']);
	if(!$stmt->execute()){
		exit("Errore durante l'esecuzione della query : " . $stmt->error());
	}
	echo "0";
}

if(isset($_POST["pwd"])){
	$pwd = sha1($_POST["pwd"]);
	$stmt = $conn->prepare("UPDATE utenti SET pwd=? WHERE user=?");
	$stmt->bind_param("ss", $pwd, $_SESSION['user']);
	if(!$stmt->execute()){
		exit("Errore durante l'esecuzione della query : " . $stmt->error());
	}
	echo "0";
}

if(isset($_POST["mail"])){
	$mail = trim($_POST["mail"]);
	$stmt = $conn->prepare("UPDATE clown SET mail=? WHERE user=?");
	$stmt->bind_param("ss", $mail, $_SESSION['user']);
	if(!$stmt->execute()){
		exit("Errore durante l'esecuzione della query : " . $stmt->error());
	}
	echo "0";
}

if(isset($_FILES["image"])){
	echo "0";
}

$conn->close();

?>