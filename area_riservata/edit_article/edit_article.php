<?php 
	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";
	$conn = connectDb();
	
	if(isset( $_POST["tipo"])){
		$tipo = $_POST["tipo"];
	echo $tipo;
		switch($tipo){
			case 0:
			if(!$stmt = $conn->prepare("SELECT id, titolo FROM pagine WHERE tipo = 'A'")) echo $conn->error;			
			break;
			case 1:
			if(!$stmt = $conn->prepare("SELECT id, titolo FROM pagine WHERE tipo = 'P'")) echo $conn->error;			
			break;
		}
		
		$stmt->execute();

		$stmt->bind_result($id, $titolo);
		
		
		while(($stmt->fetch()) != NULL){
			echo "<option value=\"$id\">$titolo</option>";
		
		}
	}
	
	if(isset($_POST['titolo'])){
		$id = $_POST['titolo'];
		$stmt = $conn->prepare("SELECT testo FROM articoli WHERE id_pagine = ?");
		echo $conn->error;
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$stmt->bind_result($testo);
		$stmt->fetch();
		echo $testo;
	}
?>