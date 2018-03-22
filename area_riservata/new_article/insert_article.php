<?php 
require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";

$tipo_articolo = ($_POST["tipo"] == '0')?'A':'P';


$conn = connectDb();

if($_FILES['load']['name']!= ""){
	$onlytext = false;
	$img_name = "/esoes/uploads/" . basename($_FILES['load']['name']);
	$dest_url = $_SERVER["DOCUMENT_ROOT"] .  $img_name;
	$query_img = "INSERT INTO immagini VALUES (NULL,?, ?)";
	
	if($stmt = $conn->prepare($query_img)){
	$stmt->bind_param('ss', $img_name, $tipo_articolo);	
	if(!$stmt->execute()) exit("Errore durante l'esecuzione della query : " . $stmt->error);
	}else{
		echo $conn->error;
	}
}else{
	$onlytext = true;
}

	$titolo = $_POST['titolo'];
	$testo = $_POST['testo'];

if(mysqli_connect_errno()){ echo "Errore : " . mysqli_connect_error(); exit(); }
	else{
		
		$query = "INSERT INTO pagine (titolo, id_img, tipo) VALUES (?, (SELECT MAX(id) FROM immagini), ?)";
			$stmt = $conn->prepare($query);	
			$stmt->bind_param('ss', $titolo, $tipo_articolo);
			$stmt->execute();
			
			
		if($tipo_articolo == "P"){
			str_replace("\"", "\\\"", $testo);
			$content= "<!DOCTYPE html><html><head><meta charset=\"utf-8\"><?php include \"../utilities/imports.html\" ?><link href='./style.css' rel='stylesheet' /><title>ESO ES Onlus | Archivio progetti</title></head><body><?php include \"../utilities/menu.php\"; ?><div class=\"container\">$testo</div><?php include \"../utilities/footer.html\"; ?></body></html>";
			
			$url = $_SERVER["DOCUMENT_ROOT"] . "/esoes/" . $titolo;	
			if(!is_dir($url)){
				mkdir($url);
				$fp = fopen($url . "/index.php", "w");
				fwrite($fp, $content);
				fclose($fp);
			}else{
				echo "Errore: esiste già una pagina con lo stesso nome!";
			}
		}else{
				
			$query = "INSERT INTO articoli 
						VALUES ( (SELECT MAX(id) FROM pagine), ? )";
			
			
			$stmt = $conn->prepare($query);
			echo $conn->error;
			$stmt->bind_param('s',$testo); 
			$stmt->execute();
			}
			
	}
	

	echo "<h1>Articolo inserito correttamente</h1><br>";

	mysqli_close($conn);


	if(!$onlytext){
		if(move_uploaded_file($_FILES['load']['tmp_name'], $dest_url )) 
			echo "Immagine caricata correttamente<br>"; 
		else 
			echo "Qualcosa è andato storto durante il caricamento dell'immagine<br>";
	}


?>

<!--
<script>
	location.href = "/esoes/area_riservata";
</script>
-->