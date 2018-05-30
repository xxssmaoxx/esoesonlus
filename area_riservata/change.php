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

if(isset($_FILES["immagine"])){
	$temp = explode("\\", $_POST["titolo"]);	
	$len = count($temp) -1;
	$titolo = time() . $temp[$len];
	$img_folder = $_SERVER["DOCUMENT_ROOT"] . "/esoes/uploads/";
	move_uploaded_file($_FILES["immagine"]["tmp_name"], $img_folder . $titolo );
	
	$stmt = $conn->prepare("SELECT id_img, src FROM immagini, clown WHERE id = id_img AND user = ?");
	$stmt->bind_param("s", $_SESSION["user"]);
	$stmt->execute();
	$stmt->bind_result($id, $img);
	$stmt->fetch();
	//echo $img_folder . $img;
	unlink($img_folder . $img);
	
	$conn->close();
	$conn = connectDb();
	$stmt = $conn->prepare("DELETE FROM immagini WHERE id = ?");
	echo $conn->error;
	$stmt->bind_param("i", $id);
	$stmt->execute();
	
	$stmt = $conn->prepare("INSERT INTO immagini VALUES (NULL, ?, 'U')");
	$stmt->bind_param("s", $titolo);
	$stmt->execute();
	
	$stmt = $conn->prepare("UPDATE clown SET id_img = (SELECT MAX(id) FROM immagini) WHERE user=?");
	$stmt->bind_param("s", $_SESSION["user"]);
	$stmt->execute();
	echo "0";
}

if(isset($_POST["delete"])){
	$stmt = $conn->prepare("DELETE from utenti where user = ?");
	$stmt->bind_param("s", $_SESSION["user"]);
	$stmt->execute();

	$stmt = $conn->prepare("DELETE from clown where user = ?");
	$stmt->bind_param("s", $_SESSION["user"]);
	$stmt->execute();

	unset($_SESSION["user"]);
	unset($_SESSION["pwd"]);
	unset($_SESSION["permission"]);

	echo "0";

}

$conn->close();

?>
