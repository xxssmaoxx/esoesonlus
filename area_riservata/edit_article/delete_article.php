<?php
	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";
	$conn = connectDb();
	switch ($_POST["tipo"]) {		
		case 0:
			$stmt = $conn->prepare("DELETE FROM articoli WHERE id_pagine = ?");
			$stmt->bind_param("s", $_POST["id"]);
			$stmt->execute();	
			break;
		case 1:
			$oldfolder = $_SERVER["DOCUMENT_ROOT"] . "/esoes/" .  $_POST["titolo"];
			unlink($oldfolder . "/index.php");
			rmdir($oldfolder);
			break;
		default:
			echo "Un tipo non esistente! Bel piciu!";
			break;
	}

	$stmt = $conn->prepare("DELETE FROM pagine WHERE id = ?");
	$stmt->bind_param("s", $_POST["id"]);
	$stmt->execute();

	echo "OK";
?>