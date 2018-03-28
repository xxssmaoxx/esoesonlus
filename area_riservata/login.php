<?php
	include $_SERVER["DOCUMENT_ROOT"]."/esoes/utilities/connectDb.php";
	session_start();
	$user = $_POST["user"];
	$pwd = sha1($_POST["pwd"]);

	$conn = connectDb();
	$stmt = $conn->prepare("SELECT permessi FROM utenti WHERE user = ? AND pwd = ?");
	$stmt->bind_param("ss", $user, $pwd);
	$stmt->execute();
	$stmt->bind_result($permessi);
	$stmt->fetch();

	if($permessi != NULL){
		$_SESSION["permission"] = $permessi;
		$_SESSION["user"] = $user;
		$_SESSION["pwd"] = $pwd;
		echo "OK";
	}
?>