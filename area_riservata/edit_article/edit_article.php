<?php 
	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";
	$conn = connectDb();
	
	if(isset( $_POST["tipo"]) && !isset($_POST["titolo"])){
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
		
		echo "<option>Scegli il titolo dell'articolo da modificare</option>";
		while(($stmt->fetch()) != NULL){
			echo "<option value=\"$id\">$titolo</option>";
		
		}
	}
	
	if(isset($_POST['titolo'])){			
		switch ($_POST["tipo"]) {
			case "0":
				$id = $_POST['titolo'];
				$stmt = $conn->prepare("SELECT testo FROM articoli WHERE id_pagine = ?");
				echo $conn->error;
				$stmt->bind_param("s", $id);
				$stmt->execute();
				$stmt->bind_result($testo);
				$stmt->fetch();				
				break;
			case "1":
				$titolo = $_POST["titolo"];
				$path = $_SERVER["DOCUMENT_ROOT"] . "/esoes/" . $titolo . "/index.php";
				$fp = fopen($path, "r");
				$testo = fread($fp, filesize($path));
				fclose($fp);
				break;
			
			default:
				echo "Questo è un nuovo tipo di articolo non ancora inventato! Bufu!";
				break;
		}

		echo $testo;
		
		
	}
?>