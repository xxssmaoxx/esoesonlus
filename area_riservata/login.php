<?php
	session_start();
	$user = $_POST["user"];
	$pwd = sha1($_POST["pwd"]);


	$conn = new mysqli("localhost", "root", "", "tesina");
	$stmt = $conn->prepare("SELECT * FROM utenti WHERE user = ? AND pwd = ?");
	$stmt->bind_param("ss", $user, $pwd);
	$stmt->execute();
	$res = $stmt->get_result()->fetch_assoc();

	if($res != NULL){
		$_SESSION["permission"] = $res["permessi"];
		$_SESSION["user"] = $user;
		$_SESSION["pwd"] = $pwd;
		echo "OK";
	}
		

?>