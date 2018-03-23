<?php 
	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";
	$conn = connectDb();
	
	if(!isset($_POST["titolo"])){
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
	
	if(isset($_POST['titolo']) && !isset($_POST['testo'])){			
		switch ($_POST["tipo"]) {
			case "0":
				$id = $_POST['titolo'];
				if(!$stmt = $conn->prepare("SELECT testo FROM articoli WHERE id_pagine = ?")) exit($conn->error);
				
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

	if(isset($_POST["testo"])){
		$testo = $_POST["testo"];
		$titolo = $_POST["nuovo_titolo"];
		$vecchio_titolo = $_POST["titolo"];
		switch ($_POST["tipo"]) {
			case "0":
				$id = $_POST["titolo"];
				if(!$stmt = $conn->prepare("UPDATE articoli SET testo=? WHERE id_pagine = ?")) exit($conn->error);			
				$stmt->bind_param("ss", $testo, $id);
				$stmt->execute();
				break;
			case "1":
				$folder = $_SERVER["DOCUMENT_ROOT"] . "/esoes/" . $titolo;
				$oldfolder = $_SERVER["DOCUMENT_ROOT"] . "/esoes/" . $vecchio_titolo;
				if(!is_dir($folder)){
					mkdir($folder);
					unlink($oldfolder . "/index.php");
					rmdir($oldfolder);
				}

				$path = $folder . "/index.php";
				$fp = fopen($path, "w");

				$content= "<!DOCTYPE html><html><head><meta charset=\"utf-8\"><?php include \"../utilities/imports.html\" ?><link href='./style.css' rel='stylesheet' /><title>ESO ES Onlus | Archivio progetti</title></head><body><?php include \"../utilities/menu.php\"; ?><div class=\"container\">$testo</div><?php include \"../utilities/footer.html\"; ?></body></html>";
				fwrite($fp, $content);
				fclose($fp);
				break;
			
			default:
				echo "Questo è un nuovo tipo di articolo non ancora inventato! Bufu!";
				break;
		}

		$stmt = $conn->prepare("UPDATE pagine SET titolo = ? WHERE id = ?");
		$stmt->bind_param("ss", $titolo, $_POST["id"]);
		$stmt->execute();

		echo "OK";
	}
?>